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

class ThreeColumnsTimelineTable extends TimelineTable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'type' => 'three-columns',
        ] + $data);

        if (array_key_exists('data', $data)) {
            $this->setData($data['data']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return null|ThreeColumnsTimelineTableData[]
     */
    public function getData(): ?array
    {
        return $this->fields['data'] ?? null;
    }

    /**
     * @param null|array[]|ThreeColumnsTimelineTableData[] $data
     */
    public function setData(null|array $data): static
    {
        $data = $data !== null ? array_map(
            fn ($value) => $value instanceof ThreeColumnsTimelineTableData ? $value : ThreeColumnsTimelineTableData::from($value),
            $data,
        ) : null;

        $this->fields['data'] = $data;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('data', $this->fields)) {
            $data['data'] = $this->fields['data'];
        }

        return parent::jsonSerialize() + $data;
    }
}
