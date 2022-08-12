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

class RecentInvoiceEmbed implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('recentInvoice', $data)) {
            $this->setRecentInvoice($data['recentInvoice']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getRecentInvoice(): ?Invoice
    {
        return $this->fields['recentInvoice'] ?? null;
    }

    public function setRecentInvoice(null|Invoice|array $recentInvoice): self
    {
        if ($recentInvoice !== null && !($recentInvoice instanceof \Rebilly\Sdk\Model\Invoice)) {
            $recentInvoice = \Rebilly\Sdk\Model\Invoice::from($recentInvoice);
        }

        $this->fields['recentInvoice'] = $recentInvoice;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('recentInvoice', $this->fields)) {
            $data['recentInvoice'] = $this->fields['recentInvoice']?->jsonSerialize();
        }

        return $data;
    }
}
