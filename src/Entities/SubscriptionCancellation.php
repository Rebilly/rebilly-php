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

namespace Rebilly\Entities;

use DomainException;
use Rebilly\Rest\Resource;

/**
 * Class SubscriptionCancellation.
 */
class SubscriptionCancellation extends Resource
{
    public const UNEXPECTED_STATUS = 'Unexpected status. Only %s statuses are supported';

    public const UNEXPECTED_CATEGORY = 'Unexpected cancel category. Only %s categories are supported';

    public const UNEXPECTED_CANCEL_SOURCE = 'Unexpected cancel source. Only %s cancel sources are supported';

    public const STATUS_DRAFT = 'draft';

    public const STATUS_CONFIRMED = 'confirmed';

    public const CATEGORY_OTHER = 'other';

    public const CATEGORY_BILLING_FAILURE = 'billing-failure';

    public const CATEGORY_DID_NOT_USE = 'did-not-use';

    public const CATEGORY_DID_NOT_WANT = 'did-not-want';

    public const CATEGORY_MISSING_FEATURES = 'missing-features';

    public const CATEGORY_BUGS_OR_PROBLEMS = 'bugs-or-problems';

    public const CATEGORY_DO_NOT_REMEMBER = 'do-not-remember';

    public const CATEGORY_RISK_WARNING = 'risk-warning';

    public const CATEGORY_TOO_EXPENSIVE = 'too-expensive';

    public const SOURCE_MERCHANT = 'merchant';

    public const SOURCE_CUSTOMER = 'customer';

    /**
     * @return array
     */
    public static function statuses()
    {
        return [
            self::STATUS_DRAFT,
            self::STATUS_CONFIRMED,
        ];
    }

    /**
     * @param array $data
     *
     * @return array
     */
    public function createLineItems($data)
    {
        return array_map(function ($row) {
            return new LineItem($row);
        }, $data);
    }

    /**
     * @return array
     */
    public static function reasons()
    {
        return [
            self::CATEGORY_OTHER,
            self::CATEGORY_BILLING_FAILURE,
            self::CATEGORY_DID_NOT_USE,
            self::CATEGORY_DID_NOT_WANT,
            self::CATEGORY_MISSING_FEATURES,
            self::CATEGORY_BUGS_OR_PROBLEMS,
            self::CATEGORY_DO_NOT_REMEMBER,
            self::CATEGORY_RISK_WARNING,
            self::CATEGORY_TOO_EXPENSIVE,
        ];
    }

    /**
     * @return array
     */
    public static function canceledBySources()
    {
        return [
            self::SOURCE_MERCHANT,
            self::SOURCE_CUSTOMER,
        ];
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->getAttribute('status');
    }

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->getAttribute('reason');
    }

    /**
     * @return string
     */
    public function getCanceledBy()
    {
        return $this->getAttribute('canceledBy');
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->getAttribute('description');
    }

    /**
     * @param string $value
     *
     * @return SubscriptionCancellation
     */
    public function setDescription($value)
    {
        return $this->setAttribute('description', $value);
    }

    /**
     * @param string $value
     *
     * @throws DomainException
     *
     * @return SubscriptionCancellation
     */
    public function setStatus($value)
    {
        if (!in_array($value, self::statuses(), true)) {
            throw new DomainException(sprintf(self::UNEXPECTED_STATUS, implode(', ', self::statuses())));
        }

        return $this->setAttribute('status', $value);
    }

    /**
     * @param string $value
     *
     * @throws DomainException
     *
     * @return SubscriptionCancellation
     */
    public function setReason($value)
    {
        if (!in_array($value, self::reasons(), true)) {
            throw new DomainException(sprintf(self::UNEXPECTED_CATEGORY, implode(', ', self::reasons())));
        }

        return $this->setAttribute('reason', $value);
    }

    /**
     * @param string $value
     *
     * @throws DomainException
     *
     * @return SubscriptionCancellation
     */
    public function setCanceledBy($value)
    {
        if (!in_array($value, self::canceledBySources(), true)) {
            throw new DomainException(sprintf(self::UNEXPECTED_CANCEL_SOURCE, implode(', ', self::canceledBySources())));
        }

        return $this->setAttribute('canceledBy', $value);
    }

    /**
     * @param string $value
     *
     * @return SubscriptionCancellation
     */
    public function setSubscriptionId($value)
    {
        return $this->setAttribute('subscriptionId', $value);
    }

    /**
     * @return string
     */
    public function getSubscriptionId()
    {
        return $this->getAttribute('subscriptionId');
    }

    /**
     * @param string $value
     *
     * @return SubscriptionCancellation
     */
    public function setChurnTime($value)
    {
        return $this->setAttribute('churnTime', $value);
    }

    /**
     * @return string
     */
    public function getChurnTime()
    {
        return $this->getAttribute('churnTime');
    }

    /**
     * @param bool $value
     *
     * @return SubscriptionCancellation
     */
    public function setProrated($value)
    {
        return $this->setAttribute('prorated', $value);
    }

    /**
     * @return string
     */
    public function getProrated()
    {
        return $this->getAttribute('prorated');
    }

    /**
     * @param LineItem[] $value
     *
     * @return SubscriptionCancellation
     */
    public function setLineItems($value)
    {
        return $this->setAttribute('lineItems', $value);
    }

    /**
     * @return LineItem[]
     */
    public function getLineItems()
    {
        return $this->getAttribute('lineItems');
    }

    /**
     * @return string
     */
    public function getLineItemSubtotal()
    {
        return $this->getAttribute('lineItemSubtotal');
    }

    /**
     * @return string
     */
    public function getCanceledTime()
    {
        return $this->getAttribute('canceledTime');
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }

    /**
     * @return string
     */
    public function getProratedInvoiceId()
    {
        return $this->getAttribute('proratedInvoiceId');
    }

    /**
     * @return string
     */
    public function getAppliedInvoiceId()
    {
        return $this->getAttribute('appliedInvoiceId');
    }
}
