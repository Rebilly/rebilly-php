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
 * Class SubscriptionCancel.
 */
class SubscriptionCancel extends Resource
{
    public const MSG_UNEXPECTED_POLICY = 'Unexpected type. Only %s types support';

    public const UNEXPECTED_CATEGORY = 'Unexpected cancel category. Only %s categories are supported';

    public const UNEXPECTED_CANCEL_SOURCE = 'Unexpected cancel source. Only %s cancel sources are supported';

    public const AT_NEXT_RENEWAL = 'at-next-renewal';

    public const NOW = 'now';

    public const NOW_WITH_PRORATA_CREDIT = 'now-with-prorata-credit';

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
    public static function policies()
    {
        return [
            self::AT_NEXT_RENEWAL,
            self::NOW,
            self::NOW_WITH_PRORATA_CREDIT,
        ];
    }

    /**
     * @return array
     */
    public static function cancelCategories()
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
    public function getPolicy()
    {
        return $this->getAttribute('policy');
    }

    /**
     * @return string
     */
    public function getCancelCategory()
    {
        return $this->getAttribute('cancelCategory');
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
    public function getCancelDescription()
    {
        return $this->getAttribute('cancelDescription');
    }

    /**
     * @param string $value
     *
     * @return SubscriptionCancel
     */
    public function setCancelDescription($value)
    {
        return $this->setAttribute('cancelDescription', $value);
    }

    /**
     * @param string $value
     *
     * @throws DomainException
     *
     * @return SubscriptionCancel
     */
    public function setPolicy($value)
    {
        if (!in_array($value, self::policies(), true)) {
            throw new DomainException(sprintf(self::MSG_UNEXPECTED_POLICY, implode(', ', self::policies())));
        }

        return $this->setAttribute('policy', $value);
    }

    /**
     * @param string $value
     *
     * @throws DomainException
     *
     * @return SubscriptionCancel
     */
    public function setCancelCategory($value)
    {
        if (!in_array($value, self::cancelCategories(), true)) {
            throw new DomainException(sprintf(self::UNEXPECTED_CATEGORY, implode(', ', self::cancelCategories())));
        }

        return $this->setAttribute('cancelCategory', $value);
    }

    /**
     * @param string $value
     *
     * @throws DomainException
     *
     * @return SubscriptionCancel
     */
    public function setCanceledBy($value)
    {
        if (!in_array($value, self::canceledBySources(), true)) {
            throw new DomainException(sprintf(self::UNEXPECTED_CATEGORY, implode(', ', self::canceledBySources())));
        }

        return $this->setAttribute('canceledBy', $value);
    }
}
