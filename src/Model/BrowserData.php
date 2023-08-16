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

class BrowserData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('colorDepth', $data)) {
            $this->setColorDepth($data['colorDepth']);
        }
        if (array_key_exists('isJavaEnabled', $data)) {
            $this->setIsJavaEnabled($data['isJavaEnabled']);
        }
        if (array_key_exists('language', $data)) {
            $this->setLanguage($data['language']);
        }
        if (array_key_exists('screenWidth', $data)) {
            $this->setScreenWidth($data['screenWidth']);
        }
        if (array_key_exists('screenHeight', $data)) {
            $this->setScreenHeight($data['screenHeight']);
        }
        if (array_key_exists('timeZoneOffset', $data)) {
            $this->setTimeZoneOffset($data['timeZoneOffset']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getColorDepth(): int
    {
        return $this->fields['colorDepth'];
    }

    public function setColorDepth(int $colorDepth): static
    {
        $this->fields['colorDepth'] = $colorDepth;

        return $this;
    }

    public function getIsJavaEnabled(): bool
    {
        return $this->fields['isJavaEnabled'];
    }

    public function setIsJavaEnabled(bool $isJavaEnabled): static
    {
        $this->fields['isJavaEnabled'] = $isJavaEnabled;

        return $this;
    }

    public function getLanguage(): string
    {
        return $this->fields['language'];
    }

    public function setLanguage(string $language): static
    {
        $this->fields['language'] = $language;

        return $this;
    }

    public function getScreenWidth(): int
    {
        return $this->fields['screenWidth'];
    }

    public function setScreenWidth(int $screenWidth): static
    {
        $this->fields['screenWidth'] = $screenWidth;

        return $this;
    }

    public function getScreenHeight(): int
    {
        return $this->fields['screenHeight'];
    }

    public function setScreenHeight(int $screenHeight): static
    {
        $this->fields['screenHeight'] = $screenHeight;

        return $this;
    }

    public function getTimeZoneOffset(): int
    {
        return $this->fields['timeZoneOffset'];
    }

    public function setTimeZoneOffset(int $timeZoneOffset): static
    {
        $this->fields['timeZoneOffset'] = $timeZoneOffset;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('colorDepth', $this->fields)) {
            $data['colorDepth'] = $this->fields['colorDepth'];
        }
        if (array_key_exists('isJavaEnabled', $this->fields)) {
            $data['isJavaEnabled'] = $this->fields['isJavaEnabled'];
        }
        if (array_key_exists('language', $this->fields)) {
            $data['language'] = $this->fields['language'];
        }
        if (array_key_exists('screenWidth', $this->fields)) {
            $data['screenWidth'] = $this->fields['screenWidth'];
        }
        if (array_key_exists('screenHeight', $this->fields)) {
            $data['screenHeight'] = $this->fields['screenHeight'];
        }
        if (array_key_exists('timeZoneOffset', $this->fields)) {
            $data['timeZoneOffset'] = $this->fields['timeZoneOffset'];
        }

        return $data;
    }
}
