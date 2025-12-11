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
use Rebilly\Sdk\Model\ApiLogSummary;
use Rebilly\Sdk\Model\CumulativeSubscriptions;
use Rebilly\Sdk\Model\DashboardResponse;
use Rebilly\Sdk\Model\DccMarkup;
use Rebilly\Sdk\Model\FutureRenewals;
use Rebilly\Sdk\Model\GetKycAcceptanceSummaryReportResponse;
use Rebilly\Sdk\Model\JournalSummaryReport;
use Rebilly\Sdk\Model\RenewalSales;
use Rebilly\Sdk\Model\ReportAnnualRecurringRevenue;
use Rebilly\Sdk\Model\ReportDeclinedTransactions;
use Rebilly\Sdk\Model\ReportDeferredRevenue;
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
use Rebilly\Sdk\Model\ReportTax;
use Rebilly\Sdk\Model\ReportTransactions;
use Rebilly\Sdk\Model\SubscriptionCancellationReport;
use Rebilly\Sdk\Model\SubscriptionRenewal;
use Rebilly\Sdk\Model\TimeSeriesTransaction;

class ReportsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    public function getAnnualRecurringRevenue(
        string $currency,
        string $periodStart,
        string $periodEnd,
        ?int $limit = null,
        ?int $offset = null,
    ): ReportAnnualRecurringRevenue {
        $queryParams = [
            'currency' => $currency,
            'periodStart' => $periodStart,
            'periodEnd' => $periodEnd,
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = '/experimental/reports/annual-recurring-revenue?' . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ReportAnnualRecurringRevenue::from($data);
    }

    public function getApiLogSummary(
        ?DateTimeImmutable $periodStart = null,
        ?DateTimeImmutable $periodEnd = null,
        ?int $limit = null,
        ?int $offset = null,
    ): ApiLogSummary {
        $queryParams = [
            'periodStart' => $periodStart->format('Y-m-d\TH:i:s\Z'),
            'periodEnd' => $periodEnd->format('Y-m-d\TH:i:s\Z'),
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = '/experimental/reports/api-log-summary?' . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ApiLogSummary::from($data);
    }

    public function getCumulativeSubscriptions(
        ?string $aggregationField = null,
        ?DateTimeImmutable $periodStart = null,
        ?DateTimeImmutable $periodEnd = null,
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

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return CumulativeSubscriptions::from($data);
    }

    /**
     * @return DashboardResponse[]
     */
    public function getDashboardMetrics(
        ?DateTimeImmutable $periodStart = null,
        ?DateTimeImmutable $periodEnd = null,
        ?string $metrics = null,
        ?string $segments = null,
    ): array {
        $queryParams = [
            'periodStart' => $periodStart->format('Y-m-d\TH:i:s\Z'),
            'periodEnd' => $periodEnd->format('Y-m-d\TH:i:s\Z'),
            'metrics' => $metrics,
            'segments' => $segments,
        ];
        $uri = '/experimental/reports/dashboard?' . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return array_map(fn (array $item): DashboardResponse => DashboardResponse::from($item), $data);
    }

    public function getDccMarkup(
        ?string $aggregationField = null,
        ?DateTimeImmutable $periodStart = null,
        ?DateTimeImmutable $periodEnd = null,
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

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return DccMarkup::from($data);
    }

    public function getDeclinedTransactions(
        ?string $aggregationField = null,
        ?DateTimeImmutable $periodStart = null,
        ?DateTimeImmutable $periodEnd = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
    ): ReportDeclinedTransactions {
        $queryParams = [
            'aggregationField' => $aggregationField,
            'periodStart' => $periodStart->format('Y-m-d\TH:i:s\Z'),
            'periodEnd' => $periodEnd->format('Y-m-d\TH:i:s\Z'),
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
        ];
        $uri = '/experimental/reports/declined-transactions?' . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ReportDeclinedTransactions::from($data);
    }

    public function getDeferredRevenue(
        ?string $currency = null,
        ?DateTimeImmutable $asOfDate = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
    ): ReportDeferredRevenue {
        $queryParams = [
            'currency' => $currency,
            'asOfDate' => $asOfDate->format('Y-m-d\TH:i:s\Z'),
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
        ];
        $uri = '/experimental/reports/deferred-revenue?' . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ReportDeferredRevenue::from($data);
    }

    public function getDisputes(
        ?string $aggregationField = null,
        ?string $periodMonth = null,
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

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ReportDisputes::from($data);
    }

    public function getEventsTriggeredSummary(
        ?DateTimeImmutable $periodStart = null,
        ?DateTimeImmutable $periodEnd = null,
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

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ReportEventsTriggeredSummary::from($data);
    }

    public function getFutureRenewals(
        ?string $periodStart = null,
        ?string $periodEnd = null,
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

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return FutureRenewals::from($data);
    }

    public function getJournal(
        ?string $currency = null,
        ?string $bookedFrom = null,
        ?string $bookedTo = null,
        ?string $recognizedAt = null,
        ?string $aggregationField = null,
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

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ReportJournal::from($data);
    }

    public function getJournalSummary(
        ?string $periodStart = null,
        ?string $periodEnd = null,
        ?string $currency = null,
        ?string $aggregationField = null,
        ?string $amountField = null,
        ?string $journalAccountIds = null,
    ): JournalSummaryReport {
        $queryParams = [
            'periodStart' => $periodStart,
            'periodEnd' => $periodEnd,
            'currency' => $currency,
            'aggregationField' => $aggregationField,
            'amountField' => $amountField,
            'journalAccountIds' => $journalAccountIds,
        ];
        $uri = '/experimental/reports/journal-summary?' . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return JournalSummaryReport::from($data);
    }

    public function getKycAcceptanceSummary(
        ?DateTimeImmutable $periodStart = null,
        mixed $periodEnd = null,
    ): GetKycAcceptanceSummaryReportResponse {
        $queryParams = [
            'periodStart' => $periodStart->format('Y-m-d\TH:i:s\Z'),
            'periodEnd' => $periodEnd,
        ];
        $uri = '/experimental/reports/kyc-acceptance-summary?' . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return GetKycAcceptanceSummaryReportResponse::from($data);
    }

    public function getKycRejectionSummary(
        DateTimeImmutable $periodStart,
        DateTimeImmutable $periodEnd,
    ): ReportKycRejections {
        $queryParams = [
            'periodStart' => $periodStart->format('Y-m-d\TH:i:s\Z'),
            'periodEnd' => $periodEnd->format('Y-m-d\TH:i:s\Z'),
        ];
        $uri = '/experimental/reports/kyc-rejection-summary?' . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ReportKycRejections::from($data);
    }

    public function getKycRequestSummary(
        DateTimeImmutable $periodStart,
        DateTimeImmutable $periodEnd,
    ): ReportKycRequests {
        $queryParams = [
            'periodStart' => $periodStart->format('Y-m-d\TH:i:s\Z'),
            'periodEnd' => $periodEnd->format('Y-m-d\TH:i:s\Z'),
        ];
        $uri = '/experimental/reports/kyc-request-summary?' . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ReportKycRequests::from($data);
    }

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

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ReportMonthlyRecurringRevenue::from($data);
    }

    public function getRenewalSales(
        ?string $periodStart = null,
        ?string $periodEnd = null,
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

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return RenewalSales::from($data);
    }

    public function getRetentionPercentage(
        ?string $aggregationField = null,
        ?string $aggregationPeriod = null,
        ?string $includeSwitchedSubscriptions = null,
        ?DateTimeImmutable $periodStart = null,
        ?DateTimeImmutable $periodEnd = null,
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

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ReportRetentionPercentage::from($data);
    }

    public function getRetentionValue(
        ?string $aggregationField = null,
        ?string $aggregationPeriod = null,
        ?string $includeRefunds = null,
        ?string $includeDisputes = null,
        ?DateTimeImmutable $periodStart = null,
        ?DateTimeImmutable $periodEnd = null,
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
            'sort' => $sort ? implode(',', $sort) : null,
            'criteria' => $criteria,
        ];
        $uri = '/experimental/reports/retention-value?' . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ReportRetentionValue::from($data);
    }

    /**
     * @return ReportRevenueWaterfall[]
     */
    public function getRevenueWaterfall(
        string $currency,
        ?string $issuedFrom = null,
        ?string $issuedTo = null,
        ?string $recognizedTo = null,
    ): array {
        $queryParams = [
            'currency' => $currency,
            'issuedFrom' => $issuedFrom,
            'issuedTo' => $issuedTo,
            'recognizedTo' => $recognizedTo,
        ];
        $uri = '/experimental/reports/revenue-waterfall?' . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return array_map(fn (array $item): ReportRevenueWaterfall => ReportRevenueWaterfall::from($item), $data);
    }

    public function getSubscriptionCancellation(
        ?DateTimeImmutable $periodStart = null,
        ?DateTimeImmutable $periodEnd = null,
        ?string $aggregationField = null,
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

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return SubscriptionCancellationReport::from($data);
    }

    public function getSubscriptionRenewal(
        ?DateTimeImmutable $periodStart = null,
        mixed $periodEnd = null,
        ?int $limit = null,
        ?int $offset = null,
    ): SubscriptionRenewal {
        $queryParams = [
            'periodStart' => $periodStart->format('Y-m-d\TH:i:s\Z'),
            'periodEnd' => $periodEnd,
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = '/experimental/reports/subscription-renewal?' . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return SubscriptionRenewal::from($data);
    }

    public function getTax(
        ?DateTimeImmutable $periodStart = null,
        ?DateTimeImmutable $periodEnd = null,
        ?string $accountingMethod = null,
        ?int $limit = null,
        ?int $offset = null,
    ): ReportTax {
        $queryParams = [
            'periodStart' => $periodStart->format('Y-m-d\TH:i:s\Z'),
            'periodEnd' => $periodEnd->format('Y-m-d\TH:i:s\Z'),
            'accountingMethod' => $accountingMethod,
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = '/experimental/reports/tax?' . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ReportTax::from($data);
    }

    public function getTimeSeriesTransaction(
        ?string $type = null,
        ?string $subaggregate = null,
        ?DateTimeImmutable $periodStart = null,
        ?DateTimeImmutable $periodEnd = null,
        ?int $limit = null,
        ?int $offset = null,
    ): TimeSeriesTransaction {
        $queryParams = [
            'type' => $type,
            'subaggregate' => $subaggregate,
            'periodStart' => $periodStart->format('Y-m-d\TH:i:s\Z'),
            'periodEnd' => $periodEnd->format('Y-m-d\TH:i:s\Z'),
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = '/experimental/reports/time-series-transaction?' . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return TimeSeriesTransaction::from($data);
    }

    public function getTransactions(
        ?DateTimeImmutable $periodStart = null,
        ?DateTimeImmutable $periodEnd = null,
        ?string $aggregationField = null,
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

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ReportTransactions::from($data);
    }

    public function getTransactionsTimeDispute(
        ?string $aggregationField = null,
        ?DateTimeImmutable $periodStart = null,
        ?DateTimeImmutable $periodEnd = null,
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

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ReportDisputeDelays::from($data);
    }

    public function getTriggeredEventRuleReport(
        string $eventType,
        ?DateTimeImmutable $periodStart = null,
        ?DateTimeImmutable $periodEnd = null,
        ?int $limit = null,
        ?int $offset = null,
    ): ReportRulesMatchedSummary {
        $pathParams = [
            '{eventType}' => $eventType,
        ];

        $queryParams = [
            'periodStart' => $periodStart->format('Y-m-d\TH:i:s\Z'),
            'periodEnd' => $periodEnd->format('Y-m-d\TH:i:s\Z'),
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/experimental/reports/events-triggered/{eventType}/rules?') . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ReportRulesMatchedSummary::from($data);
    }
}
