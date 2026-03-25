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

class CreationQuoteSignature implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('showWrittenSignatureLines', $data)) {
            $this->setShowWrittenSignatureLines($data['showWrittenSignatureLines']);
        }
        if (array_key_exists('organizationPrintedName', $data)) {
            $this->setOrganizationPrintedName($data['organizationPrintedName']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getShowWrittenSignatureLines(): ?bool
    {
        return $this->fields['showWrittenSignatureLines'] ?? null;
    }

    public function setShowWrittenSignatureLines(null|bool $showWrittenSignatureLines): static
    {
        $this->fields['showWrittenSignatureLines'] = $showWrittenSignatureLines;

        return $this;
    }

    public function getOrganizationPrintedName(): ?string
    {
        return $this->fields['organizationPrintedName'] ?? null;
    }

    public function setOrganizationPrintedName(null|string $organizationPrintedName): static
    {
        $this->fields['organizationPrintedName'] = $organizationPrintedName;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('showWrittenSignatureLines', $this->fields)) {
            $data['showWrittenSignatureLines'] = $this->fields['showWrittenSignatureLines'];
        }
        if (array_key_exists('organizationPrintedName', $this->fields)) {
            $data['organizationPrintedName'] = $this->fields['organizationPrintedName'];
        }

        return $data;
    }
}
