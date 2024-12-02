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

class RiskScoreSimulationTransaction implements JsonSerializable
{
    public const PRE_RESULT_CANCELED = 'canceled';

    public const PRE_RESULT_DECLINED = 'declined';

    public const PRE_RESULT_APPROVED = 'approved';

    public const RESULT_BLOCKED = 'blocked';

    public const RESULT_APPROVED = 'approved';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('transactionId', $data)) {
            $this->setTransactionId($data['transactionId']);
        }
        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
        }
        if (array_key_exists('simulationJobId', $data)) {
            $this->setSimulationJobId($data['simulationJobId']);
        }
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
        if (array_key_exists('preResult', $data)) {
            $this->setPreResult($data['preResult']);
        }
        if (array_key_exists('result', $data)) {
            $this->setResult($data['result']);
        }
        if (array_key_exists('date', $data)) {
            $this->setDate($data['date']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getTransactionId(): ?string
    {
        return $this->fields['transactionId'] ?? null;
    }

    public function getCustomerId(): ?string
    {
        return $this->fields['customerId'] ?? null;
    }

    public function getSimulationJobId(): ?string
    {
        return $this->fields['simulationJobId'] ?? null;
    }

    public function getAmount(): ?Money
    {
        return $this->fields['amount'] ?? null;
    }

    public function getPreResult(): ?string
    {
        return $this->fields['preResult'] ?? null;
    }

    public function getResult(): ?string
    {
        return $this->fields['result'] ?? null;
    }

    public function getDate(): ?DateTimeImmutable
    {
        return $this->fields['date'] ?? null;
    }

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('transactionId', $this->fields)) {
            $data['transactionId'] = $this->fields['transactionId'];
        }
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
        }
        if (array_key_exists('simulationJobId', $this->fields)) {
            $data['simulationJobId'] = $this->fields['simulationJobId'];
        }
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount']?->jsonSerialize();
        }
        if (array_key_exists('preResult', $this->fields)) {
            $data['preResult'] = $this->fields['preResult'];
        }
        if (array_key_exists('result', $this->fields)) {
            $data['result'] = $this->fields['result'];
        }
        if (array_key_exists('date', $this->fields)) {
            $data['date'] = $this->fields['date']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'] !== null
                ? array_map(
                    static fn (ResourceLink $resourceLink) => $resourceLink->jsonSerialize(),
                    $this->fields['_links'],
                )
                : null;
        }

        return $data;
    }

    private function setTransactionId(null|string $transactionId): static
    {
        $this->fields['transactionId'] = $transactionId;

        return $this;
    }

    private function setCustomerId(null|string $customerId): static
    {
        $this->fields['customerId'] = $customerId;

        return $this;
    }

    private function setSimulationJobId(null|string $simulationJobId): static
    {
        $this->fields['simulationJobId'] = $simulationJobId;

        return $this;
    }

    private function setAmount(null|Money|array $amount): static
    {
        if ($amount !== null && !($amount instanceof Money)) {
            $amount = Money::from($amount);
        }

        $this->fields['amount'] = $amount;

        return $this;
    }

    private function setPreResult(null|string $preResult): static
    {
        $this->fields['preResult'] = $preResult;

        return $this;
    }

    private function setResult(null|string $result): static
    {
        $this->fields['result'] = $result;

        return $this;
    }

    private function setDate(null|DateTimeImmutable|string $date): static
    {
        if ($date !== null && !($date instanceof DateTimeImmutable)) {
            $date = new DateTimeImmutable($date);
        }

        $this->fields['date'] = $date;

        return $this;
    }

    /**
     * @param null|array[]|ResourceLink[] $links
     */
    private function setLinks(null|array $links): static
    {
        $links = $links !== null ? array_map(
            fn ($value) => $value instanceof ResourceLink ? $value : ResourceLink::from($value),
            $links,
        ) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
