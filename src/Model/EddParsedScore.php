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

class EddParsedScore implements JsonSerializable
{
    public const OCCUPATION_NOT_FOUND = 'not-found';

    public const OCCUPATION_UNLIKELY = 'unlikely';

    public const OCCUPATION_UNCLEAR = 'unclear';

    public const OCCUPATION_PROBABLE = 'probable';

    public const OCCUPATION_CONFIRMED = 'confirmed';

    public const ARREST_NOT_FOUND = 'not-found';

    public const ARREST_UNLIKELY = 'unlikely';

    public const ARREST_UNCLEAR = 'unclear';

    public const ARREST_PROBABLE = 'probable';

    public const ARREST_CONFIRMED = 'confirmed';

    public const BANKRUPTCY_NOT_FOUND = 'not-found';

    public const BANKRUPTCY_UNLIKELY = 'unlikely';

    public const BANKRUPTCY_UNCLEAR = 'unclear';

    public const BANKRUPTCY_PROBABLE = 'probable';

    public const BANKRUPTCY_CONFIRMED = 'confirmed';

    public const FRAUD_NOT_FOUND = 'not-found';

    public const FRAUD_UNLIKELY = 'unlikely';

    public const FRAUD_UNCLEAR = 'unclear';

    public const FRAUD_PROBABLE = 'probable';

    public const FRAUD_CONFIRMED = 'confirmed';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('occupation', $data)) {
            $this->setOccupation($data['occupation']);
        }
        if (array_key_exists('arrest', $data)) {
            $this->setArrest($data['arrest']);
        }
        if (array_key_exists('bankruptcy', $data)) {
            $this->setBankruptcy($data['bankruptcy']);
        }
        if (array_key_exists('fraud', $data)) {
            $this->setFraud($data['fraud']);
        }
        if (array_key_exists('occupationDetails', $data)) {
            $this->setOccupationDetails($data['occupationDetails']);
        }
        if (array_key_exists('arrestDetails', $data)) {
            $this->setArrestDetails($data['arrestDetails']);
        }
        if (array_key_exists('bankruptcyDetails', $data)) {
            $this->setBankruptcyDetails($data['bankruptcyDetails']);
        }
        if (array_key_exists('fraudDetails', $data)) {
            $this->setFraudDetails($data['fraudDetails']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getOccupation(): ?string
    {
        return $this->fields['occupation'] ?? null;
    }

    public function setOccupation(null|string $occupation): static
    {
        $this->fields['occupation'] = $occupation;

        return $this;
    }

    public function getArrest(): ?string
    {
        return $this->fields['arrest'] ?? null;
    }

    public function setArrest(null|string $arrest): static
    {
        $this->fields['arrest'] = $arrest;

        return $this;
    }

    public function getBankruptcy(): ?string
    {
        return $this->fields['bankruptcy'] ?? null;
    }

    public function setBankruptcy(null|string $bankruptcy): static
    {
        $this->fields['bankruptcy'] = $bankruptcy;

        return $this;
    }

    public function getFraud(): ?string
    {
        return $this->fields['fraud'] ?? null;
    }

    public function setFraud(null|string $fraud): static
    {
        $this->fields['fraud'] = $fraud;

        return $this;
    }

    public function getOccupationDetails(): ?EddScoreDetails
    {
        return $this->fields['occupationDetails'] ?? null;
    }

    public function setOccupationDetails(null|EddScoreDetails|array $occupationDetails): static
    {
        if ($occupationDetails !== null && !($occupationDetails instanceof EddScoreDetails)) {
            $occupationDetails = EddScoreDetails::from($occupationDetails);
        }

        $this->fields['occupationDetails'] = $occupationDetails;

        return $this;
    }

    public function getArrestDetails(): ?EddScoreDetails
    {
        return $this->fields['arrestDetails'] ?? null;
    }

    public function setArrestDetails(null|EddScoreDetails|array $arrestDetails): static
    {
        if ($arrestDetails !== null && !($arrestDetails instanceof EddScoreDetails)) {
            $arrestDetails = EddScoreDetails::from($arrestDetails);
        }

        $this->fields['arrestDetails'] = $arrestDetails;

        return $this;
    }

    public function getBankruptcyDetails(): ?EddScoreDetails
    {
        return $this->fields['bankruptcyDetails'] ?? null;
    }

    public function setBankruptcyDetails(null|EddScoreDetails|array $bankruptcyDetails): static
    {
        if ($bankruptcyDetails !== null && !($bankruptcyDetails instanceof EddScoreDetails)) {
            $bankruptcyDetails = EddScoreDetails::from($bankruptcyDetails);
        }

        $this->fields['bankruptcyDetails'] = $bankruptcyDetails;

        return $this;
    }

    public function getFraudDetails(): ?EddScoreDetails
    {
        return $this->fields['fraudDetails'] ?? null;
    }

    public function setFraudDetails(null|EddScoreDetails|array $fraudDetails): static
    {
        if ($fraudDetails !== null && !($fraudDetails instanceof EddScoreDetails)) {
            $fraudDetails = EddScoreDetails::from($fraudDetails);
        }

        $this->fields['fraudDetails'] = $fraudDetails;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('occupation', $this->fields)) {
            $data['occupation'] = $this->fields['occupation'];
        }
        if (array_key_exists('arrest', $this->fields)) {
            $data['arrest'] = $this->fields['arrest'];
        }
        if (array_key_exists('bankruptcy', $this->fields)) {
            $data['bankruptcy'] = $this->fields['bankruptcy'];
        }
        if (array_key_exists('fraud', $this->fields)) {
            $data['fraud'] = $this->fields['fraud'];
        }
        if (array_key_exists('occupationDetails', $this->fields)) {
            $data['occupationDetails'] = $this->fields['occupationDetails']?->jsonSerialize();
        }
        if (array_key_exists('arrestDetails', $this->fields)) {
            $data['arrestDetails'] = $this->fields['arrestDetails']?->jsonSerialize();
        }
        if (array_key_exists('bankruptcyDetails', $this->fields)) {
            $data['bankruptcyDetails'] = $this->fields['bankruptcyDetails']?->jsonSerialize();
        }
        if (array_key_exists('fraudDetails', $this->fields)) {
            $data['fraudDetails'] = $this->fields['fraudDetails']?->jsonSerialize();
        }

        return $data;
    }
}
