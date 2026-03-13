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

class ListTimelineTable extends TimelineTable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        parent::__construct([
            'type' => 'list',
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
     * @return null|string[]
     */
    public function getData(): ?array
    {
        return $this->fields['data'] ?? null;
    }

    /**
     * @param null|string[] $data
     */
    public function setData(null|array $data): static
    {
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
