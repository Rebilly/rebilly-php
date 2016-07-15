<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Tests\Rest;

use Rebilly\Client;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Tests\TestCase;
use RuntimeException;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use OutOfBoundsException;

/**
 * Class PaginationTest.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 */
class PaginationTest extends TestCase
{
    const EXCEPTION = 'Failed asserting that exception of type "%s" is thrown.';

    /**
     * @test
     */
    public function howToUsePaginator()
    {
        $factory = new Client(['apiKey' => getenv('REBILLY_TEST_APIKEY')]);
        $total = 10;

        $client = new Client([
            'apiKey' => getenv('REBILLY_TEST_APIKEY'),
            'baseUrl' => getenv('REBILLY_TEST_HOST'),
            'httpHandler' => function (Request $request) use ($factory, $total) {
                parse_str($request->getUri()->getQuery(), $query);

                /** @var Response $response */
                $response = $factory
                    ->createResponse()
                    ->withHeader('Pagination-Total', $total)
                    ->withHeader('Pagination-Limit', $query['limit'])
                    ->withHeader('Pagination-Offset', isset($query['offset']) ? $query['offset'] : 0);

                return $response;
            },
        ]);

        try {
            new Paginator($client, 'customers', ['offset' => 1, 'limit' => 2]);
        } catch (RuntimeException $e) {
        } finally {
            if (!isset($e)) {
                $this->fail(sprintf(self::EXCEPTION, OutOfBoundsException::class));
            }
        }

        $paginator = new Paginator($client, 'customers', ['limit' => 2]);
        $this->assertEquals($total, $paginator->getTotalItems());
        $this->assertEquals(ceil($total / 2), count($paginator));

        $segment = $paginator->current();
        $this->assertInstanceOf(Collection::class, $segment);
        $this->assertEquals(0, count($segment));
        $this->assertEquals(2, $segment->getLimit());
        $this->assertEquals(0, $segment->getOffset());
        $this->assertEquals($paginator->getTotalItems(), $segment->getTotalItems());

        $this->assertTrue($paginator->isFirst());
        $this->assertFalse($paginator->isLast());


        try {
            $paginator->previous();
            $paginator->current();
        } catch (OutOfBoundsException $e) {
        } finally {
            if (!isset($e)) {
                $this->fail(sprintf(self::EXCEPTION, OutOfBoundsException::class));
            }
        }

        foreach ($paginator as $page => $segment) {
            $this->assertInstanceOf(Collection::class, $segment);
            $this->assertEquals($page * $segment->getLimit(), $segment->getOffset());
        }
    }
}
