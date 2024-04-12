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

class RuleActionScheduleInvoiceRetry extends RuleAction
{
    public const AFTER_ATTEMPT_POLICIES_CHANGE_SUBSCRIPTION_RENEWAL_TIME = 'change-subscription-renewal-time';

    public const AFTER_RETRY_END_POLICIES_ABANDON_INVOICE = 'abandon-invoice';

    public const AFTER_RETRY_END_POLICIES_CANCEL_SUBSCRIPTION = 'cancel-subscription';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'name' => 'schedule-invoice-retry',
        ] + $data);

        if (array_key_exists('attempts', $data)) {
            $this->setAttempts($data['attempts']);
        }
        if (array_key_exists('afterAttemptPolicies', $data)) {
            $this->setAfterAttemptPolicies($data['afterAttemptPolicies']);
        }
        if (array_key_exists('afterRetryEndPolicies', $data)) {
            $this->setAfterRetryEndPolicies($data['afterRetryEndPolicies']);
        }
        if (array_key_exists('overrideRetryInstruction', $data)) {
            $this->setOverrideRetryInstruction($data['overrideRetryInstruction']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return RuleActionScheduleInvoiceRetryAttempts[]
     */
    public function getAttempts(): array
    {
        return $this->fields['attempts'];
    }

    /**
     * @param array[]|RuleActionScheduleInvoiceRetryAttempts[] $attempts
     */
    public function setAttempts(array $attempts): static
    {
        $attempts = array_map(
            fn ($value) => $value instanceof RuleActionScheduleInvoiceRetryAttempts ? $value : RuleActionScheduleInvoiceRetryAttempts::from($value),
            $attempts,
        );

        $this->fields['attempts'] = $attempts;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getAfterAttemptPolicies(): array
    {
        return $this->fields['afterAttemptPolicies'];
    }

    /**
     * @param string[] $afterAttemptPolicies
     */
    public function setAfterAttemptPolicies(array $afterAttemptPolicies): static
    {
        $this->fields['afterAttemptPolicies'] = $afterAttemptPolicies;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getAfterRetryEndPolicies(): array
    {
        return $this->fields['afterRetryEndPolicies'];
    }

    /**
     * @param string[] $afterRetryEndPolicies
     */
    public function setAfterRetryEndPolicies(array $afterRetryEndPolicies): static
    {
        $this->fields['afterRetryEndPolicies'] = $afterRetryEndPolicies;

        return $this;
    }

    public function getOverrideRetryInstruction(): bool
    {
        return $this->fields['overrideRetryInstruction'];
    }

    public function setOverrideRetryInstruction(bool $overrideRetryInstruction): static
    {
        $this->fields['overrideRetryInstruction'] = $overrideRetryInstruction;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('attempts', $this->fields)) {
            $data['attempts'] = array_map(
                static fn (RuleActionScheduleInvoiceRetryAttempts $ruleActionScheduleInvoiceRetryAttempts) => $ruleActionScheduleInvoiceRetryAttempts->jsonSerialize(),
                $this->fields['attempts'],
            );
        }
        if (array_key_exists('afterAttemptPolicies', $this->fields)) {
            $data['afterAttemptPolicies'] = $this->fields['afterAttemptPolicies'];
        }
        if (array_key_exists('afterRetryEndPolicies', $this->fields)) {
            $data['afterRetryEndPolicies'] = $this->fields['afterRetryEndPolicies'];
        }
        if (array_key_exists('overrideRetryInstruction', $this->fields)) {
            $data['overrideRetryInstruction'] = $this->fields['overrideRetryInstruction'];
        }

        return parent::jsonSerialize() + $data;
    }
}
