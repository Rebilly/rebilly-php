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
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Utils;
use Rebilly\Sdk\Collection;
use Rebilly\Sdk\Model\APILogSummary;
use Rebilly\Sdk\Model\CumulativeSubscriptions;
use Rebilly\Sdk\Model\DashboardResponse;
use Rebilly\Sdk\Model\DccMarkup;
use Rebilly\Sdk\Model\EventType;
use Rebilly\Sdk\Model\FutureRenewals;
use Rebilly\Sdk\Model\GetKycAcceptanceSummaryResponse;
use Rebilly\Sdk\Model\RenewalSales;
use Rebilly\Sdk\Model\ReportDisputeDelays;
use Rebilly\Sdk\Model\ReportDisputes;
use Rebilly\Sdk\Model\ReportEventsTriggeredSummary;
use Rebilly\Sdk\Model\ReportJournal;
use Rebilly\Sdk\Model\ReportKycRejections;
use Rebilly\Sdk\Model\ReportKycRequests;
use Rebilly\Sdk\Model\ReportMonthlyRecurringRevenue;
use Rebilly\Sdk\Model\ReportRetentionPercentage;
use Rebilly\Sdk\Model\ReportRetentionValue;
use Rebilly\Sdk\Model\ReportRevenueWaterfall;
use Rebilly\Sdk\Model\ReportRulesMatchedSummary;
use Rebilly\Sdk\Model\ReportTransactions;
use Rebilly\Sdk\Model\RevenueEntry;
use Rebilly\Sdk\Model\SubscriptionCancellationReport;
use Rebilly\Sdk\Model\SubscriptionRenewal;
use Rebilly\Sdk\Model\TimeSeriesTransaction;
use Rebilly\Sdk\Paginator;

class ReportsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return APILogSummary
     */
    public function getApiLogSummary(
        DateTimeImmutable $periodStart,
        DateTimeImmutable $periodEnd,
        ?int $limit = null,
        ?int $offset = null,
    ): APILogSummary {
        $queryParams = [
            'periodStart' => $periodStart->format('Y-m-d\TH:i:s\Z'),
            'periodEnd' => $periodEnd->format('Y-m-d\TH:i:s\Z'),
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = '/experimental/reports/api-log-summary?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return APILogSummary::from($data);
    }

    /**
     * @return CumulativeSubscriptions
     */
    public function getCumulativeSubscriptions(
        string $aggregationField,
        DateTimeImmutable $periodStart,
        DateTimeImmutable $periodEnd,
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
    ): CumulativeSubscriptions {
        $queryParams = [
            'aggregationField' => $aggregationField,
            'periodStart' => $periodStart->format('Y-m-d\TH:i:s\Z'),
            'periodEnd' => $periodEnd->format('Y-m-d\TH:i:s\Z'),
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
        ];
        $uri = '/experimental/reports/cumulative-subscriptions?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return CumulativeSubscriptions::from($data);
    }

    /**
     * @return DashboardResponse
     */
    public function getDashboardMetrics(
        DateTimeImmutable $periodStart,
        DateTimeImmutable $periodEnd,
        ?string $metrics = null,
        ?string $segments = null,
    ): DashboardResponse {
        $queryParams = [
            'periodStart' => $periodStart->format('Y-m-d\TH:i:s\Z'),
            'periodEnd' => $periodEnd->format('Y-m-d\TH:i:s\Z'),
            'metrics' => $metrics,
            'segments' => $segments,
        ];
        $uri = '/experimental/reports/dashboard?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return DashboardResponse::from($data);
    }

    /**
     * @return DccMarkup
     */
    public function getDccMarkup(
        string $aggregationField,
        DateTimeImmutable $periodStart,
        DateTimeImmutable $periodEnd,
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
    ): DccMarkup {
        $queryParams = [
            'aggregationField' => $aggregationField,
            'periodStart' => $periodStart->format('Y-m-d\TH:i:s\Z'),
            'periodEnd' => $periodEnd->format('Y-m-d\TH:i:s\Z'),
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
        ];
        $uri = '/experimental/reports/dcc-markup?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return DccMarkup::from($data);
    }

    /**
     * @return ReportDisputes
     */
    public function getDisputes(
        string $aggregationField,
        string $periodMonth,
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
    ): ReportDisputes {
        $queryParams = [
            'aggregationField' => $aggregationField,
            'periodMonth' => $periodMonth,
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
        ];
        $uri = '/experimental/reports/disputes?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ReportDisputes::from($data);
    }

    /**
     * @return ReportEventsTriggeredSummary
     */
    public function getEventsTriggeredSummary(
        DateTimeImmutable $periodStart,
        DateTimeImmutable $periodEnd,
        ?int $limit = null,
        ?int $offset = null,
    ): ReportEventsTriggeredSummary {
        $queryParams = [
            'periodStart' => $periodStart->format('Y-m-d\TH:i:s\Z'),
            'periodEnd' => $periodEnd->format('Y-m-d\TH:i:s\Z'),
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = '/experimental/reports/events-triggered?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ReportEventsTriggeredSummary::from($data);
    }

    /**
     * @return FutureRenewals
     */
    public function getFutureRenewals(
        string $periodStart,
        string $periodEnd,
        ?int $limit = null,
        ?int $offset = null,
    ): FutureRenewals {
        $queryParams = [
            'periodStart' => $periodStart,
            'periodEnd' => $periodEnd,
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = '/experimental/reports/future-renewals?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return FutureRenewals::from($data);
    }

    /**
     * @return ReportJournal
     */
    public function getJournal(
        string $currency,
        string $recognizedAt,
        string $aggregationField,
        ?string $bookedFrom = null,
        ?string $bookedTo = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
    ): ReportJournal {
        $queryParams = [
            'currency' => $currency,
            'bookedFrom' => $bookedFrom,
            'bookedTo' => $bookedTo,
            'recognizedAt' => $recognizedAt,
            'aggregationField' => $aggregationField,
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
        ];
        $uri = '/experimental/reports/journal?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ReportJournal::from($data);
    }

    /**
     * @return GetKycAcceptanceSummaryResponse
     */
    public function getKycAcceptanceSummary(
        DateTimeImmutable $periodStart,
        DateTimeImmutable $periodEnd,
    ): GetKycAcceptanceSummaryResponse {
        $queryParams = [
            'periodStart' => $periodStart->format('Y-m-d\TH:i:s\Z'),
            'periodEnd' => $periodEnd->format('Y-m-d\TH:i:s\Z'),
        ];
        $uri = '/experimental/reports/kyc-acceptance-summary?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return GetKycAcceptanceSummaryResponse::from($data);
    }

    /**
     * @return ReportKycRejections
     */
    public function getKycRejectionSummary(
        DateTimeImmutable $periodStart,
        DateTimeImmutable $periodEnd,
    ): ReportKycRejections {
        $queryParams = [
            'periodStart' => $periodStart->format('Y-m-d\TH:i:s\Z'),
            'periodEnd' => $periodEnd->format('Y-m-d\TH:i:s\Z'),
        ];
        $uri = '/experimental/reports/kyc-rejection-summary?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ReportKycRejections::from($data);
    }

    /**
     * @return ReportKycRequests
     */
    public function getKycRequestSummary(
        DateTimeImmutable $periodStart,
        DateTimeImmutable $periodEnd,
    ): ReportKycRequests {
        $queryParams = [
            'periodStart' => $periodStart->format('Y-m-d\TH:i:s\Z'),
            'periodEnd' => $periodEnd->format('Y-m-d\TH:i:s\Z'),
        ];
        $uri = '/experimental/reports/kyc-request-summary?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ReportKycRequests::from($data);
    }

    /**
     * @return ReportMonthlyRecurringRevenue
     */
    public function getMonthlyRecurringRevenue(
        string $currency,
        string $periodStart,
        string $periodEnd,
        ?int $limit = null,
        ?int $offset = null,
    ): ReportMonthlyRecurringRevenue {
        $queryParams = [
            'currency' => $currency,
            'periodStart' => $periodStart,
            'periodEnd' => $periodEnd,
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = '/experimental/reports/monthly-recurring-revenue?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ReportMonthlyRecurringRevenue::from($data);
    }

    /**
     * @return RenewalSales
     */
    public function getRenewalSales(
        string $periodStart,
        string $periodEnd,
        ?int $limit = null,
        ?int $offset = null,
    ): RenewalSales {
        $queryParams = [
            'periodStart' => $periodStart,
            'periodEnd' => $periodEnd,
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = '/experimental/reports/renewal-sales?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return RenewalSales::from($data);
    }

    /**
     * @return ReportRetentionPercentage
     */
    public function getRetentionPercentage(
        string $aggregationField,
        string $aggregationPeriod,
        DateTimeImmutable $periodStart,
        DateTimeImmutable $periodEnd,
        ?string $includeSwitchedSubscriptions = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?string $criteria = null,
    ): ReportRetentionPercentage {
        $queryParams = [
            'aggregationField' => $aggregationField,
            'aggregationPeriod' => $aggregationPeriod,
            'includeSwitchedSubscriptions' => $includeSwitchedSubscriptions,
            'periodStart' => $periodStart->format('Y-m-d\TH:i:s\Z'),
            'periodEnd' => $periodEnd->format('Y-m-d\TH:i:s\Z'),
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'criteria' => $criteria,
        ];
        $uri = '/experimental/reports/retention-percentage?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ReportRetentionPercentage::from($data);
    }

    /**
     * @return ReportRetentionValue
     */
    public function getRetentionValue(
        string $aggregationField,
        string $aggregationPeriod,
        DateTimeImmutable $periodStart,
        DateTimeImmutable $periodEnd,
        ?string $includeRefunds = null,
        ?string $includeDisputes = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?array $sort = null,
        ?string $criteria = null,
    ): ReportRetentionValue {
        $queryParams = [
            'aggregationField' => $aggregationField,
            'aggregationPeriod' => $aggregationPeriod,
            'includeRefunds' => $includeRefunds,
            'includeDisputes' => $includeDisputes,
            'periodStart' => $periodStart->format('Y-m-d\TH:i:s\Z'),
            'periodEnd' => $periodEnd->format('Y-m-d\TH:i:s\Z'),
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'sort' => $sort,
            'criteria' => $criteria,
        ];
        $uri = '/experimental/reports/retention-value?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ReportRetentionValue::from($data);
    }

    /**
     * @return Collection<RevenueEntry>
     */
    public function getRevenueAudit(
        ?string $filter = null,
        ?array $sort = null,
        ?int $limit = null,
        ?int $offset = null,
    ): Collection {
        $queryParams = [
            'filter' => $filter,
            'sort' => $sort,
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = '/experimental/reports/revenue-audit?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): RevenueEntry => RevenueEntry::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getRevenueAuditPaginator(
        ?string $filter = null,
        ?array $sort = null,
        ?int $limit = null,
        ?int $offset = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getRevenueAudit(
            filter: $filter,
            sort: $sort,
            limit: $limit,
            offset: $offset,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return ReportRevenueWaterfall
     */
    public function getRevenueWaterfall(
        string $currency,
        string $issuedFrom,
        string $issuedTo,
        string $recognizedTo,
    ): ReportRevenueWaterfall {
        $queryParams = [
            'currency' => $currency,
            'issuedFrom' => $issuedFrom,
            'issuedTo' => $issuedTo,
            'recognizedTo' => $recognizedTo,
        ];
        $uri = '/experimental/reports/revenue-waterfall?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ReportRevenueWaterfall::from($data);
    }

    /**
     * @return SubscriptionCancellationReport
     */
    public function getSubscriptionCancellation(
        DateTimeImmutable $periodStart,
        DateTimeImmutable $periodEnd,
        string $aggregationField,
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
    ): SubscriptionCancellationReport {
        $queryParams = [
            'periodStart' => $periodStart->format('Y-m-d\TH:i:s\Z'),
            'periodEnd' => $periodEnd->format('Y-m-d\TH:i:s\Z'),
            'aggregationField' => $aggregationField,
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
        ];
        $uri = '/experimental/reports/subscription-cancellation?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return SubscriptionCancellationReport::from($data);
    }

    /**
     * @return SubscriptionRenewal
     */
    public function getSubscriptionRenewal(
        DateTimeImmutable $periodStart,
        DateTimeImmutable $periodEnd,
        ?int $limit = null,
        ?int $offset = null,
    ): SubscriptionRenewal {
        $queryParams = [
            'periodStart' => $periodStart->format('Y-m-d\TH:i:s\Z'),
            'periodEnd' => $periodEnd->format('Y-m-d\TH:i:s\Z'),
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = '/experimental/reports/subscription-renewal?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return SubscriptionRenewal::from($data);
    }

    /**
     * @return TimeSeriesTransaction
     */
    public function getTimeSeriesTransaction(
        string $type,
        string $subaggregate,
        DateTimeImmutable $periodStart,
        DateTimeImmutable $periodEnd,
    ): TimeSeriesTransaction {
        $queryParams = [
            'type' => $type,
            'subaggregate' => $subaggregate,
            'periodStart' => $periodStart->format('Y-m-d\TH:i:s\Z'),
            'periodEnd' => $periodEnd->format('Y-m-d\TH:i:s\Z'),
        ];
        $uri = '/experimental/reports/time-series-transaction?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return TimeSeriesTransaction::from($data);
    }

    /**
     * @return ReportTransactions
     */
    public function getTransactions(
        DateTimeImmutable $periodStart,
        DateTimeImmutable $periodEnd,
        string $aggregationField,
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
    ): ReportTransactions {
        $queryParams = [
            'periodStart' => $periodStart->format('Y-m-d\TH:i:s\Z'),
            'periodEnd' => $periodEnd->format('Y-m-d\TH:i:s\Z'),
            'aggregationField' => $aggregationField,
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
        ];
        $uri = '/experimental/reports/transactions?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ReportTransactions::from($data);
    }

    /**
     * @return ReportDisputeDelays
     */
    public function getTransactionsTimeDispute(
        string $aggregationField,
        DateTimeImmutable $periodStart,
        DateTimeImmutable $periodEnd,
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
    ): ReportDisputeDelays {
        $queryParams = [
            'aggregationField' => $aggregationField,
            'periodStart' => $periodStart->format('Y-m-d\TH:i:s\Z'),
            'periodEnd' => $periodEnd->format('Y-m-d\TH:i:s\Z'),
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
        ];
        $uri = '/experimental/reports/transactions-time-dispute?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ReportDisputeDelays::from($data);
    }

    /**
     * @return ReportRulesMatchedSummary
     */
    public function getTriggeredEventRuleReport(
        EventType $eventType,
        DateTimeImmutable $periodStart,
        DateTimeImmutable $periodEnd,
        ?int $limit = null,
        ?int $offset = null,
    ): ReportRulesMatchedSummary {
        $pathParams = [
            '{eventType}' => $eventType->value,
        ];

        $queryParams = [
            'periodStart' => $periodStart->format('Y-m-d\TH:i:s\Z'),
            'periodEnd' => $periodEnd->format('Y-m-d\TH:i:s\Z'),
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/experimental/reports/events-triggered/{eventType}/rules?') . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ReportRulesMatchedSummary::from($data);
    }
}
