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
use Rebilly\Sdk\Trait\HasMetadata;

class PostOrganizationExportRequest implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('includeFiles', $data)) {
            $this->setIncludeFiles($data['includeFiles']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getIncludeFiles(): ?bool
    {
        return $this->fields['includeFiles'] ?? null;
    }

    public function setIncludeFiles(null|bool $includeFiles): static
    {
        $this->fields['includeFiles'] = $includeFiles;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('includeFiles', $this->fields)) {
            $data['includeFiles'] = $this->fields['includeFiles'];
        }

        return $data;
    }
}
