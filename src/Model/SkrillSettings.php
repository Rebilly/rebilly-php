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

class SkrillSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('merchantFields', $data)) {
            $this->setMerchantFields($data['merchantFields']);
        }
        if (array_key_exists('useSPX', $data)) {
            $this->setUseSPX($data['useSPX']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMerchantFields(): ?string
    {
        return $this->fields['merchantFields'] ?? null;
    }

    public function setMerchantFields(null|string $merchantFields): static
    {
        $this->fields['merchantFields'] = $merchantFields;

        return $this;
    }

    public function getUseSPX(): ?bool
    {
        return $this->fields['useSPX'] ?? null;
    }

    public function setUseSPX(null|bool $useSPX): static
    {
        $this->fields['useSPX'] = $useSPX;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchantFields', $this->fields)) {
            $data['merchantFields'] = $this->fields['merchantFields'];
        }
        if (array_key_exists('useSPX', $this->fields)) {
            $data['useSPX'] = $this->fields['useSPX'];
        }

        return $data;
    }
}
