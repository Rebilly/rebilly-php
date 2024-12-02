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

class ExternalServiceSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('quickBooksOnline', $data)) {
            $this->setQuickBooksOnline($data['quickBooksOnline']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getQuickBooksOnline(): ?QuickBooksOnlineExternalServiceSettings
    {
        return $this->fields['quickBooksOnline'] ?? null;
    }

    public function setQuickBooksOnline(null|QuickBooksOnlineExternalServiceSettings|array $quickBooksOnline): static
    {
        if ($quickBooksOnline !== null && !($quickBooksOnline instanceof QuickBooksOnlineExternalServiceSettings)) {
            $quickBooksOnline = QuickBooksOnlineExternalServiceSettings::from($quickBooksOnline);
        }

        $this->fields['quickBooksOnline'] = $quickBooksOnline;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('quickBooksOnline', $this->fields)) {
            $data['quickBooksOnline'] = $this->fields['quickBooksOnline']?->jsonSerialize();
        }

        return $data;
    }
}
