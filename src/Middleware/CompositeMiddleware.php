<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Middleware;

use SplDoublyLinkedList;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Rebilly\Middleware;

/**
 * Class CompositeMiddleware
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
class CompositeMiddleware implements Middleware
{
    /** @var SplDoublyLinkedList The FIFO stack */
    private $stack;

    /** @var callable */
    private $dispatcher;

    /** @var callable */
    private $done;

    /**
     * Constructor
     *
     * @param callable|null $middleware
     */
    public function __construct(callable $middleware = null)
    {
        $this->clear();

        foreach (array_filter(func_get_args(), 'is_callable') as $middleware) {
            $this->attach($middleware);
        }

        // The queue dispatcher, middleware which iterate queue
        $this->dispatcher = function (Request $request, Response $response, callable $next = null) {
            // No middleware remains; done
            if (!$this->stack->valid()) {
                return call_user_func($this->done, $request, $response);
            }

            $layer = $this->stack->current();
            $this->stack->next();

            $result = call_user_func($layer, $request, $response, $next ?: $this->dispatcher);

            return $result instanceof Response ? $result : $response;
        };
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke(Request $request, Response $response, callable $next)
    {
        // Rewind queue for each sending
        $this->stack->rewind();

        $this->done = $next;

        // Dispatch queue
        $result = call_user_func($this->dispatcher, $request, $response);

        // Return original response or new if was changed in middleware
        return $result instanceof Response ? $result : $response;
    }

    /**
     * @param Middleware|callable $middleware
     *
     * @return CompositeMiddleware
     */
    public function attach(callable $middleware)
    {
        $this->stack->push($middleware);

        return $this;
    }

    /**
     * @return CompositeMiddleware
     */
    public function clear()
    {
        $this->stack = new SplDoublyLinkedList();
        $this->stack->setIteratorMode(SplDoublyLinkedList::IT_MODE_FIFO);

        return $this;
    }
}
