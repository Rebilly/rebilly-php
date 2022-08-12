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

class CreateTaxjarTransaction extends RuleAction
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'name' => 'create-taxjar-transaction',
        ] + $data);

        if (array_key_exists('taxjarCredentialHash', $data)) {
            $this->setTaxjarCredentialHash($data['taxjarCredentialHash']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getTaxjarCredentialHash(): string
    {
        return $this->fields['taxjarCredentialHash'];
    }

    public function setTaxjarCredentialHash(string $taxjarCredentialHash): self
    {
        $this->fields['taxjarCredentialHash'] = $taxjarCredentialHash;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('taxjarCredentialHash', $this->fields)) {
            $data['taxjarCredentialHash'] = $this->fields['taxjarCredentialHash'];
        }

        return parent::jsonSerialize() + $data;
    }
}
