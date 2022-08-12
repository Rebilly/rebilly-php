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

class CreateIntuitQuickbooksRevenueRecognitionEntry extends RuleAction
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'name' => 'create-intuit-quickbooks-revenue-recognition-entry',
        ] + $data);

        if (array_key_exists('debitAccount', $data)) {
            $this->setDebitAccount($data['debitAccount']);
        }
        if (array_key_exists('creditAccount', $data)) {
            $this->setCreditAccount($data['creditAccount']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        if (array_key_exists('credentialHash', $data)) {
            $this->setCredentialHash($data['credentialHash']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getDebitAccount(): string
    {
        return $this->fields['debitAccount'];
    }

    public function setDebitAccount(string $debitAccount): self
    {
        $this->fields['debitAccount'] = $debitAccount;

        return $this;
    }

    public function getCreditAccount(): string
    {
        return $this->fields['creditAccount'];
    }

    public function setCreditAccount(string $creditAccount): self
    {
        $this->fields['creditAccount'] = $creditAccount;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->fields['description'];
    }

    public function setDescription(string $description): self
    {
        $this->fields['description'] = $description;

        return $this;
    }

    public function getCredentialHash(): string
    {
        return $this->fields['credentialHash'];
    }

    public function setCredentialHash(string $credentialHash): self
    {
        $this->fields['credentialHash'] = $credentialHash;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('debitAccount', $this->fields)) {
            $data['debitAccount'] = $this->fields['debitAccount'];
        }
        if (array_key_exists('creditAccount', $this->fields)) {
            $data['creditAccount'] = $this->fields['creditAccount'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('credentialHash', $this->fields)) {
            $data['credentialHash'] = $this->fields['credentialHash'];
        }

        return parent::jsonSerialize() + $data;
    }
}
