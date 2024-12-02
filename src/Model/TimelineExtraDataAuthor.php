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

class TimelineExtraDataAuthor implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('userFullName', $data)) {
            $this->setUserFullName($data['userFullName']);
        }
        if (array_key_exists('userId', $data)) {
            $this->setUserId($data['userId']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getUserFullName(): ?string
    {
        return $this->fields['userFullName'] ?? null;
    }

    public function setUserFullName(null|string $userFullName): static
    {
        $this->fields['userFullName'] = $userFullName;

        return $this;
    }

    public function getUserId(): ?string
    {
        return $this->fields['userId'] ?? null;
    }

    public function setUserId(null|string $userId): static
    {
        $this->fields['userId'] = $userId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('userFullName', $this->fields)) {
            $data['userFullName'] = $this->fields['userFullName'];
        }
        if (array_key_exists('userId', $this->fields)) {
            $data['userId'] = $this->fields['userId'];
        }

        return $data;
    }
}
