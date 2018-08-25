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

class SubscriptionChangePlan extends Resource
{
    public const UNEXPECTED_RENEWAL_POLICY = 'Unexpected renewalPolicy. Only %s are supported';

    public const RENEWAL_POLICY_RESET = 'reset';

    public const RENEWAL_POLICY_RETAIN = 'retain';

    /**
     * @return array
     */
    public static function renewalPolicies()
    {
        return [
            self::RENEWAL_POLICY_RESET,
            self::RENEWAL_POLICY_RETAIN,
        ];
    }

    /**
     * @param $value
     */
    public function setSubscriptionId($value)
    {
        $this->setAttribute('subscriptionId', $value);
    }

    /**
     * @param $value
     */
    public function setPlanId($value)
    {
        $this->setAttribute('planId', $value);
    }

    /**
     * @param $value
     *
     * @throws DomainException
     */
    public function setRenewalPolicy($value)
    {
        if (!in_array($value, self::renewalPolicies(), true)) {
            throw new DomainException(sprintf(self::UNEXPECTED_RENEWAL_POLICY, implode(', ', self::renewalPolicies())));
        }
        $this->setAttribute('renewalPolicy', $value);
    }

    /**
     * @param $value
     */
    public function setProrated($value)
    {
        $this->setAttribute('prorated', $value);
    }

    /**
     * @param $value
     */
    public function setEffectiveTime($value)
    {
        $this->setAttribute('effectiveTime', $value);
    }

    /**
     * @param $value
     */
    public function setPreview($value)
    {
        $this->setAttribute('preview', $value);
    }

    /**
     * @return string
     */
    public function getSubscriptionId()
    {
        return $this->getAttribute('subscriptionId');
    }

    /**
     * @return string
     */
    public function getPlanId()
    {
        return $this->getAttribute('planId');
    }

    /**
     * @return bool
     */
    public function getPreview()
    {
        return $this->getAttribute('preview');
    }

    /**
     * @return bool
     */
    public function getProrated()
    {
        return $this->getAttribute('prorated');
    }

    /**
     * @return string
     */
    public function getRenewalPolicy()
    {
        return $this->getAttribute('renewalPolicy');
    }

    /**
     * @return string
     */
    public function getEffectiveTime()
    {
        return $this->getAttribute('effectiveTime');
    }
}
