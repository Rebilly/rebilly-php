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

class FinTecSystemsSettings implements JsonSerializable
{
    public const RECIPIENT_COUNTRY_AT = 'AT';

    public const RECIPIENT_COUNTRY_CH = 'CH';

    public const RECIPIENT_COUNTRY_DE = 'DE';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('recipientIBAN', $data)) {
            $this->setRecipientIBAN($data['recipientIBAN']);
        }
        if (array_key_exists('recipientBIC', $data)) {
            $this->setRecipientBIC($data['recipientBIC']);
        }
        if (array_key_exists('recipientCountry', $data)) {
            $this->setRecipientCountry($data['recipientCountry']);
        }
        if (array_key_exists('recipientHolder', $data)) {
            $this->setRecipientHolder($data['recipientHolder']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getRecipientIBAN(): string
    {
        return $this->fields['recipientIBAN'];
    }

    public function setRecipientIBAN(string $recipientIBAN): static
    {
        $this->fields['recipientIBAN'] = $recipientIBAN;

        return $this;
    }

    public function getRecipientBIC(): string
    {
        return $this->fields['recipientBIC'];
    }

    public function setRecipientBIC(string $recipientBIC): static
    {
        $this->fields['recipientBIC'] = $recipientBIC;

        return $this;
    }

    public function getRecipientCountry(): string
    {
        return $this->fields['recipientCountry'];
    }

    public function setRecipientCountry(string $recipientCountry): static
    {
        $this->fields['recipientCountry'] = $recipientCountry;

        return $this;
    }

    public function getRecipientHolder(): string
    {
        return $this->fields['recipientHolder'];
    }

    public function setRecipientHolder(string $recipientHolder): static
    {
        $this->fields['recipientHolder'] = $recipientHolder;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('recipientIBAN', $this->fields)) {
            $data['recipientIBAN'] = $this->fields['recipientIBAN'];
        }
        if (array_key_exists('recipientBIC', $this->fields)) {
            $data['recipientBIC'] = $this->fields['recipientBIC'];
        }
        if (array_key_exists('recipientCountry', $this->fields)) {
            $data['recipientCountry'] = $this->fields['recipientCountry'];
        }
        if (array_key_exists('recipientHolder', $this->fields)) {
            $data['recipientHolder'] = $this->fields['recipientHolder'];
        }

        return $data;
    }
}
