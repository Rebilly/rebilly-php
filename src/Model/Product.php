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

class Product extends CommonProduct
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct($data);

        if (array_key_exists('taxCategoryId', $data)) {
            $this->setTaxCategoryId($data['taxCategoryId']);
        }
        if (array_key_exists('accountingCode', $data)) {
            $this->setAccountingCode($data['accountingCode']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getTaxCategoryId(): ?string
    {
        return $this->fields['taxCategoryId'] ?? null;
    }

    public function setTaxCategoryId(null|string $taxCategoryId): static
    {
        $this->fields['taxCategoryId'] = $taxCategoryId;

        return $this;
    }

    public function getAccountingCode(): ?string
    {
        return $this->fields['accountingCode'] ?? null;
    }

    public function setAccountingCode(null|string $accountingCode): static
    {
        $this->fields['accountingCode'] = $accountingCode;

        return $this;
    }

    /**
     * @return null|SelfLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('taxCategoryId', $this->fields)) {
            $data['taxCategoryId'] = $this->fields['taxCategoryId'];
        }
        if (array_key_exists('accountingCode', $this->fields)) {
            $data['accountingCode'] = $this->fields['accountingCode'];
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return parent::jsonSerialize() + $data;
    }

    /**
     * @param null|SelfLink[] $links
     */
    private function setLinks(null|array $links): static
    {
        $links = $links !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof SelfLink ? $value : SelfLink::from($value)) : null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
