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

class QuickBooksOnlineJournalEntryExternalServiceSettings implements JsonSerializable
{
    public const SYNC_MANUALLY = 'manually';

    public const SYNC_ALWAYS = 'always';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('sync', $data)) {
            $this->setSync($data['sync']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getSync(): ?string
    {
        return $this->fields['sync'] ?? null;
    }

    public function setSync(null|string $sync): static
    {
        $this->fields['sync'] = $sync;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('sync', $this->fields)) {
            $data['sync'] = $this->fields['sync'];
        }

        return $data;
    }
}
