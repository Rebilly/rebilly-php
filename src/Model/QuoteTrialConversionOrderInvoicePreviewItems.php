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

class QuoteTrialConversionOrderInvoicePreviewItems implements JsonSerializable
{
    public const TYPE_DEBIT = 'debit';

    public const TYPE_CREDIT = 'credit';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('quoteItemId', $data)) {
            $this->setQuoteItemId($data['quoteItemId']);
        }
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        if (array_key_exists('priceDescription', $data)) {
            $this->setPriceDescription($data['priceDescription']);
        }
        if (array_key_exists('unitPrice', $data)) {
            $this->setUnitPrice($data['unitPrice']);
        }
        if (array_key_exists('quantity', $data)) {
            $this->setQuantity($data['quantity']);
        }
        if (array_key_exists('period', $data)) {
            $this->setPeriod($data['period']);
        }
        if (array_key_exists('setupUnitPrice', $data)) {
            $this->setSetupUnitPrice($data['setupUnitPrice']);
        }
        if (array_key_exists('trialUnitPrice', $data)) {
            $this->setTrialUnitPrice($data['trialUnitPrice']);
        }
        if (array_key_exists('trialPeriod', $data)) {
            $this->setTrialPeriod($data['trialPeriod']);
        }
        if (array_key_exists('taxAmount', $data)) {
            $this->setTaxAmount($data['taxAmount']);
        }
        if (array_key_exists('setupTaxAmount', $data)) {
            $this->setSetupTaxAmount($data['setupTaxAmount']);
        }
        if (array_key_exists('trialTaxAmount', $data)) {
            $this->setTrialTaxAmount($data['trialTaxAmount']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getQuoteItemId(): ?string
    {
        return $this->fields['quoteItemId'] ?? null;
    }

    public function setQuoteItemId(null|string $quoteItemId): static
    {
        $this->fields['quoteItemId'] = $quoteItemId;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->fields['type'] ?? null;
    }

    public function setType(null|string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->fields['name'] ?? null;
    }

    public function setName(null|string $name): static
    {
        $this->fields['name'] = $name;

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

    public function getPriceDescription(): ?string
    {
        return $this->fields['priceDescription'] ?? null;
    }

    public function setPriceDescription(null|string $priceDescription): static
    {
        $this->fields['priceDescription'] = $priceDescription;

        return $this;
    }

    public function getUnitPrice(): ?float
    {
        return $this->fields['unitPrice'] ?? null;
    }

    public function setUnitPrice(null|float|string $unitPrice): static
    {
        if (is_string($unitPrice)) {
            $unitPrice = (float) $unitPrice;
        }

        $this->fields['unitPrice'] = $unitPrice;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->fields['quantity'] ?? null;
    }

    public function setQuantity(null|int $quantity): static
    {
        $this->fields['quantity'] = $quantity;

        return $this;
    }

    public function getPeriod(): ?string
    {
        return $this->fields['period'] ?? null;
    }

    public function setPeriod(null|string $period): static
    {
        $this->fields['period'] = $period;

        return $this;
    }

    public function getSetupUnitPrice(): ?float
    {
        return $this->fields['setupUnitPrice'] ?? null;
    }

    public function setSetupUnitPrice(null|float|string $setupUnitPrice): static
    {
        if (is_string($setupUnitPrice)) {
            $setupUnitPrice = (float) $setupUnitPrice;
        }

        $this->fields['setupUnitPrice'] = $setupUnitPrice;

        return $this;
    }

    public function getTrialUnitPrice(): ?float
    {
        return $this->fields['trialUnitPrice'] ?? null;
    }

    public function setTrialUnitPrice(null|float|string $trialUnitPrice): static
    {
        if (is_string($trialUnitPrice)) {
            $trialUnitPrice = (float) $trialUnitPrice;
        }

        $this->fields['trialUnitPrice'] = $trialUnitPrice;

        return $this;
    }

    public function getTrialPeriod(): ?string
    {
        return $this->fields['trialPeriod'] ?? null;
    }

    public function setTrialPeriod(null|string $trialPeriod): static
    {
        $this->fields['trialPeriod'] = $trialPeriod;

        return $this;
    }

    public function getTaxAmount(): ?float
    {
        return $this->fields['taxAmount'] ?? null;
    }

    public function setTaxAmount(null|float|string $taxAmount): static
    {
        if (is_string($taxAmount)) {
            $taxAmount = (float) $taxAmount;
        }

        $this->fields['taxAmount'] = $taxAmount;

        return $this;
    }

    public function getSetupTaxAmount(): ?float
    {
        return $this->fields['setupTaxAmount'] ?? null;
    }

    public function setSetupTaxAmount(null|float|string $setupTaxAmount): static
    {
        if (is_string($setupTaxAmount)) {
            $setupTaxAmount = (float) $setupTaxAmount;
        }

        $this->fields['setupTaxAmount'] = $setupTaxAmount;

        return $this;
    }

    public function getTrialTaxAmount(): ?float
    {
        return $this->fields['trialTaxAmount'] ?? null;
    }

    public function setTrialTaxAmount(null|float|string $trialTaxAmount): static
    {
        if (is_string($trialTaxAmount)) {
            $trialTaxAmount = (float) $trialTaxAmount;
        }

        $this->fields['trialTaxAmount'] = $trialTaxAmount;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('quoteItemId', $this->fields)) {
            $data['quoteItemId'] = $this->fields['quoteItemId'];
        }
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('priceDescription', $this->fields)) {
            $data['priceDescription'] = $this->fields['priceDescription'];
        }
        if (array_key_exists('unitPrice', $this->fields)) {
            $data['unitPrice'] = $this->fields['unitPrice'];
        }
        if (array_key_exists('quantity', $this->fields)) {
            $data['quantity'] = $this->fields['quantity'];
        }
        if (array_key_exists('period', $this->fields)) {
            $data['period'] = $this->fields['period'];
        }
        if (array_key_exists('setupUnitPrice', $this->fields)) {
            $data['setupUnitPrice'] = $this->fields['setupUnitPrice'];
        }
        if (array_key_exists('trialUnitPrice', $this->fields)) {
            $data['trialUnitPrice'] = $this->fields['trialUnitPrice'];
        }
        if (array_key_exists('trialPeriod', $this->fields)) {
            $data['trialPeriod'] = $this->fields['trialPeriod'];
        }
        if (array_key_exists('taxAmount', $this->fields)) {
            $data['taxAmount'] = $this->fields['taxAmount'];
        }
        if (array_key_exists('setupTaxAmount', $this->fields)) {
            $data['setupTaxAmount'] = $this->fields['setupTaxAmount'];
        }
        if (array_key_exists('trialTaxAmount', $this->fields)) {
            $data['trialTaxAmount'] = $this->fields['trialTaxAmount'];
        }

        return $data;
    }
}
