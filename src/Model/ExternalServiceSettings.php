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
use Rebilly\Sdk\Trait\HasMetadata;

class ExternalServiceSettings implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('quickBooksOnline', $data)) {
            $this->setQuickBooksOnline($data['quickBooksOnline']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
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
