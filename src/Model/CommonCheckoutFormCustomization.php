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

class CommonCheckoutFormCustomization implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('logoId', $data)) {
            $this->setLogoId($data['logoId']);
        }
        if (array_key_exists('summary', $data)) {
            $this->setSummary($data['summary']);
        }
        if (array_key_exists('buttonText', $data)) {
            $this->setButtonText($data['buttonText']);
        }
        if (array_key_exists('colors', $data)) {
            $this->setColors($data['colors']);
        }
        if (array_key_exists('links', $data)) {
            $this->setLinks($data['links']);
        }
        if (array_key_exists('tracking', $data)) {
            $this->setTracking($data['tracking']);
        }
        if (array_key_exists('requiredAdditionalFields', $data)) {
            $this->setRequiredAdditionalFields($data['requiredAdditionalFields']);
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

    public function setLogoId(null|string $logoId): self
    {
        $this->fields['logoId'] = $logoId;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->fields['summary'] ?? null;
    }

    public function setSummary(null|string $summary): self
    {
        $this->fields['summary'] = $summary;

        return $this;
    }

    public function getButtonText(): ?string
    {
        return $this->fields['buttonText'] ?? null;
    }

    public function setButtonText(null|string $buttonText): self
    {
        $this->fields['buttonText'] = $buttonText;

        return $this;
    }

    public function getColors(): ?CommonCheckoutFormCustomizationColors
    {
        return $this->fields['colors'] ?? null;
    }

    public function setColors(null|CommonCheckoutFormCustomizationColors|array $colors): self
    {
        if ($colors !== null && !($colors instanceof CommonCheckoutFormCustomizationColors)) {
            $colors = CommonCheckoutFormCustomizationColors::from($colors);
        }

        $this->fields['colors'] = $colors;

        return $this;
    }

    public function getLinks(): ?CommonCheckoutFormCustomizationLinks
    {
        return $this->fields['links'] ?? null;
    }

    public function setLinks(null|CommonCheckoutFormCustomizationLinks|array $links): self
    {
        if ($links !== null && !($links instanceof CommonCheckoutFormCustomizationLinks)) {
            $links = CommonCheckoutFormCustomizationLinks::from($links);
        }

        $this->fields['links'] = $links;

        return $this;
    }

    public function getTracking(): ?CommonCheckoutFormCustomizationTracking
    {
        return $this->fields['tracking'] ?? null;
    }

    public function setTracking(null|CommonCheckoutFormCustomizationTracking|array $tracking): self
    {
        if ($tracking !== null && !($tracking instanceof CommonCheckoutFormCustomizationTracking)) {
            $tracking = CommonCheckoutFormCustomizationTracking::from($tracking);
        }

        $this->fields['tracking'] = $tracking;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getRequiredAdditionalFields(): ?array
    {
        return $this->fields['requiredAdditionalFields'] ?? null;
    }

    /**
     * @param null|string[] $requiredAdditionalFields
     */
    public function setRequiredAdditionalFields(null|array $requiredAdditionalFields): self
    {
        $requiredAdditionalFields = $requiredAdditionalFields !== null ? array_map(fn ($value) => $value ?? null, $requiredAdditionalFields) : null;

        $this->fields['requiredAdditionalFields'] = $requiredAdditionalFields;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('logoId', $this->fields)) {
            $data['logoId'] = $this->fields['logoId'];
        }
        if (array_key_exists('summary', $this->fields)) {
            $data['summary'] = $this->fields['summary'];
        }
        if (array_key_exists('buttonText', $this->fields)) {
            $data['buttonText'] = $this->fields['buttonText'];
        }
        if (array_key_exists('colors', $this->fields)) {
            $data['colors'] = $this->fields['colors']?->jsonSerialize();
        }
        if (array_key_exists('links', $this->fields)) {
            $data['links'] = $this->fields['links']?->jsonSerialize();
        }
        if (array_key_exists('tracking', $this->fields)) {
            $data['tracking'] = $this->fields['tracking']?->jsonSerialize();
        }
        if (array_key_exists('requiredAdditionalFields', $this->fields)) {
            $data['requiredAdditionalFields'] = $this->fields['requiredAdditionalFields'];
        }

        return $data;
    }
}
