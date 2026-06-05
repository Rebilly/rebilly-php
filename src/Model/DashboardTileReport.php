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

namespace Rebilly\Sdk\Model;

use JsonSerializable;
use Rebilly\Sdk\Trait\HasMetadata;

class DashboardTileReport implements JsonSerializable
{
    use HasMetadata;

    public const METRIC_APPROVAL_RATE = 'approvalRate';

    public const METRIC_SALES_COUNT = 'salesCount';

    public const METRIC_SALES_VALUE = 'salesValue';

    public const METRIC_REFUNDS_VALUE = 'refundsValue';

    public const METRIC_CHARGEBACKS_COUNT = 'chargebacksCount';

    public const METRIC_CHARGEBACKS_VALUE = 'chargebacksValue';

    public const METRIC_TRANSACTIONS_COUNT = 'transactionsCount';

    public const METRIC_REDEEMED_COUPONS_COUNT = 'redeemedCouponsCount';

    public const METRIC_NEW_LEADS_COUNT = 'newLeadsCount';

    public const METRIC_NEW_CUSTOMERS_COUNT = 'newCustomersCount';

    public const METRIC_APPLIED_COUPONS_COUNT = 'appliedCouponsCount';

    public const METRIC_TRIAL_CONVERSIONS_COUNT = 'trialConversionsCount';

    public const METRIC_TRIAL_CONVERSIONS_RATE = 'trialConversionsRate';

    public const METRIC_RENEWAL_SUCCESS_RATE = 'renewalSuccessRate';

    public const METRIC_RENEWALS_COUNT = 'renewalsCount';

    public const METRIC_NEW_TRIALS_COUNT = 'newTrialsCount';

    public const METRIC_REACTIVATIONS_COUNT = 'reactivationsCount';

    public const METRIC_SUCCESSFUL_RETRIES_COUNT = 'successfulRetriesCount';

    public const METRIC_INVOICED_REVENUE = 'invoicedRevenue';

    public const METRIC_CHURN_COUNT = 'churnCount';

    public const METRIC_CHURN_RATE = 'churnRate';

    public const METRIC_CANCELLATIONS_COUNT = 'cancellationsCount';

    public const METRIC_CANCELLATIONS_RATE = 'cancellationsRate';

    public const METRIC_ACTIVE_SUBSCRIPTIONS_COUNT = 'activeSubscriptionsCount';

    public const METRIC_NEW_SUBSCRIPTIONS_COUNT = 'newSubscriptionsCount';

    public const METRIC_UPGRADES_COUNT = 'upgradesCount';

    public const METRIC_DOWNGRADES_COUNT = 'downgradesCount';

    public const METRIC_MONTHLY_RECURRING_REVENUE = 'monthlyRecurringRevenue';

    public const METRIC_ANNUAL_RECURRING_REVENUE = 'annualRecurringRevenue';

    public const METRIC_AVERAGE_REVENUE_PER_CUSTOMER = 'averageRevenuePerCustomer';

    public const METRIC_CUSTOMER_LIFETIME_VALUE = 'customerLifetimeValue';

    public const METRIC_ADDRESS_PROOF_ACCEPTANCE_RATE = 'addressProofAcceptanceRate';

    public const METRIC_IDENTITY_PROOF_ACCEPTANCE_RATE = 'identityProofAcceptanceRate';

    public const METRIC_FUNDS_PROOF_ACCEPTANCE_RATE = 'fundsProofAcceptanceRate';

    public const METRIC_PURCHASE_PROOF_ACCEPTANCE_RATE = 'purchaseProofAcceptanceRate';

    public const METRIC_CREDIT_FILE_PROOF_ACCEPTANCE_RATE = 'creditFileProofAcceptanceRate';

    public const METRIC_KYC_ACCEPTANCE_RATE = 'kycAcceptanceRate';

    public const METRIC_KYC_REVIEW_TIME = 'kycReviewTime';

    public const METRIC_KYC_REJECTION_RATE = 'kycRejectionRate';

    public const METRIC_KYC_ACCURACY_RATE = 'kycAccuracyRate';

    public const METRIC_ADDRESS_PROOF_ACCURACY_RATE = 'addressProofAccuracyRate';

    public const METRIC_IDENTITY_PROOF_ACCURACY_RATE = 'identityProofAccuracyRate';

    public const METRIC_CREDIT_FILE_PROOF_ACCURACY_RATE = 'creditFileProofAccuracyRate';

    public const METRIC_KYC_REQUEST_COUNT = 'kycRequestCount';

    public const METRIC_KYC_REQUEST_ABANDONMENT_RATE = 'kycRequestAbandonmentRate';

    public const METRIC_KYC_REQUEST_ATTEMPTED_RATE = 'kycRequestAttemptedRate';

    public const METRIC_KYC_REQUEST_FAILURE_RATE = 'kycRequestFailureRate';

    public const METRIC_KYC_REQUEST_FULFILLMENT_RATE = 'kycRequestFulfillmentRate';

    public const METRIC_KYC_REQUEST_EXPIRATION_RATE = 'kycRequestExpirationRate';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('metric', $data)) {
            $this->setMetric($data['metric']);
        }
        if (array_key_exists('value', $data)) {
            $this->setValue($data['value']);
        }
        if (array_key_exists('previousValue', $data)) {
            $this->setPreviousValue($data['previousValue']);
        }
        if (array_key_exists('timeseries', $data)) {
            $this->setTimeseries($data['timeseries']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getMetric(): ?string
    {
        return $this->fields['metric'] ?? null;
    }

    public function setMetric(null|string $metric): static
    {
        $this->fields['metric'] = $metric;

        return $this;
    }

    public function getValue(): ?float
    {
        return $this->fields['value'] ?? null;
    }

    public function setValue(null|float|string $value): static
    {
        if (is_string($value)) {
            $value = (float) $value;
        }

        $this->fields['value'] = $value;

        return $this;
    }

    public function getPreviousValue(): ?float
    {
        return $this->fields['previousValue'] ?? null;
    }

    public function setPreviousValue(null|float|string $previousValue): static
    {
        if (is_string($previousValue)) {
            $previousValue = (float) $previousValue;
        }

        $this->fields['previousValue'] = $previousValue;

        return $this;
    }

    /**
     * @return null|DashboardTileReportTimeseries[]
     */
    public function getTimeseries(): ?array
    {
        return $this->fields['timeseries'] ?? null;
    }

    /**
     * @param null|array[]|DashboardTileReportTimeseries[] $timeseries
     */
    public function setTimeseries(null|array $timeseries): static
    {
        $timeseries = $timeseries !== null ? array_map(
            fn ($value) => $value instanceof DashboardTileReportTimeseries ? $value : DashboardTileReportTimeseries::from($value),
            $timeseries,
        ) : null;

        $this->fields['timeseries'] = $timeseries;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('metric', $this->fields)) {
            $data['metric'] = $this->fields['metric'];
        }
        if (array_key_exists('value', $this->fields)) {
            $data['value'] = $this->fields['value'];
        }
        if (array_key_exists('previousValue', $this->fields)) {
            $data['previousValue'] = $this->fields['previousValue'];
        }
        if (array_key_exists('timeseries', $this->fields)) {
            $data['timeseries'] = $this->fields['timeseries'] !== null
                ? array_map(
                    static fn (DashboardTileReportTimeseries $dashboardTileReportTimeseries) => $dashboardTileReportTimeseries->jsonSerialize(),
                    $this->fields['timeseries'],
                )
                : null;
        }

        return $data;
    }
}
