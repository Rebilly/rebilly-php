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

class QuickBooksOnlineInvoiceExternalServiceSettings implements JsonSerializable
{
    public const SYNC_MANUALLY = 'manually';

    public const SYNC_WHEN_ISSUED = 'when-issued';

    public const SYNC_ALWAYS = 'always';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('sync', $data)) {
            $this->setSync($data['sync']);
        }
        if (array_key_exists('syncZeroInvoices', $data)) {
            $this->setSyncZeroInvoices($data['syncZeroInvoices']);
        }
        if (array_key_exists('unearnedRevenueAccountId', $data)) {
            $this->setUnearnedRevenueAccountId($data['unearnedRevenueAccountId']);
        }
        if (array_key_exists('taxesAccountId', $data)) {
            $this->setTaxesAccountId($data['taxesAccountId']);
        }
        if (array_key_exists('discountsAccountId', $data)) {
            $this->setDiscountsAccountId($data['discountsAccountId']);
        }
        if (array_key_exists('department', $data)) {
            $this->setDepartment($data['department']);
        }
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

    public function getSync(): ?string
    {
        return $this->fields['sync'] ?? null;
    }

    public function setSync(null|string $sync): static
    {
        $this->fields['sync'] = $sync;

        return $this;
    }

    public function getSyncZeroInvoices(): ?bool
    {
        return $this->fields['syncZeroInvoices'] ?? null;
    }

    public function setSyncZeroInvoices(null|bool $syncZeroInvoices): static
    {
        $this->fields['syncZeroInvoices'] = $syncZeroInvoices;

        return $this;
    }

    public function getUnearnedRevenueAccountId(): ?string
    {
        return $this->fields['unearnedRevenueAccountId'] ?? null;
    }

    public function setUnearnedRevenueAccountId(null|string $unearnedRevenueAccountId): static
    {
        $this->fields['unearnedRevenueAccountId'] = $unearnedRevenueAccountId;

        return $this;
    }

    public function getTaxesAccountId(): ?string
    {
        return $this->fields['taxesAccountId'] ?? null;
    }

    public function setTaxesAccountId(null|string $taxesAccountId): static
    {
        $this->fields['taxesAccountId'] = $taxesAccountId;

        return $this;
    }

    public function getDiscountsAccountId(): ?string
    {
        return $this->fields['discountsAccountId'] ?? null;
    }

    public function setDiscountsAccountId(null|string $discountsAccountId): static
    {
        $this->fields['discountsAccountId'] = $discountsAccountId;

        return $this;
    }

    public function getDepartment(): ?string
    {
        return $this->fields['department'] ?? null;
    }

    public function setDepartment(null|string $department): static
    {
        $this->fields['department'] = $department;

        return $this;
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
        if (array_key_exists('sync', $this->fields)) {
            $data['sync'] = $this->fields['sync'];
        }
        if (array_key_exists('syncZeroInvoices', $this->fields)) {
            $data['syncZeroInvoices'] = $this->fields['syncZeroInvoices'];
        }
        if (array_key_exists('unearnedRevenueAccountId', $this->fields)) {
            $data['unearnedRevenueAccountId'] = $this->fields['unearnedRevenueAccountId'];
        }
        if (array_key_exists('taxesAccountId', $this->fields)) {
            $data['taxesAccountId'] = $this->fields['taxesAccountId'];
        }
        if (array_key_exists('discountsAccountId', $this->fields)) {
            $data['discountsAccountId'] = $this->fields['discountsAccountId'];
        }
        if (array_key_exists('department', $this->fields)) {
            $data['department'] = $this->fields['department'];
        }
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
