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

class KycRequestEmbedded implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('documents', $data)) {
            $this->setDocuments($data['documents']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getDocuments(): ?array
    {
        return $this->fields['documents'] ?? null;
    }

    public function setDocuments(null|array $documents): static
    {
        $this->fields['documents'] = $documents;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('documents', $this->fields)) {
            $data['documents'] = $this->fields['documents'];
        }

        return $data;
    }
}
