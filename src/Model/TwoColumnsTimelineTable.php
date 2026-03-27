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

use Rebilly\Sdk\Trait\HasMetadata;

class TwoColumnsTimelineTable extends TimelineTable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        parent::__construct([
            'type' => 'two-columns',
        ] + $data, $metadata);

        if (array_key_exists('data', $data)) {
            $this->setData($data['data']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    /**
     * @return null|TwoColumnsTimelineTableData[]
     */
    public function getData(): ?array
    {
        return $this->fields['data'] ?? null;
    }

    /**
     * @param null|array[]|TwoColumnsTimelineTableData[] $data
     */
    public function setData(null|array $data): static
    {
        $data = $data !== null ? array_map(
            fn ($value) => $value instanceof TwoColumnsTimelineTableData ? $value : TwoColumnsTimelineTableData::from($value),
            $data,
        ) : null;

        $this->fields['data'] = $data;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('data', $this->fields)) {
            $data['data'] = $this->fields['data'] !== null
                ? array_map(
                    static fn (TwoColumnsTimelineTableData $twoColumnsTimelineTableData) => $twoColumnsTimelineTableData->jsonSerialize(),
                    $this->fields['data'],
                )
                : null;
        }

        return parent::jsonSerialize() + $data;
    }
}
