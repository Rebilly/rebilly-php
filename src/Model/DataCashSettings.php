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

class DataCashSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('policy', $data)) {
            $this->setPolicy($data['policy']);
        }
        if (array_key_exists('delay', $data)) {
            $this->setDelay($data['delay']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPolicy(): ?int
    {
        return $this->fields['policy'] ?? null;
    }

    public function setPolicy(null|int $policy): self
    {
        $this->fields['policy'] = $policy;

        return $this;
    }

    public function getDelay(): ?int
    {
        return $this->fields['delay'] ?? null;
    }

    public function setDelay(null|int $delay): self
    {
        $this->fields['delay'] = $delay;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('policy', $this->fields)) {
            $data['policy'] = $this->fields['policy'];
        }
        if (array_key_exists('delay', $this->fields)) {
            $data['delay'] = $this->fields['delay'];
        }

        return $data;
    }
}
