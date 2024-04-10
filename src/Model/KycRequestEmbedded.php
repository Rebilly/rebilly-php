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

    /**
     * @return null|KycDocument[]
     */
    public function getDocuments(): ?array
    {
        return $this->fields['documents'] ?? null;
    }

    /**
     * @param null|array[]|KycDocument[] $documents
     */
    public function setDocuments(null|array $documents): static
    {
        $documents = $documents !== null ? array_map(
            fn ($value) => $value instanceof KycDocument ? $value : KycDocumentFactory::from($value),
            $documents,
        ) : null;

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
