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

use DateTimeImmutable;
use DateTimeInterface;
use JsonSerializable;

class QuoteInvoicePreviewItems implements JsonSerializable
{
    public const TYPE_DEBIT = 'debit';

    public const TYPE_CREDIT = 'credit';

    private array $fields = [];

    public function __construct(array $data = [])
    {
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
        if (array_key_exists('price', $data)) {
            $this->setPrice($data['price']);
        }
        if (array_key_exists('periodStartTime', $data)) {
            $this->setPeriodStartTime($data['periodStartTime']);
        }
        if (array_key_exists('periodEndTime', $data)) {
            $this->setPeriodEndTime($data['periodEndTime']);
        }
        if (array_key_exists('tax', $data)) {
            $this->setTax($data['tax']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
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

    public function getPrice(): ?float
    {
        return $this->fields['price'] ?? null;
    }

    public function getPeriodStartTime(): ?DateTimeImmutable
    {
        return $this->fields['periodStartTime'] ?? null;
    }

    public function setPeriodStartTime(null|DateTimeImmutable|string $periodStartTime): static
    {
        if ($periodStartTime !== null && !($periodStartTime instanceof DateTimeImmutable)) {
            $periodStartTime = new DateTimeImmutable($periodStartTime);
        }

        $this->fields['periodStartTime'] = $periodStartTime;

        return $this;
    }

    public function getPeriodEndTime(): ?DateTimeImmutable
    {
        return $this->fields['periodEndTime'] ?? null;
    }

    public function setPeriodEndTime(null|DateTimeImmutable|string $periodEndTime): static
    {
        if ($periodEndTime !== null && !($periodEndTime instanceof DateTimeImmutable)) {
            $periodEndTime = new DateTimeImmutable($periodEndTime);
        }

        $this->fields['periodEndTime'] = $periodEndTime;

        return $this;
    }

    public function getTax(): ?InvoiceTaxItem
    {
        return $this->fields['tax'] ?? null;
    }

    public function setTax(null|InvoiceTaxItem|array $tax): static
    {
        if ($tax !== null && !($tax instanceof InvoiceTaxItem)) {
            $tax = InvoiceTaxItem::from($tax);
        }

        $this->fields['tax'] = $tax;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
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
        if (array_key_exists('price', $this->fields)) {
            $data['price'] = $this->fields['price'];
        }
        if (array_key_exists('periodStartTime', $this->fields)) {
            $data['periodStartTime'] = $this->fields['periodStartTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('periodEndTime', $this->fields)) {
            $data['periodEndTime'] = $this->fields['periodEndTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('tax', $this->fields)) {
            $data['tax'] = $this->fields['tax']?->jsonSerialize();
        }

        return $data;
    }

    private function setPrice(null|float|string $price): static
    {
        if (is_string($price)) {
            $price = (float) $price;
        }

        $this->fields['price'] = $price;

        return $this;
    }
}
