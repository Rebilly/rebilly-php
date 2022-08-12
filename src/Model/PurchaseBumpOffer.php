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

class PurchaseBumpOffer implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('offerId', $data)) {
            $this->setOfferId($data['offerId']);
        }
        if (array_key_exists('offerType', $data)) {
            $this->setOfferType($data['offerType']);
        }
        if (array_key_exists('bumpAmount', $data)) {
            $this->setBumpAmount($data['bumpAmount']);
        }
        if (array_key_exists('bumpAmountInUsd', $data)) {
            $this->setBumpAmountInUsd($data['bumpAmountInUsd']);
        }
        if (array_key_exists('customFields', $data)) {
            $this->setCustomFields($data['customFields']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getOfferId(): string
    {
        return $this->fields['offerId'];
    }

    public function setOfferId(string $offerId): self
    {
        $this->fields['offerId'] = $offerId;

        return $this;
    }

    public function getOfferType(): string
    {
        return $this->fields['offerType'];
    }

    public function setOfferType(string $offerType): self
    {
        $this->fields['offerType'] = $offerType;

        return $this;
    }

    public function getBumpAmount(): float
    {
        return $this->fields['bumpAmount'];
    }

    public function setBumpAmount(float $bumpAmount): self
    {
        $this->fields['bumpAmount'] = $bumpAmount;

        return $this;
    }

    public function getBumpAmountInUsd(): ?float
    {
        return $this->fields['bumpAmountInUsd'] ?? null;
    }

    public function getCustomFields(): ?array
    {
        return $this->fields['customFields'] ?? null;
    }

    public function setCustomFields(null|array $customFields): self
    {
        $this->fields['customFields'] = $customFields;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('offerId', $this->fields)) {
            $data['offerId'] = $this->fields['offerId'];
        }
        if (array_key_exists('offerType', $this->fields)) {
            $data['offerType'] = $this->fields['offerType'];
        }
        if (array_key_exists('bumpAmount', $this->fields)) {
            $data['bumpAmount'] = $this->fields['bumpAmount'];
        }
        if (array_key_exists('bumpAmountInUsd', $this->fields)) {
            $data['bumpAmountInUsd'] = $this->fields['bumpAmountInUsd'];
        }
        if (array_key_exists('customFields', $this->fields)) {
            $data['customFields'] = $this->fields['customFields'];
        }

        return $data;
    }

    private function setBumpAmountInUsd(null|float $bumpAmountInUsd): self
    {
        $this->fields['bumpAmountInUsd'] = $bumpAmountInUsd;

        return $this;
    }
}
