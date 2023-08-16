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

class TransactionBumpOffer implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('order', $data)) {
            $this->setOrder($data['order']);
        }
        if (array_key_exists('version', $data)) {
            $this->setVersion($data['version']);
        }
        if (array_key_exists('language', $data)) {
            $this->setLanguage($data['language']);
        }
        if (array_key_exists('outcome', $data)) {
            $this->setOutcome($data['outcome']);
        }
        if (array_key_exists('presentedOffers', $data)) {
            $this->setPresentedOffers($data['presentedOffers']);
        }
        if (array_key_exists('selectedOffer', $data)) {
            $this->setSelectedOffer($data['selectedOffer']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getOrder(): ?Money
    {
        return $this->fields['order'] ?? null;
    }

    public function setOrder(null|Money|array $order): static
    {
        if ($order !== null && !($order instanceof Money)) {
            $order = Money::from($order);
        }

        $this->fields['order'] = $order;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->fields['version'] ?? null;
    }

    public function setVersion(null|string $version): static
    {
        $this->fields['version'] = $version;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->fields['language'] ?? null;
    }

    public function setLanguage(null|string $language): static
    {
        $this->fields['language'] = $language;

        return $this;
    }

    public function getOutcome(): ?PurchaseBumpStatus
    {
        return $this->fields['outcome'] ?? null;
    }

    public function setOutcome(null|PurchaseBumpStatus|string $outcome): static
    {
        if ($outcome !== null && !($outcome instanceof PurchaseBumpStatus)) {
            $outcome = PurchaseBumpStatus::from($outcome);
        }

        $this->fields['outcome'] = $outcome;

        return $this;
    }

    /**
     * @return null|PurchaseBumpOfferList[]
     */
    public function getPresentedOffers(): ?array
    {
        return $this->fields['presentedOffers'] ?? null;
    }

    /**
     * @param null|PurchaseBumpOfferList[] $presentedOffers
     */
    public function setPresentedOffers(null|array $presentedOffers): static
    {
        $presentedOffers = $presentedOffers !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof PurchaseBumpOfferList ? $value : PurchaseBumpOfferList::from($value)) : null, $presentedOffers) : null;

        $this->fields['presentedOffers'] = $presentedOffers;

        return $this;
    }

    public function getSelectedOffer(): ?PurchaseBumpOffer
    {
        return $this->fields['selectedOffer'] ?? null;
    }

    public function setSelectedOffer(null|PurchaseBumpOffer|array $selectedOffer): static
    {
        if ($selectedOffer !== null && !($selectedOffer instanceof PurchaseBumpOffer)) {
            $selectedOffer = PurchaseBumpOffer::from($selectedOffer);
        }

        $this->fields['selectedOffer'] = $selectedOffer;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('order', $this->fields)) {
            $data['order'] = $this->fields['order']?->jsonSerialize();
        }
        if (array_key_exists('version', $this->fields)) {
            $data['version'] = $this->fields['version'];
        }
        if (array_key_exists('language', $this->fields)) {
            $data['language'] = $this->fields['language'];
        }
        if (array_key_exists('outcome', $this->fields)) {
            $data['outcome'] = $this->fields['outcome']?->value;
        }
        if (array_key_exists('presentedOffers', $this->fields)) {
            $data['presentedOffers'] = $this->fields['presentedOffers'];
        }
        if (array_key_exists('selectedOffer', $this->fields)) {
            $data['selectedOffer'] = $this->fields['selectedOffer']?->jsonSerialize();
        }

        return $data;
    }
}
