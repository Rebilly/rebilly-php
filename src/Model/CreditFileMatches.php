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

use DateTimeImmutable;
use DateTimeInterface;
use JsonSerializable;

class CreditFileMatches implements JsonSerializable
{
    public const CREDIT_BUREAU_EQUIFAX = 'equifax';

    public const CREDIT_BUREAU_EXPERIAN = 'experian';

    public const CREDIT_BUREAU_TRANSUNION = 'transunion';

    public const CREDIT_BUREAU_TEST_BUREAU = 'test-bureau';

    public const DECISION_SINGLE_SOURCE = 'single-source';

    public const DECISION_DUAL_SOURCE = 'dual-source';

    public const DECISION_OTHER = 'other';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('creditBureau', $data)) {
            $this->setCreditBureau($data['creditBureau']);
        }
        if (array_key_exists('creditFileNumber', $data)) {
            $this->setCreditFileNumber($data['creditFileNumber']);
        }
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('consultedDate', $data)) {
            $this->setConsultedDate($data['consultedDate']);
        }
        if (array_key_exists('decision', $data)) {
            $this->setDecision($data['decision']);
        }
        if (array_key_exists('trades', $data)) {
            $this->setTrades($data['trades']);
        }
        if (array_key_exists('referenceData', $data)) {
            $this->setReferenceData($data['referenceData']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCreditBureau(): ?string
    {
        return $this->fields['creditBureau'] ?? null;
    }

    public function getCreditFileNumber(): ?string
    {
        return $this->fields['creditFileNumber'] ?? null;
    }

    public function getName(): ?string
    {
        return $this->fields['name'] ?? null;
    }

    public function getConsultedDate(): ?DateTimeImmutable
    {
        return $this->fields['consultedDate'] ?? null;
    }

    public function getDecision(): ?string
    {
        return $this->fields['decision'] ?? null;
    }

    /**
     * @return null|CreditFileMatchesTrades[]
     */
    public function getTrades(): ?array
    {
        return $this->fields['trades'] ?? null;
    }

    public function getReferenceData(): ?CreditFileMatchesReferenceData
    {
        return $this->fields['referenceData'] ?? null;
    }

    public function setReferenceData(null|CreditFileMatchesReferenceData|array $referenceData): static
    {
        if ($referenceData !== null && !($referenceData instanceof CreditFileMatchesReferenceData)) {
            $referenceData = CreditFileMatchesReferenceData::from($referenceData);
        }

        $this->fields['referenceData'] = $referenceData;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('creditBureau', $this->fields)) {
            $data['creditBureau'] = $this->fields['creditBureau'];
        }
        if (array_key_exists('creditFileNumber', $this->fields)) {
            $data['creditFileNumber'] = $this->fields['creditFileNumber'];
        }
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('consultedDate', $this->fields)) {
            $data['consultedDate'] = $this->fields['consultedDate']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('decision', $this->fields)) {
            $data['decision'] = $this->fields['decision'];
        }
        if (array_key_exists('trades', $this->fields)) {
            $data['trades'] = $this->fields['trades'];
        }
        if (array_key_exists('referenceData', $this->fields)) {
            $data['referenceData'] = $this->fields['referenceData']?->jsonSerialize();
        }

        return $data;
    }

    private function setCreditBureau(null|string $creditBureau): static
    {
        $this->fields['creditBureau'] = $creditBureau;

        return $this;
    }

    private function setCreditFileNumber(null|string $creditFileNumber): static
    {
        $this->fields['creditFileNumber'] = $creditFileNumber;

        return $this;
    }

    private function setName(null|string $name): static
    {
        $this->fields['name'] = $name;

        return $this;
    }

    private function setConsultedDate(null|DateTimeImmutable|string $consultedDate): static
    {
        if ($consultedDate !== null && !($consultedDate instanceof DateTimeImmutable)) {
            $consultedDate = new DateTimeImmutable($consultedDate);
        }

        $this->fields['consultedDate'] = $consultedDate;

        return $this;
    }

    private function setDecision(null|string $decision): static
    {
        $this->fields['decision'] = $decision;

        return $this;
    }

    /**
     * @param null|array[]|CreditFileMatchesTrades[] $trades
     */
    private function setTrades(null|array $trades): static
    {
        $trades = $trades !== null ? array_map(
            fn ($value) => $value !== null ? ($value instanceof CreditFileMatchesTrades ? $value : CreditFileMatchesTrades::from($value)) : null,
            $trades,
        ) : null;

        $this->fields['trades'] = $trades;

        return $this;
    }
}
