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

use DateTimeImmutable;
use JsonSerializable;

class CreditFileMatchesTrades implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('accountNumber', $data)) {
            $this->setAccountNumber($data['accountNumber']);
        }
        if (array_key_exists('dateOpened', $data)) {
            $this->setDateOpened($data['dateOpened']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getName(): ?string
    {
        return $this->fields['name'] ?? null;
    }

    public function setName(null|string $name): self
    {
        $this->fields['name'] = $name;

        return $this;
    }

    public function getAccountNumber(): ?string
    {
        return $this->fields['accountNumber'] ?? null;
    }

    public function setAccountNumber(null|string $accountNumber): self
    {
        $this->fields['accountNumber'] = $accountNumber;

        return $this;
    }

    public function getDateOpened(): ?DateTimeImmutable
    {
        return $this->fields['dateOpened'] ?? null;
    }

    public function setDateOpened(null|DateTimeImmutable|string $dateOpened): self
    {
        if ($dateOpened !== null && !($dateOpened instanceof DateTimeImmutable)) {
            $dateOpened = new DateTimeImmutable($dateOpened);
        }

        $this->fields['dateOpened'] = $dateOpened;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('accountNumber', $this->fields)) {
            $data['accountNumber'] = $this->fields['accountNumber'];
        }
        if (array_key_exists('dateOpened', $this->fields)) {
            $data['dateOpened'] = $this->fields['dateOpened']?->format('Y-m-d');
        }

        return $data;
    }
}
