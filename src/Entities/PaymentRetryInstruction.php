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
 * Class PaymentRetryInstruction.
 */
final class PaymentRetryInstruction extends Resource
{
    const AFTER_ATTEMPT_POLICY_NONE = 'none';
    const AFTER_ATTEMPT_POLICY_CHANGE_RENEWAL_TIME = 'change-renewal-time';
    const AFTER_RETRY_END_POLICY_NONE = 'none';
    const AFTER_RETRY_END_POLICY_CANCEL_SUBSCRIPTION = 'cancel-subscription';

    /**
     * @param array|PaymentRetryAttempt[] $values
     *
     * @return $this
     */
    public function setAttempts($values)
    {
        $this->setAttribute('attempts', []);

        foreach ($values as $value) {
            $this->addAttempt($value);
        }

        return $this;
    }

    /**
     * @return array|PaymentRetryAttempt[]
     */
    public function getAttempts()
    {
        $attempts = $this->getAttribute('attempts') ?: [];

        foreach ($attempts as $i => $attempt) {
            $attempts[$i] = new PaymentRetryAttempt($attempt);
        }

        return $attempts;
    }

    /**
     * @param array|PaymentRetryAttempt $value
     *
     * @throws DomainException
     *
     * @return $this
     */
    public function addAttempt($value)
    {
        if ($value instanceof PaymentRetryAttempt) {
            $value = $value->jsonSerialize();
        } elseif (!is_array($value)) {
            throw new DomainException('Invalid retry attempt item');
        }

        $attempts = $this->getAttribute('attempts') ?: [];
        $attempts[] = $value;

        return $this->setAttribute('attempts', $attempts);
    }

    /**
     * @param array $data
     *
     * @return PaymentRetryAttempt
     */
    public function createPaymentRetryAttempt($data = array())
    {
        return new PaymentRetryAttempt($data);
    }

    /**
     * @param string
     *
     * @return $this
     */
    public function setAfterAttemptPolicy($value)
    {
        if (!in_array(
            $value,
            [self::AFTER_ATTEMPT_POLICY_NONE, self::AFTER_ATTEMPT_POLICY_CHANGE_RENEWAL_TIME],
            true
        )) {
            throw new DomainException('Invalid after attempt policy');
        }
        return $this->setAttribute('afterAttemptPolicy', $value);
    }

    /**
     * @return $this
     */
    public function getAfterAttemptPolicy()
    {
        return $this->getAttribute('afterAttemptPolicy');
    }

    /**
     * @param string
     *
     * @return $this
     */
    public function setAfterRetryEndPolicy($value)
    {
        if (!in_array(
            $value,
            [self::AFTER_RETRY_END_POLICY_NONE, self::AFTER_RETRY_END_POLICY_CANCEL_SUBSCRIPTION],
            true
        )) {
            throw new DomainException('Invalid after retry end policy');
        }
        return $this->setAttribute('afterRetryEndPolicy', $value);
    }

    /**
     * @return $this
     */
    public function getAfterRetryEndPolicy()
    {
        return $this->getAttribute('afterRetryEndPolicy');
    }
}
