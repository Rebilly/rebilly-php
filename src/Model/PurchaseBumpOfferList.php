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

class PurchaseBumpOfferList implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('purchaseBumpOfferList', $data)) {
            $this->setPurchaseBumpOfferList($data['purchaseBumpOfferList']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPurchaseBumpOfferList(): ?PurchaseBumpOffer
    {
        return $this->fields['purchaseBumpOfferList'] ?? null;
    }

    public function setPurchaseBumpOfferList(null|PurchaseBumpOffer|array $purchaseBumpOfferList): self
    {
        if ($purchaseBumpOfferList !== null && !($purchaseBumpOfferList instanceof PurchaseBumpOffer)) {
            $purchaseBumpOfferList = PurchaseBumpOffer::from($purchaseBumpOfferList);
        }

        $this->fields['purchaseBumpOfferList'] = $purchaseBumpOfferList;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('purchaseBumpOfferList', $this->fields)) {
            $data['purchaseBumpOfferList'] = $this->fields['purchaseBumpOfferList']?->jsonSerialize();
        }

        return $data;
    }
}
