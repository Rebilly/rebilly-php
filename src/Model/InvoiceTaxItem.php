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

class InvoiceTaxItem implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        if (array_key_exists('rate', $data)) {
            $this->setRate($data['rate']);
        }
        if (array_key_exists('stateAmount', $data)) {
            $this->setStateAmount($data['stateAmount']);
        }
        if (array_key_exists('countyAmount', $data)) {
            $this->setCountyAmount($data['countyAmount']);
        }
        if (array_key_exists('cityAmount', $data)) {
            $this->setCityAmount($data['cityAmount']);
        }
        if (array_key_exists('specialDistrictAmount', $data)) {
            $this->setSpecialDistrictAmount($data['specialDistrictAmount']);
        }
        if (array_key_exists('jurisdictions', $data)) {
            $this->setJurisdictions($data['jurisdictions']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAmount(): float
    {
        return $this->fields['amount'];
    }

    public function setAmount(float|string $amount): self
    {
        if (is_string($amount)) {
            $amount = (float) $amount;
        }

        $this->fields['amount'] = $amount;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->fields['description'];
    }

    public function setDescription(string $description): self
    {
        $this->fields['description'] = $description;

        return $this;
    }

    public function getRate(): ?float
    {
        return $this->fields['rate'] ?? null;
    }

    public function getStateAmount(): ?float
    {
        return $this->fields['stateAmount'] ?? null;
    }

    public function getCountyAmount(): ?float
    {
        return $this->fields['countyAmount'] ?? null;
    }

    public function getCityAmount(): ?float
    {
        return $this->fields['cityAmount'] ?? null;
    }

    public function getSpecialDistrictAmount(): ?float
    {
        return $this->fields['specialDistrictAmount'] ?? null;
    }

    public function getJurisdictions(): ?InvoiceTaxItemJurisdictions
    {
        return $this->fields['jurisdictions'] ?? null;
    }

    public function setJurisdictions(null|InvoiceTaxItemJurisdictions|array $jurisdictions): self
    {
        if ($jurisdictions !== null && !($jurisdictions instanceof InvoiceTaxItemJurisdictions)) {
            $jurisdictions = InvoiceTaxItemJurisdictions::from($jurisdictions);
        }

        $this->fields['jurisdictions'] = $jurisdictions;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('rate', $this->fields)) {
            $data['rate'] = $this->fields['rate'];
        }
        if (array_key_exists('stateAmount', $this->fields)) {
            $data['stateAmount'] = $this->fields['stateAmount'];
        }
        if (array_key_exists('countyAmount', $this->fields)) {
            $data['countyAmount'] = $this->fields['countyAmount'];
        }
        if (array_key_exists('cityAmount', $this->fields)) {
            $data['cityAmount'] = $this->fields['cityAmount'];
        }
        if (array_key_exists('specialDistrictAmount', $this->fields)) {
            $data['specialDistrictAmount'] = $this->fields['specialDistrictAmount'];
        }
        if (array_key_exists('jurisdictions', $this->fields)) {
            $data['jurisdictions'] = $this->fields['jurisdictions']?->jsonSerialize();
        }

        return $data;
    }

    private function setRate(null|float|string $rate): self
    {
        if (is_string($rate)) {
            $rate = (float) $rate;
        }

        $this->fields['rate'] = $rate;

        return $this;
    }

    private function setStateAmount(null|float|string $stateAmount): self
    {
        if (is_string($stateAmount)) {
            $stateAmount = (float) $stateAmount;
        }

        $this->fields['stateAmount'] = $stateAmount;

        return $this;
    }

    private function setCountyAmount(null|float|string $countyAmount): self
    {
        if (is_string($countyAmount)) {
            $countyAmount = (float) $countyAmount;
        }

        $this->fields['countyAmount'] = $countyAmount;

        return $this;
    }

    private function setCityAmount(null|float|string $cityAmount): self
    {
        if (is_string($cityAmount)) {
            $cityAmount = (float) $cityAmount;
        }

        $this->fields['cityAmount'] = $cityAmount;

        return $this;
    }

    private function setSpecialDistrictAmount(null|float|string $specialDistrictAmount): self
    {
        if (is_string($specialDistrictAmount)) {
            $specialDistrictAmount = (float) $specialDistrictAmount;
        }

        $this->fields['specialDistrictAmount'] = $specialDistrictAmount;

        return $this;
    }
}
