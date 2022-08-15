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

use InvalidArgumentException;
use JsonSerializable;

class SettlementPeriod implements JsonSerializable
{
    public const METHOD_DATE_INTERVAL = 'date-interval';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
        if (array_key_exists('duration', $data)) {
            $this->setDuration($data['duration']);
        }
        if (array_key_exists('unit', $data)) {
            $this->setUnit($data['unit']);
        }
        if (array_key_exists('anchor', $data)) {
            $this->setAnchor($data['anchor']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @psalm-return self::METHOD_* $method
     */
    public function getMethod(): string
    {
        return $this->fields['method'];
    }

    /**
     * @psalm-param self::METHOD_* $method
     */
    public function setMethod(string $method): self
    {
        $this->fields['method'] = $method;

        return $this;
    }

    public function getDuration(): int
    {
        return $this->fields['duration'];
    }

    public function setDuration(int $duration): self
    {
        $this->fields['duration'] = $duration;

        return $this;
    }

    public function getUnit(): TimeUnit|TimePluralUnit
    {
        return $this->fields['unit'];
    }

    public function setUnit(string|TimeUnit|TimePluralUnit $unit): self
    {
        $unit = $this->ensureUnit($unit);

        $this->fields['unit'] = $unit;

        return $this;
    }

    public function getAnchor(): ?SettlementPeriodAnchor
    {
        return $this->fields['anchor'] ?? null;
    }

    public function setAnchor(null|SettlementPeriodAnchor|array $anchor): self
    {
        if ($anchor !== null && !($anchor instanceof \Rebilly\Sdk\Model\SettlementPeriodAnchor)) {
            $anchor = \Rebilly\Sdk\Model\SettlementPeriodAnchor::from($anchor);
        }

        $this->fields['anchor'] = $anchor;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method'];
        }
        if (array_key_exists('duration', $this->fields)) {
            $data['duration'] = $this->fields['duration'];
        }
        if (array_key_exists('unit', $this->fields)) {
            $data['unit'] = $this->fields['unit'];
        }
        if (array_key_exists('anchor', $this->fields)) {
            $data['anchor'] = $this->fields['anchor']?->jsonSerialize();
        }

        return $data;
    }

    protected function ensureUnit(string|TimeUnit|TimePluralUnit $data): TimeUnit|TimePluralUnit
    {
        if (
            $data instanceof \Rebilly\Sdk\Model\TimeUnit
            || $data instanceof \Rebilly\Sdk\Model\TimePluralUnit
        ) {
            return $data;
        }
        $candidates = [];
        $candidates[] = \Rebilly\Sdk\Model\TimeUnit::tryFrom($data);
        $candidates[] = \Rebilly\Sdk\Model\TimePluralUnit::tryFrom($data);

        $determined = array_reduce($candidates, function (?array $current, array $candidate) {
            if ($current === null || $current[1] < $candidate[1]) {
                $current = $candidate;
            }

            return $current;
        });

        if (
            $determined[0] instanceof \Rebilly\Sdk\Model\TimeUnit
            || $determined[0] instanceof \Rebilly\Sdk\Model\TimePluralUnit
        ) {
            return $determined[0];
        }

        throw new InvalidArgumentException('Could not instantiate unit with the given value');
    }
}
