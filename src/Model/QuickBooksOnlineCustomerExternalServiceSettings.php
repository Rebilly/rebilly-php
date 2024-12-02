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

class QuickBooksOnlineCustomerExternalServiceSettings implements JsonSerializable
{
    public const SYNC_MANUALLY = 'manually';

    public const SYNC_WHEN_USED = 'when-used';

    public const SYNC_ALWAYS = 'always';

    public const DISPLAY_NAME_ID = 'id';

    public const DISPLAY_NAME_FULL_NAME = 'full-name';

    public const DISPLAY_NAME_ORGANIZATION_NAME = 'organization-name';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('sync', $data)) {
            $this->setSync($data['sync']);
        }
        if (array_key_exists('displayName', $data)) {
            $this->setDisplayName($data['displayName']);
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

    public function getDisplayName(): ?string
    {
        return $this->fields['displayName'] ?? null;
    }

    public function setDisplayName(null|string $displayName): static
    {
        $this->fields['displayName'] = $displayName;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('sync', $this->fields)) {
            $data['sync'] = $this->fields['sync'];
        }
        if (array_key_exists('displayName', $this->fields)) {
            $data['displayName'] = $this->fields['displayName'];
        }

        return $data;
    }
}
