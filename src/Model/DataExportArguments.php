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

class DataExportArguments implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('filter', $data)) {
            $this->setFilter($data['filter']);
        }
        if (array_key_exists('sort', $data)) {
            $this->setSort($data['sort']);
        }
        if (array_key_exists('q', $data)) {
            $this->setQ($data['q']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getFilter(): ?string
    {
        return $this->fields['filter'] ?? null;
    }

    public function setFilter(null|string $filter): self
    {
        $this->fields['filter'] = $filter;

        return $this;
    }

    public function getSort(): ?string
    {
        return $this->fields['sort'] ?? null;
    }

    public function setSort(null|string $sort): self
    {
        $this->fields['sort'] = $sort;

        return $this;
    }

    public function getQ(): ?string
    {
        return $this->fields['q'] ?? null;
    }

    public function setQ(null|string $q): self
    {
        $this->fields['q'] = $q;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('filter', $this->fields)) {
            $data['filter'] = $this->fields['filter'];
        }
        if (array_key_exists('sort', $this->fields)) {
            $data['sort'] = $this->fields['sort'];
        }
        if (array_key_exists('q', $this->fields)) {
            $data['q'] = $this->fields['q'];
        }

        return $data;
    }
}
