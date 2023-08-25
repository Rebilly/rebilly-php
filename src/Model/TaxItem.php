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

class TaxItem implements JsonSerializable
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
        if (array_key_exists('stateRate', $data)) {
            $this->setStateRate($data['stateRate']);
        }
        if (array_key_exists('countyRate', $data)) {
            $this->setCountyRate($data['countyRate']);
        }
        if (array_key_exists('cityRate', $data)) {
            $this->setCityRate($data['cityRate']);
        }
        if (array_key_exists('specialDistrictRate', $data)) {
            $this->setSpecialDistrictRate($data['specialDistrictRate']);
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

    public function setAmount(float|string $amount): static
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

    public function setDescription(string $description): static
    {
        $this->fields['description'] = $description;

        return $this;
    }

    public function getRate(): ?float
    {
        return $this->fields['rate'] ?? null;
    }

    public function setRate(null|float|string $rate): static
    {
        if (is_string($rate)) {
            $rate = (float) $rate;
        }

        $this->fields['rate'] = $rate;

        return $this;
    }

    public function getStateAmount(): ?float
    {
        return $this->fields['stateAmount'] ?? null;
    }

    public function setStateAmount(null|float|string $stateAmount): static
    {
        if (is_string($stateAmount)) {
            $stateAmount = (float) $stateAmount;
        }

        $this->fields['stateAmount'] = $stateAmount;

        return $this;
    }

    public function getCountyAmount(): ?float
    {
        return $this->fields['countyAmount'] ?? null;
    }

    public function setCountyAmount(null|float|string $countyAmount): static
    {
        if (is_string($countyAmount)) {
            $countyAmount = (float) $countyAmount;
        }

        $this->fields['countyAmount'] = $countyAmount;

        return $this;
    }

    public function getCityAmount(): ?float
    {
        return $this->fields['cityAmount'] ?? null;
    }

    public function setCityAmount(null|float|string $cityAmount): static
    {
        if (is_string($cityAmount)) {
            $cityAmount = (float) $cityAmount;
        }

        $this->fields['cityAmount'] = $cityAmount;

        return $this;
    }

    public function getSpecialDistrictAmount(): ?float
    {
        return $this->fields['specialDistrictAmount'] ?? null;
    }

    public function setSpecialDistrictAmount(null|float|string $specialDistrictAmount): static
    {
        if (is_string($specialDistrictAmount)) {
            $specialDistrictAmount = (float) $specialDistrictAmount;
        }

        $this->fields['specialDistrictAmount'] = $specialDistrictAmount;

        return $this;
    }

    public function getStateRate(): ?float
    {
        return $this->fields['stateRate'] ?? null;
    }

    public function setStateRate(null|float|string $stateRate): static
    {
        if (is_string($stateRate)) {
            $stateRate = (float) $stateRate;
        }

        $this->fields['stateRate'] = $stateRate;

        return $this;
    }

    public function getCountyRate(): ?float
    {
        return $this->fields['countyRate'] ?? null;
    }

    public function setCountyRate(null|float|string $countyRate): static
    {
        if (is_string($countyRate)) {
            $countyRate = (float) $countyRate;
        }

        $this->fields['countyRate'] = $countyRate;

        return $this;
    }

    public function getCityRate(): ?float
    {
        return $this->fields['cityRate'] ?? null;
    }

    public function setCityRate(null|float|string $cityRate): static
    {
        if (is_string($cityRate)) {
            $cityRate = (float) $cityRate;
        }

        $this->fields['cityRate'] = $cityRate;

        return $this;
    }

    public function getSpecialDistrictRate(): ?float
    {
        return $this->fields['specialDistrictRate'] ?? null;
    }

    public function setSpecialDistrictRate(null|float|string $specialDistrictRate): static
    {
        if (is_string($specialDistrictRate)) {
            $specialDistrictRate = (float) $specialDistrictRate;
        }

        $this->fields['specialDistrictRate'] = $specialDistrictRate;

        return $this;
    }

    public function getJurisdictions(): ?TaxItemJurisdictions
    {
        return $this->fields['jurisdictions'] ?? null;
    }

    public function setJurisdictions(null|TaxItemJurisdictions|array $jurisdictions): static
    {
        if ($jurisdictions !== null && !($jurisdictions instanceof TaxItemJurisdictions)) {
            $jurisdictions = TaxItemJurisdictions::from($jurisdictions);
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
        if (array_key_exists('stateRate', $this->fields)) {
            $data['stateRate'] = $this->fields['stateRate'];
        }
        if (array_key_exists('countyRate', $this->fields)) {
            $data['countyRate'] = $this->fields['countyRate'];
        }
        if (array_key_exists('cityRate', $this->fields)) {
            $data['cityRate'] = $this->fields['cityRate'];
        }
        if (array_key_exists('specialDistrictRate', $this->fields)) {
            $data['specialDistrictRate'] = $this->fields['specialDistrictRate'];
        }
        if (array_key_exists('jurisdictions', $this->fields)) {
            $data['jurisdictions'] = $this->fields['jurisdictions']?->jsonSerialize();
        }

        return $data;
    }
}
