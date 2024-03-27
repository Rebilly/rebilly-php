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

class QuoteChangeOrderUsageSettings implements JsonSerializable
{
    public const POLICY_RESET = 'reset';

    public const POLICY_TRANSFER = 'transfer';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('planId', $data)) {
            $this->setPlanId($data['planId']);
        }
        if (array_key_exists('policy', $data)) {
            $this->setPolicy($data['policy']);
        }
        if (array_key_exists('transferTo', $data)) {
            $this->setTransferTo($data['transferTo']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPlanId(): ?string
    {
        return $this->fields['planId'] ?? null;
    }

    public function setPlanId(null|string $planId): static
    {
        $this->fields['planId'] = $planId;

        return $this;
    }

    public function getPolicy(): ?string
    {
        return $this->fields['policy'] ?? null;
    }

    public function setPolicy(null|string $policy): static
    {
        $this->fields['policy'] = $policy;

        return $this;
    }

    public function getTransferTo(): ?string
    {
        return $this->fields['transferTo'] ?? null;
    }

    public function setTransferTo(null|string $transferTo): static
    {
        $this->fields['transferTo'] = $transferTo;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('planId', $this->fields)) {
            $data['planId'] = $this->fields['planId'];
        }
        if (array_key_exists('policy', $this->fields)) {
            $data['policy'] = $this->fields['policy'];
        }
        if (array_key_exists('transferTo', $this->fields)) {
            $data['transferTo'] = $this->fields['transferTo'];
        }

        return $data;
    }
}
