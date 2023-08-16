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

class CommonBillingPortalCustomization implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('logoId', $data)) {
            $this->setLogoId($data['logoId']);
        }
        if (array_key_exists('colors', $data)) {
            $this->setColors($data['colors']);
        }
        if (array_key_exists('links', $data)) {
            $this->setLinks($data['links']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getLogoId(): ?string
    {
        return $this->fields['logoId'] ?? null;
    }

    public function setLogoId(null|string $logoId): static
    {
        $this->fields['logoId'] = $logoId;

        return $this;
    }

    public function getColors(): ?CommonBillingPortalCustomizationColors
    {
        return $this->fields['colors'] ?? null;
    }

    public function setColors(null|CommonBillingPortalCustomizationColors|array $colors): static
    {
        if ($colors !== null && !($colors instanceof CommonBillingPortalCustomizationColors)) {
            $colors = CommonBillingPortalCustomizationColors::from($colors);
        }

        $this->fields['colors'] = $colors;

        return $this;
    }

    public function getLinks(): ?CommonBillingPortalCustomizationLinks
    {
        return $this->fields['links'] ?? null;
    }

    public function setLinks(null|CommonBillingPortalCustomizationLinks|array $links): static
    {
        if ($links !== null && !($links instanceof CommonBillingPortalCustomizationLinks)) {
            $links = CommonBillingPortalCustomizationLinks::from($links);
        }

        $this->fields['links'] = $links;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('logoId', $this->fields)) {
            $data['logoId'] = $this->fields['logoId'];
        }
        if (array_key_exists('colors', $this->fields)) {
            $data['colors'] = $this->fields['colors']?->jsonSerialize();
        }
        if (array_key_exists('links', $this->fields)) {
            $data['links'] = $this->fields['links']?->jsonSerialize();
        }

        return $data;
    }
}
