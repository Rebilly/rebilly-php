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

class DashboardResponse implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('metric', $data)) {
            $this->setMetric($data['metric']);
        }
        if (array_key_exists('humanName', $data)) {
            $this->setHumanName($data['humanName']);
        }
        if (array_key_exists('increaseIsGood', $data)) {
            $this->setIncreaseIsGood($data['increaseIsGood']);
        }
        if (array_key_exists('segments', $data)) {
            $this->setSegments($data['segments']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @psalm-return self::METRIC_*|null $metric
     */
    public function getMetric(): ?string
    {
        return $this->fields['metric'] ?? null;
    }

    /**
     * @psalm-param self::METRIC_*|null $metric
     */
    public function setMetric(null|string $metric): self
    {
        $this->fields['metric'] = $metric;

        return $this;
    }

    public function getHumanName(): ?string
    {
        return $this->fields['humanName'] ?? null;
    }

    public function setHumanName(null|string $humanName): self
    {
        $this->fields['humanName'] = $humanName;

        return $this;
    }

    public function getIncreaseIsGood(): ?bool
    {
        return $this->fields['increaseIsGood'] ?? null;
    }

    public function setIncreaseIsGood(null|bool $increaseIsGood): self
    {
        $this->fields['increaseIsGood'] = $increaseIsGood;

        return $this;
    }

    /**
     * @return null|object[]
     */
    public function getSegments(): ?array
    {
        return $this->fields['segments'] ?? null;
    }

    /**
     * @param null|object[] $segments
     */
    public function setSegments(null|array $segments): self
    {
        $segments = $segments !== null ? array_map(fn ($value) => $value ?? null, $segments) : null;

        $this->fields['segments'] = $segments;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('metric', $this->fields)) {
            $data['metric'] = $this->fields['metric'];
        }
        if (array_key_exists('humanName', $this->fields)) {
            $data['humanName'] = $this->fields['humanName'];
        }
        if (array_key_exists('increaseIsGood', $this->fields)) {
            $data['increaseIsGood'] = $this->fields['increaseIsGood'];
        }
        if (array_key_exists('segments', $this->fields)) {
            $data['segments'] = $this->fields['segments'];
        }

        return $data;
    }
}
