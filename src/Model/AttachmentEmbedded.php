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

class AttachmentEmbedded implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('file', $data)) {
            $this->setFile($data['file']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getFile(): ?object
    {
        return $this->fields['file'] ?? null;
    }

    public function setFile(null|object $file): static
    {
        $this->fields['file'] = $file;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('file', $this->fields)) {
            $data['file'] = $this->fields['file'];
        }

        return $data;
    }
}
