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

class ReportDisputeDelaysData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('aggregationFieldValue', $data)) {
            $this->setAggregationFieldValue($data['aggregationFieldValue']);
        }
        if (array_key_exists('25th', $data)) {
            $this->set25th($data['25th']);
        }
        if (array_key_exists('50th', $data)) {
            $this->set50th($data['50th']);
        }
        if (array_key_exists('75th', $data)) {
            $this->set75th($data['75th']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAggregationFieldValue(): ?string
    {
        return $this->fields['aggregationFieldValue'] ?? null;
    }

    public function setAggregationFieldValue(null|string $aggregationFieldValue): self
    {
        $this->fields['aggregationFieldValue'] = $aggregationFieldValue;

        return $this;
    }

    public function get25th(): ?int
    {
        return $this->fields['25th'] ?? null;
    }

    public function set25th(null|int $_25th): self
    {
        $this->fields['25th'] = $_25th;

        return $this;
    }

    public function get50th(): ?int
    {
        return $this->fields['50th'] ?? null;
    }

    public function set50th(null|int $_50th): self
    {
        $this->fields['50th'] = $_50th;

        return $this;
    }

    public function get75th(): ?int
    {
        return $this->fields['75th'] ?? null;
    }

    public function set75th(null|int $_75th): self
    {
        $this->fields['75th'] = $_75th;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('aggregationFieldValue', $this->fields)) {
            $data['aggregationFieldValue'] = $this->fields['aggregationFieldValue'];
        }
        if (array_key_exists('25th', $this->fields)) {
            $data['25th'] = $this->fields['25th'];
        }
        if (array_key_exists('50th', $this->fields)) {
            $data['50th'] = $this->fields['50th'];
        }
        if (array_key_exists('75th', $this->fields)) {
            $data['75th'] = $this->fields['75th'];
        }

        return $data;
    }
}
