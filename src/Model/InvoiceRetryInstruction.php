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

class InvoiceRetryInstruction implements JsonSerializable
{
    public const AFTER_ATTEMPT_POLICIES_CHANGE_SUBSCRIPTION_RENEWAL_TIME = 'change-subscription-renewal-time';

    public const AFTER_RETRY_END_POLICIES_ABANDON_INVOICE = 'abandon-invoice';

    public const AFTER_RETRY_END_POLICIES_CANCEL_SUBSCRIPTION = 'cancel-subscription';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('attempts', $data)) {
            $this->setAttempts($data['attempts']);
        }
        if (array_key_exists('afterAttemptPolicies', $data)) {
            $this->setAfterAttemptPolicies($data['afterAttemptPolicies']);
        }
        if (array_key_exists('afterRetryEndPolicies', $data)) {
            $this->setAfterRetryEndPolicies($data['afterRetryEndPolicies']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return InvoiceRetryInstructionAttempts[]
     */
    public function getAttempts(): array
    {
        return $this->fields['attempts'];
    }

    /**
     * @param array[]|InvoiceRetryInstructionAttempts[] $attempts
     */
    public function setAttempts(array $attempts): static
    {
        $attempts = array_map(
            fn ($value) => $value instanceof InvoiceRetryInstructionAttempts ? $value : InvoiceRetryInstructionAttempts::from($value),
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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('attempts', $this->fields)) {
            $data['attempts'] = array_map(
                static fn (InvoiceRetryInstructionAttempts $invoiceRetryInstructionAttempts) => $invoiceRetryInstructionAttempts->jsonSerialize(),
                $this->fields['attempts'],
            );
        }
        if (array_key_exists('afterAttemptPolicies', $this->fields)) {
            $data['afterAttemptPolicies'] = $this->fields['afterAttemptPolicies'];
        }
        if (array_key_exists('afterRetryEndPolicies', $this->fields)) {
            $data['afterRetryEndPolicies'] = $this->fields['afterRetryEndPolicies'];
        }

        return $data;
    }
}
