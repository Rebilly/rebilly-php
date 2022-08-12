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

class InvoicesEmbed implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('invoices', $data)) {
            $this->setInvoices($data['invoices']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return null|\Rebilly\Sdk\Model\Invoice[]
     */
    public function getInvoices(): ?array
    {
        return $this->fields['invoices'] ?? null;
    }

    /**
     * @param null|\Rebilly\Sdk\Model\Invoice[] $invoices
     */
    public function setInvoices(null|array $invoices): self
    {
        $invoices = $invoices !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\Invoice ? $value : \Rebilly\Sdk\Model\Invoice::from($value)) : null, $invoices) : null;

        $this->fields['invoices'] = $invoices;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('invoices', $this->fields)) {
            $data['invoices'] = $this->fields['invoices'];
        }

        return $data;
    }
}
