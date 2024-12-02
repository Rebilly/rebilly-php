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

class WebsiteSettingsDepositForm implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('theme', $data)) {
            $this->setTheme($data['theme']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
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
