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

class UpcomingInvoiceEmbed implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('upcomingInvoice', $data)) {
            $this->setUpcomingInvoice($data['upcomingInvoice']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getUpcomingInvoice(): ?Invoice
    {
        return $this->fields['upcomingInvoice'] ?? null;
    }

    public function setUpcomingInvoice(null|Invoice|array $upcomingInvoice): self
    {
        if ($upcomingInvoice !== null && !($upcomingInvoice instanceof \Rebilly\Sdk\Model\Invoice)) {
            $upcomingInvoice = \Rebilly\Sdk\Model\Invoice::from($upcomingInvoice);
        }

        $this->fields['upcomingInvoice'] = $upcomingInvoice;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('upcomingInvoice', $this->fields)) {
            $data['upcomingInvoice'] = $this->fields['upcomingInvoice']?->jsonSerialize();
        }

        return $data;
    }
}
