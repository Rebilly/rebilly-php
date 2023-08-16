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

class AMLPassport implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('number', $data)) {
            $this->setNumber($data['number']);
        }
        if (array_key_exists('registrationDate', $data)) {
            $this->setRegistrationDate($data['registrationDate']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getNumber(): ?string
    {
        return $this->fields['number'] ?? null;
    }

    public function getRegistrationDate(): ?DateTimeImmutable
    {
        return $this->fields['registrationDate'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('number', $this->fields)) {
            $data['number'] = $this->fields['number'];
        }
        if (array_key_exists('registrationDate', $this->fields)) {
            $data['registrationDate'] = $this->fields['registrationDate']?->format('Y-m-d');
        }

        return $data;
    }

    private function setNumber(null|string $number): static
    {
        $this->fields['number'] = $number;

        return $this;
    }

    private function setRegistrationDate(null|DateTimeImmutable|string $registrationDate): static
    {
        if ($registrationDate !== null && !($registrationDate instanceof DateTimeImmutable)) {
            $registrationDate = new DateTimeImmutable($registrationDate);
        }

        $this->fields['registrationDate'] = $registrationDate;

        return $this;
    }
}
