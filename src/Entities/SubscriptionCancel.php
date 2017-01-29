<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities;

use DomainException;
use Rebilly\Rest\Resource;

/**
 * Class SubscriptionCancel
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
class SubscriptionCancel extends Resource
{
    const MSG_UNEXPECTED_POLICY = 'Unexpected type. Only %s types support';
    const UNEXPECTED_CATEGORY = 'Unexpected cancel category. Only %s categories are supported';
    const UNEXPECTED_CANCEL_SOURCE = 'Unexpected cancel source. Only %s cancel sources are supported';

    const AT_NEXT_RENEWAL = 'at-next-renewal';
    const NOW = 'now';
    const NOW_WITH_PRORATA_CREDIT = 'now-with-prorata-credit';

    const CATEGORY_OTHER = 'other';
    const CATEGORY_BILLING_FAILURE  = 'billing-failure';
    const CATEGORY_DID_NOT_USE = 'did-not-use';
    const CATEGORY_DID_NOT_WANT = 'did-not-want';
    const CATEGORY_MISSING_FEATURES = 'missing-features';
    const CATEGORY_BUGS_OR_PROBLEMS = 'bugs-or-problems';
    const CATEGORY_DO_NOT_REMEMBER = 'suspected-fraud';
    const CATEGORY_RISK_WARNING = 'contract-expired';
    const CATEGORY_TOO_EXPENSIVE = 'too-expensive';

    const SOURCE_MERCHANT = 'merchant';
    const SOURCE_CUSTOMER = 'customer';

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
        return $this->getAttribute('cancelledBy');
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
        if (!in_array($value, self::policies())) {
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
        if (!in_array($value, self::cancelCategories())) {
            throw new DomainException(sprintf(self::UNEXPECTED_CATEGORY, implode(', ', self::cancelCategories())));
        }

        return $this->setAttribute('category', $value);
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
        if (!in_array($value, self::canceledBySources())) {
            throw new DomainException(sprintf(self::UNEXPECTED_CATEGORY, implode(', ', self::canceledBySources())));
        }

        return $this->setAttribute('by', $value);
    }
}
