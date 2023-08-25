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

class CheckoutFormCustomizationTracking implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('googleAnalytics', $data)) {
            $this->setGoogleAnalytics($data['googleAnalytics']);
        }
        if (array_key_exists('googleTagManager', $data)) {
            $this->setGoogleTagManager($data['googleTagManager']);
        }
        if (array_key_exists('gtagJs', $data)) {
            $this->setGtagJs($data['gtagJs']);
        }
        if (array_key_exists('facebookPixel', $data)) {
            $this->setFacebookPixel($data['facebookPixel']);
        }
        if (array_key_exists('segmentAnalytics', $data)) {
            $this->setSegmentAnalytics($data['segmentAnalytics']);
        }
        if (array_key_exists('heapIo', $data)) {
            $this->setHeapIo($data['heapIo']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getGoogleAnalytics(): ?string
    {
        return $this->fields['googleAnalytics'] ?? null;
    }

    public function setGoogleAnalytics(null|string $googleAnalytics): static
    {
        $this->fields['googleAnalytics'] = $googleAnalytics;

        return $this;
    }

    public function getGoogleTagManager(): ?string
    {
        return $this->fields['googleTagManager'] ?? null;
    }

    public function setGoogleTagManager(null|string $googleTagManager): static
    {
        $this->fields['googleTagManager'] = $googleTagManager;

        return $this;
    }

    public function getGtagJs(): ?string
    {
        return $this->fields['gtagJs'] ?? null;
    }

    public function setGtagJs(null|string $gtagJs): static
    {
        $this->fields['gtagJs'] = $gtagJs;

        return $this;
    }

    public function getFacebookPixel(): ?string
    {
        return $this->fields['facebookPixel'] ?? null;
    }

    public function setFacebookPixel(null|string $facebookPixel): static
    {
        $this->fields['facebookPixel'] = $facebookPixel;

        return $this;
    }

    public function getSegmentAnalytics(): ?string
    {
        return $this->fields['segmentAnalytics'] ?? null;
    }

    public function setSegmentAnalytics(null|string $segmentAnalytics): static
    {
        $this->fields['segmentAnalytics'] = $segmentAnalytics;

        return $this;
    }

    public function getHeapIo(): ?string
    {
        return $this->fields['heapIo'] ?? null;
    }

    public function setHeapIo(null|string $heapIo): static
    {
        $this->fields['heapIo'] = $heapIo;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('googleAnalytics', $this->fields)) {
            $data['googleAnalytics'] = $this->fields['googleAnalytics'];
        }
        if (array_key_exists('googleTagManager', $this->fields)) {
            $data['googleTagManager'] = $this->fields['googleTagManager'];
        }
        if (array_key_exists('gtagJs', $this->fields)) {
            $data['gtagJs'] = $this->fields['gtagJs'];
        }
        if (array_key_exists('facebookPixel', $this->fields)) {
            $data['facebookPixel'] = $this->fields['facebookPixel'];
        }
        if (array_key_exists('segmentAnalytics', $this->fields)) {
            $data['segmentAnalytics'] = $this->fields['segmentAnalytics'];
        }
        if (array_key_exists('heapIo', $this->fields)) {
            $data['heapIo'] = $this->fields['heapIo'];
        }

        return $data;
    }
}
