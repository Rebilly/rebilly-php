<?php
/**
 * Created by PhpStorm.
 * User: vasile
 * Date: 2019-03-15
 * Time: 10:10
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

        if (!in_array($data['afterAttemptPolicies'], self::$availableAfterAttemptPolicies, true)) {
            throw new DomainException('Invalid afterAttemptPolicies provided');
        }

        if (!in_array($data['afterRetryEndPolicies'], self::$availableAfterRetryEndPolicies, true)) {
            throw new DomainException('Invalid afterRetryEndPolicies provided');
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
