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

class RuleActionCreateIntuitQuickbooksInvoiceTemplate implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('itemName', $data)) {
            $this->setItemName($data['itemName']);
        }
        if (array_key_exists('itemDescription', $data)) {
            $this->setItemDescription($data['itemDescription']);
        }
        if (array_key_exists('itemSku', $data)) {
            $this->setItemSku($data['itemSku']);
        }
        if (array_key_exists('itemLineDescription', $data)) {
            $this->setItemLineDescription($data['itemLineDescription']);
        }
        if (array_key_exists('taxName', $data)) {
            $this->setTaxName($data['taxName']);
        }
        if (array_key_exists('taxDescription', $data)) {
            $this->setTaxDescription($data['taxDescription']);
        }
        if (array_key_exists('taxSku', $data)) {
            $this->setTaxSku($data['taxSku']);
        }
        if (array_key_exists('taxLineDescription', $data)) {
            $this->setTaxLineDescription($data['taxLineDescription']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getItemName(): ?string
    {
        return $this->fields['itemName'] ?? null;
    }

    public function setItemName(null|string $itemName): static
    {
        $this->fields['itemName'] = $itemName;

        return $this;
    }

    public function getItemDescription(): ?string
    {
        return $this->fields['itemDescription'] ?? null;
    }

    public function setItemDescription(null|string $itemDescription): static
    {
        $this->fields['itemDescription'] = $itemDescription;

        return $this;
    }

    public function getItemSku(): ?string
    {
        return $this->fields['itemSku'] ?? null;
    }

    public function setItemSku(null|string $itemSku): static
    {
        $this->fields['itemSku'] = $itemSku;

        return $this;
    }

    public function getItemLineDescription(): ?string
    {
        return $this->fields['itemLineDescription'] ?? null;
    }

    public function setItemLineDescription(null|string $itemLineDescription): static
    {
        $this->fields['itemLineDescription'] = $itemLineDescription;

        return $this;
    }

    public function getTaxName(): ?string
    {
        return $this->fields['taxName'] ?? null;
    }

    public function setTaxName(null|string $taxName): static
    {
        $this->fields['taxName'] = $taxName;

        return $this;
    }

    public function getTaxDescription(): ?string
    {
        return $this->fields['taxDescription'] ?? null;
    }

    public function setTaxDescription(null|string $taxDescription): static
    {
        $this->fields['taxDescription'] = $taxDescription;

        return $this;
    }

    public function getTaxSku(): ?string
    {
        return $this->fields['taxSku'] ?? null;
    }

    public function setTaxSku(null|string $taxSku): static
    {
        $this->fields['taxSku'] = $taxSku;

        return $this;
    }

    public function getTaxLineDescription(): ?string
    {
        return $this->fields['taxLineDescription'] ?? null;
    }

    public function setTaxLineDescription(null|string $taxLineDescription): static
    {
        $this->fields['taxLineDescription'] = $taxLineDescription;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('itemName', $this->fields)) {
            $data['itemName'] = $this->fields['itemName'];
        }
        if (array_key_exists('itemDescription', $this->fields)) {
            $data['itemDescription'] = $this->fields['itemDescription'];
        }
        if (array_key_exists('itemSku', $this->fields)) {
            $data['itemSku'] = $this->fields['itemSku'];
        }
        if (array_key_exists('itemLineDescription', $this->fields)) {
            $data['itemLineDescription'] = $this->fields['itemLineDescription'];
        }
        if (array_key_exists('taxName', $this->fields)) {
            $data['taxName'] = $this->fields['taxName'];
        }
        if (array_key_exists('taxDescription', $this->fields)) {
            $data['taxDescription'] = $this->fields['taxDescription'];
        }
        if (array_key_exists('taxSku', $this->fields)) {
            $data['taxSku'] = $this->fields['taxSku'];
        }
        if (array_key_exists('taxLineDescription', $this->fields)) {
            $data['taxLineDescription'] = $this->fields['taxLineDescription'];
        }

        return $data;
    }
}
