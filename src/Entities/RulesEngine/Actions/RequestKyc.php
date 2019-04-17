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

namespace Rebilly\Entities\RulesEngine\Actions;

use DomainException;
use Rebilly\Entities\RulesEngine\RuleAction;

/**
 * Class RequestKyc.
 */
final class RequestKyc extends RuleAction
{
    public const UNEXPECTED_POLICY = 'Unexpected policy. Only %s policies are supported';

    public const EXCLUDE_POLICY_NONE = 'none';

    public const EXCLUDE_POLICY_CUSTOMERS_WITH_ACCEPTED_DOCUMENT = 'customers-with-accepted-document';

    public const EXCLUDE_POLICY_CUSTOMERS_WITH_DOCUMENT = 'customers-with-document';

    public const PROMPT_POLICY_BEFORE_TRANSACTION_PROCESS = 'before-transaction-process';

    public const PROMPT_POLICY_AFTER_TRANSACTION_PROCESS = 'after-transaction-process';

    public const REJECTED_BEFORE_TRANSACTION_PROCESS_POLICY_DECLINED = 'process-transaction';

    public const REJECTED_BEFORE_TRANSACTION_PROCESS_POLICY_PROCESS_TRANSACTION = 'process-transaction';

    public const REJECTED_BEFORE_TRANSACTION_PROCESS_POLICY_USE_ALTERNATIVE_GATEWAY = 'use-alternate-gateway';

    public const REJECTED_AFTER_TRANSACTION_PROCESS_POLICY_PROCEED = 'proceed';

    public const OPTIONAL_POLICY_ALLOW_BYPASS = 'allow-bypass';

    public const OPTIONAL_POLICY_ALLOW_USE_ALTERNATIVE_GATEWAY = 'allow-use-alternate-gateway';

    /**
     * @return string[]|array
     */
    public static function excludePolicies(): array
    {
        return [
            self::EXCLUDE_POLICY_NONE,
            self::EXCLUDE_POLICY_CUSTOMERS_WITH_ACCEPTED_DOCUMENT,
            self::EXCLUDE_POLICY_CUSTOMERS_WITH_DOCUMENT,
        ];
    }

    /**
     * @return string[]|array
     */
    public static function promptPolicies(): array
    {
        return [
            self::PROMPT_POLICY_BEFORE_TRANSACTION_PROCESS,
            self::PROMPT_POLICY_AFTER_TRANSACTION_PROCESS,
        ];
    }

    /**
     * @return string[]|array
     */
    public static function rejectedBeforeTransactionProcessPolicies(): array
    {
        return [
            self::REJECTED_BEFORE_TRANSACTION_PROCESS_POLICY_DECLINED,
            self::REJECTED_BEFORE_TRANSACTION_PROCESS_POLICY_PROCESS_TRANSACTION,
            self::REJECTED_BEFORE_TRANSACTION_PROCESS_POLICY_USE_ALTERNATIVE_GATEWAY,
        ];
    }

    /**
     * @return string[]|array
     */
    public static function rejectedAfterTransactionProcessPolicies(): array
    {
        return [
            self::REJECTED_AFTER_TRANSACTION_PROCESS_POLICY_PROCEED,
        ];
    }

    /**
     * @return string[]|array
     */
    public static function optionalPolicies(): array
    {
        return [
            self::OPTIONAL_POLICY_ALLOW_BYPASS,
            self::OPTIONAL_POLICY_ALLOW_USE_ALTERNATIVE_GATEWAY,
        ];
    }

    /**
     * @return string
     */
    public function getExcludePolicy(): string
    {
        return $this->getAttribute('excludePolicy');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setExcludePolicy($value): self
    {
        if (!in_array($value, self::excludePolicies(), true)) {
            throw new DomainException(sprintf(self::UNEXPECTED_POLICY, implode(', ', self::excludePolicies())));
        }

        return $this->setAttribute('excludePolicy', $value);
    }

    /**
     * @return bool
     */
    public function isMandatory(): bool
    {
        return $this->getAttribute('isMandatory');
    }

    /**
     * @param bool $value
     *
     * @return $this
     */
    public function setIsMandatory($value): self
    {
        return $this->setAttribute('isMandatory', $value);
    }

    /**
     * @return string
     */
    public function getPromptPolicy(): string
    {
        return $this->getAttribute('promptPolicy');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPromptPolicy($value): self
    {
        if (!in_array($value, self::promptPolicies(), true)) {
            throw new DomainException(sprintf(self::UNEXPECTED_POLICY, implode(', ', self::promptPolicies())));
        }

        return $this->setAttribute('promptPolicy', $value);
    }

    /**
     * @return string
     */
    public function getRejectedBeforeTransactionProcessPolicy(): string
    {
        return $this->getAttribute('rejectedBeforeTransactionProcessPolicy');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setRejectedBeforeTransactionProcessPolicy($value): self
    {
        if (!in_array($value, self::rejectedBeforeTransactionProcessPolicies(), true)) {
            throw new DomainException(sprintf(self::UNEXPECTED_POLICY, implode(', ', self::rejectedBeforeTransactionProcessPolicies())));
        }

        return $this->setAttribute('rejectedBeforeTransactionProcessPolicy', $value);
    }

    /**
     * @return string
     */
    public function getAlternateGatewayAccountIfRejected(): string
    {
        return $this->getAttribute('alternateGatewayAccountIfRejected');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setAlternateGatewayAccountIfRejected($value): self
    {
        return $this->setAttribute('alternateGatewayAccountIfRejected', $value);
    }

    /**
     * @return string
     */
    public function getRejectedAfterTransactionProcessPolicy(): string
    {
        return $this->getAttribute('rejectedAfterTransactionProcessPolicy');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setRejectedAfterTransactionProcessPolicy($value): self
    {
        if (!in_array($value, self::rejectedAfterTransactionProcessPolicies(), true)) {
            throw new DomainException(sprintf(self::UNEXPECTED_POLICY, implode(', ', self::rejectedAfterTransactionProcessPolicies())));
        }

        return $this->setAttribute('rejectedAfterTransactionProcessPolicy', $value);
    }

    /**
     * @return string
     */
    public function getOptionalPolicy(): string
    {
        return $this->getAttribute('optionalPolicy');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setOptionalPolicy($value): self
    {
        if (!in_array($value, self::optionalPolicies(), true)) {
            throw new DomainException(sprintf(self::UNEXPECTED_POLICY, implode(', ', self::optionalPolicies())));
        }

        return $this->setAttribute('optionalPolicy', $value);
    }

    /**
     * @return string
     */
    public function getAlternateGatewayAccountIfOptional(): string
    {
        return $this->getAttribute('alternateGatewayAccountIfOptional');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setAlternateGatewayAccountIfOptional($value): self
    {
        return $this->setAttribute('alternateGatewayAccountIfOptional', $value);
    }

    /**
     * @return string
     */
    public function getBypassCurrencyToDisplay(): string
    {
        return $this->getAttribute('bypassCurrencyToDisplay');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setBypassCurrencyToDisplay($value): self
    {
        return $this->setAttribute('bypassCurrencyToDisplay', $value);
    }

    /**
     * @inheritdoc
     */
    public function actionName(): string
    {
        return self::NAME_REQUEST_KYC;
    }
}
