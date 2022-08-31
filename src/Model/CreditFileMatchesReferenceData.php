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

class CreditFileMatchesReferenceData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('singleSourceHit', $data)) {
            $this->setSingleSourceHit($data['singleSourceHit']);
        }
        if (array_key_exists('dualSourceHit', $data)) {
            $this->setDualSourceHit($data['dualSourceHit']);
        }
        if (array_key_exists('waterfallProcess', $data)) {
            $this->setWaterfallProcess($data['waterfallProcess']);
        }
        if (array_key_exists('creditFileCreatedDate', $data)) {
            $this->setCreditFileCreatedDate($data['creditFileCreatedDate']);
        }
        if (array_key_exists('numberOfTradesOnFile', $data)) {
            $this->setNumberOfTradesOnFile($data['numberOfTradesOnFile']);
        }
        if (array_key_exists('singleDecision', $data)) {
            $this->setSingleDecision($data['singleDecision']);
        }
        if (array_key_exists('dualDecision', $data)) {
            $this->setDualDecision($data['dualDecision']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getSingleSourceHit(): ?string
    {
        return $this->fields['singleSourceHit'] ?? null;
    }

    public function getDualSourceHit(): ?string
    {
        return $this->fields['dualSourceHit'] ?? null;
    }

    public function getWaterfallProcess(): ?string
    {
        return $this->fields['waterfallProcess'] ?? null;
    }

    public function getCreditFileCreatedDate(): ?string
    {
        return $this->fields['creditFileCreatedDate'] ?? null;
    }

    public function getNumberOfTradesOnFile(): ?string
    {
        return $this->fields['numberOfTradesOnFile'] ?? null;
    }

    public function getSingleDecision(): ?CreditFileCommonDecisionData
    {
        return $this->fields['singleDecision'] ?? null;
    }

    public function setSingleDecision(null|CreditFileCommonDecisionData|array $singleDecision): self
    {
        if ($singleDecision !== null && !($singleDecision instanceof CreditFileCommonDecisionData)) {
            $singleDecision = CreditFileCommonDecisionData::from($singleDecision);
        }

        $this->fields['singleDecision'] = $singleDecision;

        return $this;
    }

    /**
     * @return null|CreditFileCommonDecisionData[]
     */
    public function getDualDecision(): ?array
    {
        return $this->fields['dualDecision'] ?? null;
    }

    /**
     * @param null|CreditFileCommonDecisionData[] $dualDecision
     */
    public function setDualDecision(null|array $dualDecision): self
    {
        $dualDecision = $dualDecision !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof CreditFileCommonDecisionData ? $value : CreditFileCommonDecisionData::from($value)) : null, $dualDecision) : null;

        $this->fields['dualDecision'] = $dualDecision;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('singleSourceHit', $this->fields)) {
            $data['singleSourceHit'] = $this->fields['singleSourceHit'];
        }
        if (array_key_exists('dualSourceHit', $this->fields)) {
            $data['dualSourceHit'] = $this->fields['dualSourceHit'];
        }
        if (array_key_exists('waterfallProcess', $this->fields)) {
            $data['waterfallProcess'] = $this->fields['waterfallProcess'];
        }
        if (array_key_exists('creditFileCreatedDate', $this->fields)) {
            $data['creditFileCreatedDate'] = $this->fields['creditFileCreatedDate'];
        }
        if (array_key_exists('numberOfTradesOnFile', $this->fields)) {
            $data['numberOfTradesOnFile'] = $this->fields['numberOfTradesOnFile'];
        }
        if (array_key_exists('singleDecision', $this->fields)) {
            $data['singleDecision'] = $this->fields['singleDecision']?->jsonSerialize();
        }
        if (array_key_exists('dualDecision', $this->fields)) {
            $data['dualDecision'] = $this->fields['dualDecision'];
        }

        return $data;
    }

    private function setSingleSourceHit(null|string $singleSourceHit): self
    {
        $this->fields['singleSourceHit'] = $singleSourceHit;

        return $this;
    }

    private function setDualSourceHit(null|string $dualSourceHit): self
    {
        $this->fields['dualSourceHit'] = $dualSourceHit;

        return $this;
    }

    private function setWaterfallProcess(null|string $waterfallProcess): self
    {
        $this->fields['waterfallProcess'] = $waterfallProcess;

        return $this;
    }

    private function setCreditFileCreatedDate(null|string $creditFileCreatedDate): self
    {
        $this->fields['creditFileCreatedDate'] = $creditFileCreatedDate;

        return $this;
    }

    private function setNumberOfTradesOnFile(null|string $numberOfTradesOnFile): self
    {
        $this->fields['numberOfTradesOnFile'] = $numberOfTradesOnFile;

        return $this;
    }
}
