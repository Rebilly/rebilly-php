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

class EddScoreDetails implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('url', $data)) {
            $this->setUrl($data['url']);
        }
        if (array_key_exists('details', $data)) {
            $this->setDetails($data['details']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getUrl(): ?string
    {
        return $this->fields['url'] ?? null;
    }

    public function setUrl(null|string $url): static
    {
        $this->fields['url'] = $url;

        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->fields['details'] ?? null;
    }

    public function setDetails(null|string $details): static
    {
        $this->fields['details'] = $details;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('url', $this->fields)) {
            $data['url'] = $this->fields['url'];
        }
        if (array_key_exists('details', $this->fields)) {
            $data['details'] = $this->fields['details'];
        }

        return $data;
    }
}
