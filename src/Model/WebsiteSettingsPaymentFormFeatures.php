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

class WebsiteSettingsPaymentFormFeatures implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('showCoupons', $data)) {
            $this->setShowCoupons($data['showCoupons']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return null|string[]
     */
    public function getShowCoupons(): ?array
    {
        return $this->fields['showCoupons'] ?? null;
    }

    /**
     * @param null|string[] $showCoupons
     */
    public function setShowCoupons(null|array $showCoupons): self
    {
        $showCoupons = $showCoupons !== null ? array_map(fn ($value) => $value ?? null, $showCoupons) : null;

        $this->fields['showCoupons'] = $showCoupons;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('showCoupons', $this->fields)) {
            $data['showCoupons'] = $this->fields['showCoupons'];
        }

        return $data;
    }
}
