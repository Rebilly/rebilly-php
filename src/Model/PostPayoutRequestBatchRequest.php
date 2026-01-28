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

class PostPayoutRequestBatchRequest implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('payoutRequestIds', $data)) {
            $this->setPayoutRequestIds($data['payoutRequestIds']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return string[]
     */
    public function getPayoutRequestIds(): array
    {
        return $this->fields['payoutRequestIds'];
    }

    /**
     * @param string[] $payoutRequestIds
     */
    public function setPayoutRequestIds(array $payoutRequestIds): static
    {
        $this->fields['payoutRequestIds'] = $payoutRequestIds;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->fields['description'] ?? null;
    }

    public function setDescription(null|string $description): static
    {
        $this->fields['description'] = $description;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('payoutRequestIds', $this->fields)) {
            $data['payoutRequestIds'] = $this->fields['payoutRequestIds'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }

        return $data;
    }
}
