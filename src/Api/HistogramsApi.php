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

declare(strict_types=1);

namespace Rebilly\Sdk\Api;

use DateTimeImmutable;
use GuzzleHttp\ClientInterface;

use function GuzzleHttp\json_decode;

use GuzzleHttp\Psr7\Request;
use Rebilly\Sdk\Model\HistogramData;

class HistogramsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return HistogramData
     */
    public function getTransactionHistogramReport(
        DateTimeImmutable $periodStart,
        DateTimeImmutable $periodEnd,
        string $aggregationField,
        string $aggregationPeriod,
        string $metric,
        ?string $filter = null,
    ): HistogramData {
        $queryParams = [
            'periodStart' => $periodStart->format('Y-m-d\TH:i:s\Z'),
            'periodEnd' => $periodEnd->format('Y-m-d\TH:i:s\Z'),
            'aggregationField' => $aggregationField,
            'aggregationPeriod' => $aggregationPeriod,
            'metric' => $metric,
            'filter' => $filter,
        ];
        $uri = '/experimental/histograms/transactions?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return HistogramData::from($data);
    }
}
