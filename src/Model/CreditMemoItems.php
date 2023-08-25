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

class CreditMemoItems implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('invoiceItemId', $data)) {
            $this->setInvoiceItemId($data['invoiceItemId']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
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
        if (array_key_exists('productId', $data)) {
            $this->setProductId($data['productId']);
        }
        if (array_key_exists('planId', $data)) {
            $this->setPlanId($data['planId']);
        }
        if (array_key_exists('tax', $data)) {
            $this->setTax($data['tax']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getInvoiceItemId(): ?string
    {
        return $this->fields['invoiceItemId'] ?? null;
    }

    public function setInvoiceItemId(null|string $invoiceItemId): static
    {
        $this->fields['invoiceItemId'] = $invoiceItemId;

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

    public function getUnitPrice(): float
    {
        return $this->fields['unitPrice'];
    }

    public function setUnitPrice(float|string $unitPrice): static
    {
        if (is_string($unitPrice)) {
            $unitPrice = (float) $unitPrice;
        }

        $this->fields['unitPrice'] = $unitPrice;

        return $this;
    }

    public function getQuantity(): int
    {
        return $this->fields['quantity'];
    }

    public function setQuantity(int $quantity): static
    {
        $this->fields['quantity'] = $quantity;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->fields['price'] ?? null;
    }

    public function getProductId(): ?string
    {
        return $this->fields['productId'] ?? null;
    }

    public function setProductId(null|string $productId): static
    {
        $this->fields['productId'] = $productId;

        return $this;
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

    public function getTax(): ?TaxItem
    {
        return $this->fields['tax'] ?? null;
    }

    public function setTax(null|TaxItem|array $tax): static
    {
        if ($tax !== null && !($tax instanceof TaxItem)) {
            $tax = TaxItem::from($tax);
        }

        $this->fields['tax'] = $tax;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('invoiceItemId', $this->fields)) {
            $data['invoiceItemId'] = $this->fields['invoiceItemId'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
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
        if (array_key_exists('productId', $this->fields)) {
            $data['productId'] = $this->fields['productId'];
        }
        if (array_key_exists('planId', $this->fields)) {
            $data['planId'] = $this->fields['planId'];
        }
        if (array_key_exists('tax', $this->fields)) {
            $data['tax'] = $this->fields['tax']?->jsonSerialize();
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
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
