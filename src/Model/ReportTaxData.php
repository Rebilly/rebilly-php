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

class ReportTaxData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('country', $data)) {
            $this->setCountry($data['country']);
        }
        if (array_key_exists('state', $data)) {
            $this->setState($data['state']);
        }
        if (array_key_exists('county', $data)) {
            $this->setCounty($data['county']);
        }
        if (array_key_exists('city', $data)) {
            $this->setCity($data['city']);
        }
        if (array_key_exists('stateRate', $data)) {
            $this->setStateRate($data['stateRate']);
        }
        if (array_key_exists('stateAmount', $data)) {
            $this->setStateAmount($data['stateAmount']);
        }
        if (array_key_exists('countyRate', $data)) {
            $this->setCountyRate($data['countyRate']);
        }
        if (array_key_exists('countyAmount', $data)) {
            $this->setCountyAmount($data['countyAmount']);
        }
        if (array_key_exists('cityRate', $data)) {
            $this->setCityRate($data['cityRate']);
        }
        if (array_key_exists('cityAmount', $data)) {
            $this->setCityAmount($data['cityAmount']);
        }
        if (array_key_exists('specialDistrictRate', $data)) {
            $this->setSpecialDistrictRate($data['specialDistrictRate']);
        }
        if (array_key_exists('specialDistrictAmount', $data)) {
            $this->setSpecialDistrictAmount($data['specialDistrictAmount']);
        }
        if (array_key_exists('taxableSalesAmount', $data)) {
            $this->setTaxableSalesAmount($data['taxableSalesAmount']);
        }
        if (array_key_exists('nontaxableSalesAmount', $data)) {
            $this->setNontaxableSalesAmount($data['nontaxableSalesAmount']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCountry(): ?string
    {
        return $this->fields['country'] ?? null;
    }

    public function setCountry(null|string $country): static
    {
        $this->fields['country'] = $country;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->fields['state'] ?? null;
    }

    public function setState(null|string $state): static
    {
        $this->fields['state'] = $state;

        return $this;
    }

    public function getCounty(): ?string
    {
        return $this->fields['county'] ?? null;
    }

    public function setCounty(null|string $county): static
    {
        $this->fields['county'] = $county;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->fields['city'] ?? null;
    }

    public function setCity(null|string $city): static
    {
        $this->fields['city'] = $city;

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

    public function getTaxableSalesAmount(): ?float
    {
        return $this->fields['taxableSalesAmount'] ?? null;
    }

    public function setTaxableSalesAmount(null|float|string $taxableSalesAmount): static
    {
        if (is_string($taxableSalesAmount)) {
            $taxableSalesAmount = (float) $taxableSalesAmount;
        }

        $this->fields['taxableSalesAmount'] = $taxableSalesAmount;

        return $this;
    }

    public function getNontaxableSalesAmount(): ?float
    {
        return $this->fields['nontaxableSalesAmount'] ?? null;
    }

    public function setNontaxableSalesAmount(null|float|string $nontaxableSalesAmount): static
    {
        if (is_string($nontaxableSalesAmount)) {
            $nontaxableSalesAmount = (float) $nontaxableSalesAmount;
        }

        $this->fields['nontaxableSalesAmount'] = $nontaxableSalesAmount;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('country', $this->fields)) {
            $data['country'] = $this->fields['country'];
        }
        if (array_key_exists('state', $this->fields)) {
            $data['state'] = $this->fields['state'];
        }
        if (array_key_exists('county', $this->fields)) {
            $data['county'] = $this->fields['county'];
        }
        if (array_key_exists('city', $this->fields)) {
            $data['city'] = $this->fields['city'];
        }
        if (array_key_exists('stateRate', $this->fields)) {
            $data['stateRate'] = $this->fields['stateRate'];
        }
        if (array_key_exists('stateAmount', $this->fields)) {
            $data['stateAmount'] = $this->fields['stateAmount'];
        }
        if (array_key_exists('countyRate', $this->fields)) {
            $data['countyRate'] = $this->fields['countyRate'];
        }
        if (array_key_exists('countyAmount', $this->fields)) {
            $data['countyAmount'] = $this->fields['countyAmount'];
        }
        if (array_key_exists('cityRate', $this->fields)) {
            $data['cityRate'] = $this->fields['cityRate'];
        }
        if (array_key_exists('cityAmount', $this->fields)) {
            $data['cityAmount'] = $this->fields['cityAmount'];
        }
        if (array_key_exists('specialDistrictRate', $this->fields)) {
            $data['specialDistrictRate'] = $this->fields['specialDistrictRate'];
        }
        if (array_key_exists('specialDistrictAmount', $this->fields)) {
            $data['specialDistrictAmount'] = $this->fields['specialDistrictAmount'];
        }
        if (array_key_exists('taxableSalesAmount', $this->fields)) {
            $data['taxableSalesAmount'] = $this->fields['taxableSalesAmount'];
        }
        if (array_key_exists('nontaxableSalesAmount', $this->fields)) {
            $data['nontaxableSalesAmount'] = $this->fields['nontaxableSalesAmount'];
        }

        return $data;
    }
}
