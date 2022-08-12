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

class OfferPurchaseBump extends RuleAction
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
     * @return \Rebilly\Sdk\Model\PurchaseBumpSplitVersion[]
     */
    public function getBumpOffers(): array
    {
        return $this->fields['bumpOffers'];
    }

    /**
     * @param \Rebilly\Sdk\Model\PurchaseBumpSplitVersion[] $bumpOffers
     */
    public function setBumpOffers(array $bumpOffers): self
    {
        $bumpOffers = array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\PurchaseBumpSplitVersion ? $value : \Rebilly\Sdk\Model\PurchaseBumpSplitVersion::from($value)) : null, $bumpOffers);

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
