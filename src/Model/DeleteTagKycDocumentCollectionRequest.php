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

class DeleteTagKycDocumentCollectionRequest implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('kycDocumentIds', $data)) {
            $this->setKycDocumentIds($data['kycDocumentIds']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    /**
     * @return string[]
     */
    public function getKycDocumentIds(): array
    {
        return $this->fields['kycDocumentIds'];
    }

    /**
     * @param string[] $kycDocumentIds
     */
    public function setKycDocumentIds(array $kycDocumentIds): static
    {
        $this->fields['kycDocumentIds'] = $kycDocumentIds;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('kycDocumentIds', $this->fields)) {
            $data['kycDocumentIds'] = $this->fields['kycDocumentIds'];
        }

        return $data;
    }
}
