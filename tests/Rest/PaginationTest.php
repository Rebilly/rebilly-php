<?php
/**
 * This source file is proprietary and part of Rebilly.
 *
 * (c) Rebilly SRL
 *     Rebilly Ltd.
 *     Rebilly Inc.
 *
 * @see https://www.rebilly.com
 */

namespace Rebilly\Tests\Rest;

use OutOfBoundsException;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Rebilly\Client;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Tests\TestCase;
use RuntimeException;

/**
 * Class PaginationTest.
 *
 */
class PaginationTest extends TestCase
{
    public const EXCEPTION = 'Failed asserting that exception of type "%s" is thrown.';

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
                    ->withHeader('Pagination-Offset', $query['offset'] ?? 0);

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
        $this->assertSame($total, $paginator->getTotalItems());
        $this->assertSame((int) ceil($total / 2), count($paginator));

        $segment = $paginator->current();
        $this->assertInstanceOf(Collection::class, $segment);
        $this->assertSame(0, count($segment));
        $this->assertSame(2, $segment->getLimit());
        $this->assertSame(0, $segment->getOffset());
        $this->assertSame($paginator->getTotalItems(), $segment->getTotalItems());

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
            $this->assertSame($page * $segment->getLimit(), $segment->getOffset());
        }
    }
}
