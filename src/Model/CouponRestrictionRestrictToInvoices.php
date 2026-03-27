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

use Rebilly\Sdk\Trait\HasMetadata;

class CouponRestrictionRestrictToInvoices implements RedemptionRestriction, CouponRestriction
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('invoiceIds', $data)) {
            $this->setInvoiceIds($data['invoiceIds']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getType(): string
    {
        return 'restrict-to-invoices';
    }

    /**
     * @return string[]
     */
    public function getInvoiceIds(): array
    {
        return $this->fields['invoiceIds'];
    }

    /**
     * @param string[] $invoiceIds
     */
    public function setInvoiceIds(array $invoiceIds): static
    {
        $this->fields['invoiceIds'] = $invoiceIds;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'type' => 'restrict-to-invoices',
        ];
        if (array_key_exists('invoiceIds', $this->fields)) {
            $data['invoiceIds'] = $this->fields['invoiceIds'];
        }

        return $data;
    }
}
