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

class DashboardResponse implements JsonSerializable
{
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

    public function __construct(array $data = [])
    {
        if (array_key_exists('metric', $data)) {
            $this->setMetric($data['metric']);
        }
        if (array_key_exists('humanName', $data)) {
            $this->setHumanName($data['humanName']);
        }
        if (array_key_exists('increaseIsGood', $data)) {
            $this->setIncreaseIsGood($data['increaseIsGood']);
        }
        if (array_key_exists('segments', $data)) {
            $this->setSegments($data['segments']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
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

    public function getHumanName(): ?string
    {
        return $this->fields['humanName'] ?? null;
    }

    public function setHumanName(null|string $humanName): static
    {
        $this->fields['humanName'] = $humanName;

        return $this;
    }

    public function getIncreaseIsGood(): ?bool
    {
        return $this->fields['increaseIsGood'] ?? null;
    }

    public function setIncreaseIsGood(null|bool $increaseIsGood): static
    {
        $this->fields['increaseIsGood'] = $increaseIsGood;

        return $this;
    }

    /**
     * @return null|DashboardResponseSegments[]
     */
    public function getSegments(): ?array
    {
        return $this->fields['segments'] ?? null;
    }

    /**
     * @param null|array[]|DashboardResponseSegments[] $segments
     */
    public function setSegments(null|array $segments): static
    {
        $segments = $segments !== null ? array_map(
            fn ($value) => $value instanceof DashboardResponseSegments ? $value : DashboardResponseSegments::from($value),
            $segments,
        ) : null;

        $this->fields['segments'] = $segments;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('metric', $this->fields)) {
            $data['metric'] = $this->fields['metric'];
        }
        if (array_key_exists('humanName', $this->fields)) {
            $data['humanName'] = $this->fields['humanName'];
        }
        if (array_key_exists('increaseIsGood', $this->fields)) {
            $data['increaseIsGood'] = $this->fields['increaseIsGood'];
        }
        if (array_key_exists('segments', $this->fields)) {
            $data['segments'] = $this->fields['segments'] !== null
                ? array_map(
                    static fn (DashboardResponseSegments $dashboardResponseSegments) => $dashboardResponseSegments->jsonSerialize(),
                    $this->fields['segments'],
                )
                : null;
        }

        return $data;
    }
}
