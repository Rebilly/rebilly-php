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

class CustomersDataExportEmbedded implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('file', $data)) {
            $this->setFile($data['file']);
        }
        if (array_key_exists('user', $data)) {
            $this->setUser($data['user']);
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

    public function getUser(): ?object
    {
        return $this->fields['user'] ?? null;
    }

    public function setUser(null|object $user): static
    {
        $this->fields['user'] = $user;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('file', $this->fields)) {
            $data['file'] = $this->fields['file'];
        }
        if (array_key_exists('user', $this->fields)) {
            $data['user'] = $this->fields['user'];
        }

        return $data;
    }
}
