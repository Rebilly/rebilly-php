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

class KonnektiveSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('campaignId', $data)) {
            $this->setCampaignId($data['campaignId']);
        }
        if (array_key_exists('productId', $data)) {
            $this->setProductId($data['productId']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCampaignId(): string
    {
        return $this->fields['campaignId'];
    }

    public function setCampaignId(string $campaignId): static
    {
        $this->fields['campaignId'] = $campaignId;

        return $this;
    }

    public function getProductId(): string
    {
        return $this->fields['productId'];
    }

    public function setProductId(string $productId): static
    {
        $this->fields['productId'] = $productId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('campaignId', $this->fields)) {
            $data['campaignId'] = $this->fields['campaignId'];
        }
        if (array_key_exists('productId', $this->fields)) {
            $data['productId'] = $this->fields['productId'];
        }

        return $data;
    }
}
