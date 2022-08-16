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
    public const TAX_CATEGORY_ID__00000 = '00000';

    public const TAX_CATEGORY_ID__99999 = '99999';

    public const TAX_CATEGORY_ID__20010 = '20010';

    public const TAX_CATEGORY_ID__40030 = '40030';

    public const TAX_CATEGORY_ID__51020 = '51020';

    public const TAX_CATEGORY_ID__51010 = '51010';

    public const TAX_CATEGORY_ID__31000 = '31000';

    public const TAX_CATEGORY_ID__30070 = '30070';

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

    /**
     * @psalm-return self::TAX_CATEGORY_ID_*|null $taxCategoryId
     */
    public function getTaxCategoryId(): ?string
    {
        return $this->fields['taxCategoryId'] ?? null;
    }

    /**
     * @psalm-param self::TAX_CATEGORY_ID_*|null $taxCategoryId
     */
    public function setTaxCategoryId(null|string $taxCategoryId): self
    {
        $this->fields['taxCategoryId'] = $taxCategoryId;

        return $this;
    }

    public function getAccountingCode(): ?string
    {
        return $this->fields['accountingCode'] ?? null;
    }

    public function setAccountingCode(null|string $accountingCode): self
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
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof SelfLink ? $value : SelfLink::from($value)) : null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
