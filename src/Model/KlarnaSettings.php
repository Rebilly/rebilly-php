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

class KlarnaSettings implements JsonSerializable
{
    public const REGION_EU = 'EU';

    public const REGION_NA = 'NA';

    public const REGION_OC = 'OC';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('region', $data)) {
            $this->setRegion($data['region']);
        }
        if (array_key_exists('usePayNowStandalone', $data)) {
            $this->setUsePayNowStandalone($data['usePayNowStandalone']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getRegion(): string
    {
        return $this->fields['region'];
    }

    public function setRegion(string $region): static
    {
        $this->fields['region'] = $region;

        return $this;
    }

    public function getUsePayNowStandalone(): ?bool
    {
        return $this->fields['usePayNowStandalone'] ?? null;
    }

    public function setUsePayNowStandalone(null|bool $usePayNowStandalone): static
    {
        $this->fields['usePayNowStandalone'] = $usePayNowStandalone;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('region', $this->fields)) {
            $data['region'] = $this->fields['region'];
        }
        if (array_key_exists('usePayNowStandalone', $this->fields)) {
            $data['usePayNowStandalone'] = $this->fields['usePayNowStandalone'];
        }

        return $data;
    }
}
