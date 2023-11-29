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

class RuleActionOfferPurchaseBump extends RuleAction
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'name' => 'offer-purchase-bump',
        ] + $data);

        if (array_key_exists('bumpOffers', $data)) {
            $this->setBumpOffers($data['bumpOffers']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return RuleActionOfferPurchaseBumpBumpOffers[]
     */
    public function getBumpOffers(): array
    {
        return $this->fields['bumpOffers'];
    }

    /**
     * @param array[]|RuleActionOfferPurchaseBumpBumpOffers[] $bumpOffers
     */
    public function setBumpOffers(array $bumpOffers): static
    {
        $bumpOffers = array_map(
            fn ($value) => $value instanceof RuleActionOfferPurchaseBumpBumpOffers ? $value : RuleActionOfferPurchaseBumpBumpOffers::from($value),
            $bumpOffers,
        );

        $this->fields['bumpOffers'] = $bumpOffers;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('bumpOffers', $this->fields)) {
            $data['bumpOffers'] = $this->fields['bumpOffers'];
        }

        return parent::jsonSerialize() + $data;
    }
}
