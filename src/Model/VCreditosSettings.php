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

class VCreditosSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('merchantWebsiteLoginLabel', $data)) {
            $this->setMerchantWebsiteLoginLabel($data['merchantWebsiteLoginLabel']);
        }
        if (array_key_exists('merchantWebsiteLoginDescription', $data)) {
            $this->setMerchantWebsiteLoginDescription($data['merchantWebsiteLoginDescription']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMerchantWebsiteLoginLabel(): ?string
    {
        return $this->fields['merchantWebsiteLoginLabel'] ?? null;
    }

    public function setMerchantWebsiteLoginLabel(null|string $merchantWebsiteLoginLabel): static
    {
        $this->fields['merchantWebsiteLoginLabel'] = $merchantWebsiteLoginLabel;

        return $this;
    }

    public function getMerchantWebsiteLoginDescription(): ?string
    {
        return $this->fields['merchantWebsiteLoginDescription'] ?? null;
    }

    public function setMerchantWebsiteLoginDescription(null|string $merchantWebsiteLoginDescription): static
    {
        $this->fields['merchantWebsiteLoginDescription'] = $merchantWebsiteLoginDescription;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchantWebsiteLoginLabel', $this->fields)) {
            $data['merchantWebsiteLoginLabel'] = $this->fields['merchantWebsiteLoginLabel'];
        }
        if (array_key_exists('merchantWebsiteLoginDescription', $this->fields)) {
            $data['merchantWebsiteLoginDescription'] = $this->fields['merchantWebsiteLoginDescription'];
        }

        return $data;
    }
}
