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

class WebsiteSettingsDepositForm implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('theme', $data)) {
            $this->setTheme($data['theme']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getTheme(): ?WebsiteSettingsDepositFormTheme
    {
        return $this->fields['theme'] ?? null;
    }

    public function setTheme(null|WebsiteSettingsDepositFormTheme|array $theme): static
    {
        if ($theme !== null && !($theme instanceof WebsiteSettingsDepositFormTheme)) {
            $theme = WebsiteSettingsDepositFormTheme::from($theme);
        }

        $this->fields['theme'] = $theme;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('theme', $this->fields)) {
            $data['theme'] = $this->fields['theme']?->jsonSerialize();
        }

        return $data;
    }
}
