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

use Rebilly\Sdk\Trait\HasMetadata;

class RuleActionCreateIntuitQuickbooksPayment extends RuleAction
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        parent::__construct([
            'name' => 'create-intuit-quickbooks-payment',
        ] + $data, $metadata);

        if (array_key_exists('depositAccount', $data)) {
            $this->setDepositAccount($data['depositAccount']);
        }
        if (array_key_exists('credentialHash', $data)) {
            $this->setCredentialHash($data['credentialHash']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getDepositAccount(): string
    {
        return $this->fields['depositAccount'];
    }

    public function setDepositAccount(string $depositAccount): static
    {
        $this->fields['depositAccount'] = $depositAccount;

        return $this;
    }

    public function getCredentialHash(): string
    {
        return $this->fields['credentialHash'];
    }

    public function setCredentialHash(string $credentialHash): static
    {
        $this->fields['credentialHash'] = $credentialHash;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('depositAccount', $this->fields)) {
            $data['depositAccount'] = $this->fields['depositAccount'];
        }
        if (array_key_exists('credentialHash', $this->fields)) {
            $data['credentialHash'] = $this->fields['credentialHash'];
        }

        return parent::jsonSerialize() + $data;
    }
}
