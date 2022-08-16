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

class PurchaseBumpSplitVersion implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('weight', $data)) {
            $this->setWeight($data['weight']);
        }
        if (array_key_exists('offers', $data)) {
            $this->setOffers($data['offers']);
        }
        if (array_key_exists('choices', $data)) {
            $this->setChoices($data['choices']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getName(): string
    {
        return $this->fields['name'];
    }

    public function setName(string $name): self
    {
        $this->fields['name'] = $name;

        return $this;
    }

    public function getWeight(): int
    {
        return $this->fields['weight'];
    }

    public function setWeight(int $weight): self
    {
        $this->fields['weight'] = $weight;

        return $this;
    }

    /**
     * @return PurchaseBumpOfferList[]
     */
    public function getOffers(): array
    {
        return $this->fields['offers'];
    }

    /**
     * @param PurchaseBumpOfferList[] $offers
     */
    public function setOffers(array $offers): self
    {
        $offers = array_map(fn ($value) => $value !== null ? ($value instanceof PurchaseBumpOfferList ? $value : PurchaseBumpOfferList::from($value)) : null, $offers);

        $this->fields['offers'] = $offers;

        return $this;
    }

    /**
     * @return PurchaseBumpOfferContent[]
     */
    public function getChoices(): array
    {
        return $this->fields['choices'];
    }

    /**
     * @param PurchaseBumpOfferContent[] $choices
     */
    public function setChoices(array $choices): self
    {
        $choices = array_map(fn ($value) => $value !== null ? ($value instanceof PurchaseBumpOfferContent ? $value : PurchaseBumpOfferContent::from($value)) : null, $choices);

        $this->fields['choices'] = $choices;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('weight', $this->fields)) {
            $data['weight'] = $this->fields['weight'];
        }
        if (array_key_exists('offers', $this->fields)) {
            $data['offers'] = $this->fields['offers'];
        }
        if (array_key_exists('choices', $this->fields)) {
            $data['choices'] = $this->fields['choices'];
        }

        return $data;
    }
}
