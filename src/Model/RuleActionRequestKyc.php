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

class RuleActionRequestKyc extends RuleAction
{
    public const EXCLUDE_POLICY_CUSTOMERS_WITH_ACCEPTED_DOCUMENT = 'customers-with-accepted-document';

    public const EXCLUDE_POLICY_CUSTOMERS_WITH_DOCUMENT = 'customers-with-document';

    public const EXCLUDE_POLICY_NONE = 'none';

    public const PROMPT_POLICY_BEFORE_TRANSACTION_PROCESS = 'before-transaction-process';

    public const PROMPT_POLICY_AFTER_TRANSACTION_PROCESS = 'after-transaction-process';

    public const REJECTED_BEFORE_TRANSACTION_PROCESS_POLICY_PROCESS_TRANSACTION = 'process-transaction';

    public const REJECTED_BEFORE_TRANSACTION_PROCESS_POLICY_DECLINE = 'decline';

    public const REJECTED_BEFORE_TRANSACTION_PROCESS_POLICY_USE_ALTERNATE_GATEWAY = 'use-alternate-gateway';

    public const REJECTED_AFTER_TRANSACTION_PROCESS_POLICY_PROCEED = 'proceed';

    public const OPTIONAL_POLICY_BYPASS = 'allow-bypass';

    public const OPTIONAL_POLICY_USE_ALTERNATE_GATEWAY = 'allow-use-alternate-gateway';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'name' => 'request-kyc',
        ] + $data);

        if (array_key_exists('documents', $data)) {
            $this->setDocuments($data['documents']);
        }
        if (array_key_exists('excludePolicy', $data)) {
            $this->setExcludePolicy($data['excludePolicy']);
        }
        if (array_key_exists('isMandatory', $data)) {
            $this->setIsMandatory($data['isMandatory']);
        }
        if (array_key_exists('promptPolicy', $data)) {
            $this->setPromptPolicy($data['promptPolicy']);
        }
        if (array_key_exists('rejectedBeforeTransactionProcessPolicy', $data)) {
            $this->setRejectedBeforeTransactionProcessPolicy($data['rejectedBeforeTransactionProcessPolicy']);
        }
        if (array_key_exists('alternateGatewayAccountIfRejected', $data)) {
            $this->setAlternateGatewayAccountIfRejected($data['alternateGatewayAccountIfRejected']);
        }
        if (array_key_exists('rejectedAfterTransactionProcessPolicy', $data)) {
            $this->setRejectedAfterTransactionProcessPolicy($data['rejectedAfterTransactionProcessPolicy']);
        }
        if (array_key_exists('optionalPolicy', $data)) {
            $this->setOptionalPolicy($data['optionalPolicy']);
        }
        if (array_key_exists('alternateGatewayAccountIfOptional', $data)) {
            $this->setAlternateGatewayAccountIfOptional($data['alternateGatewayAccountIfOptional']);
        }
        if (array_key_exists('bypassCurrencyToDisplay', $data)) {
            $this->setBypassCurrencyToDisplay($data['bypassCurrencyToDisplay']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return KycRequestDocument[]
     */
    public function getDocuments(): array
    {
        return $this->fields['documents'];
    }

    /**
     * @param array[]|KycRequestDocument[] $documents
     */
    public function setDocuments(array $documents): static
    {
        $documents = array_map(
            fn ($value) => $value instanceof KycRequestDocument ? $value : KycRequestDocument::from($value),
            $documents,
        );

        $this->fields['documents'] = $documents;

        return $this;
    }

    public function getExcludePolicy(): string
    {
        return $this->fields['excludePolicy'];
    }

    public function setExcludePolicy(string $excludePolicy): static
    {
        $this->fields['excludePolicy'] = $excludePolicy;

        return $this;
    }

    public function getIsMandatory(): bool
    {
        return $this->fields['isMandatory'];
    }

    public function setIsMandatory(bool $isMandatory): static
    {
        $this->fields['isMandatory'] = $isMandatory;

        return $this;
    }

    public function getPromptPolicy(): string
    {
        return $this->fields['promptPolicy'];
    }

    public function setPromptPolicy(string $promptPolicy): static
    {
        $this->fields['promptPolicy'] = $promptPolicy;

        return $this;
    }

    public function getRejectedBeforeTransactionProcessPolicy(): string
    {
        return $this->fields['rejectedBeforeTransactionProcessPolicy'];
    }

    public function setRejectedBeforeTransactionProcessPolicy(string $rejectedBeforeTransactionProcessPolicy): static
    {
        $this->fields['rejectedBeforeTransactionProcessPolicy'] = $rejectedBeforeTransactionProcessPolicy;

        return $this;
    }

    public function getAlternateGatewayAccountIfRejected(): ?string
    {
        return $this->fields['alternateGatewayAccountIfRejected'] ?? null;
    }

    public function setAlternateGatewayAccountIfRejected(null|string $alternateGatewayAccountIfRejected): static
    {
        $this->fields['alternateGatewayAccountIfRejected'] = $alternateGatewayAccountIfRejected;

        return $this;
    }

    public function getRejectedAfterTransactionProcessPolicy(): string
    {
        return $this->fields['rejectedAfterTransactionProcessPolicy'];
    }

    public function setRejectedAfterTransactionProcessPolicy(string $rejectedAfterTransactionProcessPolicy): static
    {
        $this->fields['rejectedAfterTransactionProcessPolicy'] = $rejectedAfterTransactionProcessPolicy;

        return $this;
    }

    public function getOptionalPolicy(): string
    {
        return $this->fields['optionalPolicy'];
    }

    public function setOptionalPolicy(string $optionalPolicy): static
    {
        $this->fields['optionalPolicy'] = $optionalPolicy;

        return $this;
    }

    public function getAlternateGatewayAccountIfOptional(): ?string
    {
        return $this->fields['alternateGatewayAccountIfOptional'] ?? null;
    }

    public function setAlternateGatewayAccountIfOptional(null|string $alternateGatewayAccountIfOptional): static
    {
        $this->fields['alternateGatewayAccountIfOptional'] = $alternateGatewayAccountIfOptional;

        return $this;
    }

    public function getBypassCurrencyToDisplay(): ?string
    {
        return $this->fields['bypassCurrencyToDisplay'] ?? null;
    }

    public function setBypassCurrencyToDisplay(null|string $bypassCurrencyToDisplay): static
    {
        $this->fields['bypassCurrencyToDisplay'] = $bypassCurrencyToDisplay;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('documents', $this->fields)) {
            $data['documents'] = $this->fields['documents'];
        }
        if (array_key_exists('excludePolicy', $this->fields)) {
            $data['excludePolicy'] = $this->fields['excludePolicy'];
        }
        if (array_key_exists('isMandatory', $this->fields)) {
            $data['isMandatory'] = $this->fields['isMandatory'];
        }
        if (array_key_exists('promptPolicy', $this->fields)) {
            $data['promptPolicy'] = $this->fields['promptPolicy'];
        }
        if (array_key_exists('rejectedBeforeTransactionProcessPolicy', $this->fields)) {
            $data['rejectedBeforeTransactionProcessPolicy'] = $this->fields['rejectedBeforeTransactionProcessPolicy'];
        }
        if (array_key_exists('alternateGatewayAccountIfRejected', $this->fields)) {
            $data['alternateGatewayAccountIfRejected'] = $this->fields['alternateGatewayAccountIfRejected'];
        }
        if (array_key_exists('rejectedAfterTransactionProcessPolicy', $this->fields)) {
            $data['rejectedAfterTransactionProcessPolicy'] = $this->fields['rejectedAfterTransactionProcessPolicy'];
        }
        if (array_key_exists('optionalPolicy', $this->fields)) {
            $data['optionalPolicy'] = $this->fields['optionalPolicy'];
        }
        if (array_key_exists('alternateGatewayAccountIfOptional', $this->fields)) {
            $data['alternateGatewayAccountIfOptional'] = $this->fields['alternateGatewayAccountIfOptional'];
        }
        if (array_key_exists('bypassCurrencyToDisplay', $this->fields)) {
            $data['bypassCurrencyToDisplay'] = $this->fields['bypassCurrencyToDisplay'];
        }

        return parent::jsonSerialize() + $data;
    }
}
