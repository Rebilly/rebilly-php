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

class ShowEddSearchLogsTimelineAction implements TimelineAction
{
    use HasMetadata;

    public const TYPE_ARREST = 'arrest';

    public const TYPE_BANKRUPTCY = 'bankruptcy';

    public const TYPE_FRAUD = 'fraud';

    public const TYPE_OCCUPATION = 'occupation';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('searchLogId', $data)) {
            $this->setSearchLogId($data['searchLogId']);
        }
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getAction(): string
    {
        return 'show-edd-search-logs';
    }

    public function getSearchLogId(): ?string
    {
        return $this->fields['searchLogId'] ?? null;
    }

    public function setSearchLogId(null|string $searchLogId): static
    {
        $this->fields['searchLogId'] = $searchLogId;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->fields['type'] ?? null;
    }

    public function setType(null|string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'action' => 'show-edd-search-logs',
        ];
        if (array_key_exists('searchLogId', $this->fields)) {
            $data['searchLogId'] = $this->fields['searchLogId'];
        }
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }

        return $data;
    }
}
