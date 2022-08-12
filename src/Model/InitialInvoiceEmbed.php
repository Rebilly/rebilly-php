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

class InitialInvoiceEmbed implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('initialInvoice', $data)) {
            $this->setInitialInvoice($data['initialInvoice']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getInitialInvoice(): ?Invoice
    {
        return $this->fields['initialInvoice'] ?? null;
    }

    public function setInitialInvoice(null|Invoice|array $initialInvoice): self
    {
        if ($initialInvoice !== null && !($initialInvoice instanceof \Rebilly\Sdk\Model\Invoice)) {
            $initialInvoice = \Rebilly\Sdk\Model\Invoice::from($initialInvoice);
        }

        $this->fields['initialInvoice'] = $initialInvoice;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('initialInvoice', $this->fields)) {
            $data['initialInvoice'] = $this->fields['initialInvoice']?->jsonSerialize();
        }

        return $data;
    }
}
