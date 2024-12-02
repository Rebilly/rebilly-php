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

class ReportDeclinedTransactionsData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('message', $data)) {
            $this->setMessage($data['message']);
        }
        if (array_key_exists('count', $data)) {
            $this->setCount($data['count']);
        }
        if (array_key_exists('percentage', $data)) {
            $this->setPercentage($data['percentage']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMessage(): ?string
    {
        return $this->fields['message'] ?? null;
    }

    public function setMessage(null|string $message): static
    {
        $this->fields['message'] = $message;

        return $this;
    }

    public function getCount(): ?int
    {
        return $this->fields['count'] ?? null;
    }

    public function setCount(null|int $count): static
    {
        $this->fields['count'] = $count;

        return $this;
    }

    public function getPercentage(): ?float
    {
        return $this->fields['percentage'] ?? null;
    }

    public function setPercentage(null|float|string $percentage): static
    {
        if (is_string($percentage)) {
            $percentage = (float) $percentage;
        }

        $this->fields['percentage'] = $percentage;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('message', $this->fields)) {
            $data['message'] = $this->fields['message'];
        }
        if (array_key_exists('count', $this->fields)) {
            $data['count'] = $this->fields['count'];
        }
        if (array_key_exists('percentage', $this->fields)) {
            $data['percentage'] = $this->fields['percentage'];
        }

        return $data;
    }
}
