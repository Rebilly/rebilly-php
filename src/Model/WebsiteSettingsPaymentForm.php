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

class WebsiteSettingsPaymentForm implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('css', $data)) {
            $this->setCss($data['css']);
        }
        if (array_key_exists('theme', $data)) {
            $this->setTheme($data['theme']);
        }
        if (array_key_exists('features', $data)) {
            $this->setFeatures($data['features']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCss(): ?string
    {
        return $this->fields['css'] ?? null;
    }

    public function setCss(null|string $css): static
    {
        $this->fields['css'] = $css;

        return $this;
    }

    /**
     * @return null|array<string,string>
     */
    public function getTheme(): ?array
    {
        return $this->fields['theme'] ?? null;
    }

    /**
     * @param null|array<string,string> $theme
     */
    public function setTheme(null|array $theme): static
    {
        $this->fields['theme'] = $theme;

        return $this;
    }

    public function getFeatures(): ?WebsiteSettingsPaymentFormFeatures
    {
        return $this->fields['features'] ?? null;
    }

    public function setFeatures(null|WebsiteSettingsPaymentFormFeatures|array $features): static
    {
        if ($features !== null && !($features instanceof WebsiteSettingsPaymentFormFeatures)) {
            $features = WebsiteSettingsPaymentFormFeatures::from($features);
        }

        $this->fields['features'] = $features;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('css', $this->fields)) {
            $data['css'] = $this->fields['css'];
        }
        if (array_key_exists('theme', $this->fields)) {
            $data['theme'] = $this->fields['theme'];
        }
        if (array_key_exists('features', $this->fields)) {
            $data['features'] = $this->fields['features']?->jsonSerialize();
        }

        return $data;
    }
}
