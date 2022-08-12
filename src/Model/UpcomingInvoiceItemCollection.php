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

class UpcomingInvoiceItemCollection implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('upcomingInvoiceItemCollection', $data)) {
            $this->setUpcomingInvoiceItemCollection($data['upcomingInvoiceItemCollection']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getUpcomingInvoiceItemCollection(): ?UpcomingInvoiceItem
    {
        return $this->fields['upcomingInvoiceItemCollection'] ?? null;
    }

    public function setUpcomingInvoiceItemCollection(null|UpcomingInvoiceItem|array $upcomingInvoiceItemCollection): self
    {
        if ($upcomingInvoiceItemCollection !== null && !($upcomingInvoiceItemCollection instanceof \Rebilly\Sdk\Model\UpcomingInvoiceItem)) {
            $upcomingInvoiceItemCollection = \Rebilly\Sdk\Model\UpcomingInvoiceItem::from($upcomingInvoiceItemCollection);
        }

        $this->fields['upcomingInvoiceItemCollection'] = $upcomingInvoiceItemCollection;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('upcomingInvoiceItemCollection', $this->fields)) {
            $data['upcomingInvoiceItemCollection'] = $this->fields['upcomingInvoiceItemCollection']?->jsonSerialize();
        }

        return $data;
    }
}
