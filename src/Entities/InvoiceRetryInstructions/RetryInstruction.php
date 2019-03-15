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

namespace Rebilly\Entities\InvoiceRetryInstructions;

use DomainException;
use Rebilly\Rest\Resource;

final class RetryInstruction extends Resource
{
    public const AFTER_ATTEMPT_POLICY_CHANGE_SUBSCRIPTION_RENEWAL_TIME = 'change-subscription-renewal-time';

    public const AFTER_RETRY_END_POLICY_ABANDON_INVOICE = 'abandon-invoice';

    public const AFTER_RETRY_END_POLICY_CANCEL_SUBSCRIPTION = 'cancel-subscription';

    private static $availableAfterAttemptPolicies = [
        self::AFTER_ATTEMPT_POLICY_CHANGE_SUBSCRIPTION_RENEWAL_TIME,
    ];

    private static $availableAfterRetryEndPolicies = [
        self::AFTER_RETRY_END_POLICY_ABANDON_INVOICE,
        self::AFTER_RETRY_END_POLICY_CANCEL_SUBSCRIPTION,
    ];

    /**
     * @param array $data
     *
     * @return RetryInstruction
     */
    public static function createFromData(array $data)
    {
        if (!isset($data['afterAttemptPolicies'])) {
            throw new DomainException('afterAttemptPolicies is required');
        }

        if (!isset($data['afterRetryEndPolicies'])) {
            throw new DomainException('afterRetryEndPolicies is required');
        }

        if (!isset($data['attempts'])) {
            throw new DomainException('attempts is required');
        }

        if (!is_array($data['afterAttemptPolicies'])) {
            throw new DomainException('afterAttemptPolicies must be an array');
        }

        if (!is_array($data['afterRetryEndPolicies'])) {
            throw new DomainException('afterRetryEndPolicies must be an array');
        }

        if (!is_array($data['attempts'])) {
            throw new DomainException('attempts must be an array');
        }

        foreach ($data['afterAttemptPolicies'] as $policy) {
            if (!in_array($policy, self::$availableAfterAttemptPolicies, true)) {
                throw new DomainException('Invalid afterAttemptPolicies provided');
            }
        }

        foreach ($data['afterRetryEndPolicies'] as $policy) {
            if (!in_array($policy, self::$availableAfterRetryEndPolicies, true)) {
                throw new DomainException('Invalid afterRetryEndPolicies provided');
            }
        }

        return new self($data);
    }

    /**
     * @return string
     */
    public function getAfterAttemptPolicies()
    {
        return $this->getAttribute('afterAttemptPolicies');
    }

    /**
     * @return string
     */
    public function getAfterRetryEndPolicies()
    {
        return $this->getAttribute('afterRetryEndPolicies');
    }

    /**
     * @return RetryInstructionAttempt[]
     */
    public function getAttempts()
    {
        return $this->getAttribute('attempts');
    }

    /**
     * @param array $data
     *
     * @return RetryInstructionAttempt[]
     */
    public function createAttempts(array $data)
    {
        return array_map(
            function ($element) {
                return new RetryInstructionAttempt($element);
            },
            $data
        );
    }
}
