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

class WebsiteSettingsDepositFormTheme implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('colorPrimary', $data)) {
            $this->setColorPrimary($data['colorPrimary']);
        }
        if (array_key_exists('colorSecondary', $data)) {
            $this->setColorSecondary($data['colorSecondary']);
        }
        if (array_key_exists('buttonTemplate', $data)) {
            $this->setButtonTemplate($data['buttonTemplate']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getColorPrimary(): ?string
    {
        return $this->fields['colorPrimary'] ?? null;
    }

    public function setColorPrimary(null|string $colorPrimary): static
    {
        $this->fields['colorPrimary'] = $colorPrimary;

        return $this;
    }

    public function getColorSecondary(): ?string
    {
        return $this->fields['colorSecondary'] ?? null;
    }

    public function setColorSecondary(null|string $colorSecondary): static
    {
        $this->fields['colorSecondary'] = $colorSecondary;

        return $this;
    }

    public function getButtonTemplate(): ?string
    {
        return $this->fields['buttonTemplate'] ?? null;
    }

    public function setButtonTemplate(null|string $buttonTemplate): static
    {
        $this->fields['buttonTemplate'] = $buttonTemplate;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('colorPrimary', $this->fields)) {
            $data['colorPrimary'] = $this->fields['colorPrimary'];
        }
        if (array_key_exists('colorSecondary', $this->fields)) {
            $data['colorSecondary'] = $this->fields['colorSecondary'];
        }
        if (array_key_exists('buttonTemplate', $this->fields)) {
            $data['buttonTemplate'] = $this->fields['buttonTemplate'];
        }

        return $data;
    }
}
