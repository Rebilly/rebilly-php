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

class DisputesDataExportEmbedded implements JsonSerializable
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

    public function getFile(): ?File
    {
        return $this->fields['file'] ?? null;
    }

    public function setFile(null|File|array $file): static
    {
        if ($file !== null && !($file instanceof File)) {
            $file = File::from($file);
        }

        $this->fields['file'] = $file;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->fields['user'] ?? null;
    }

    public function setUser(null|User|array $user): static
    {
        if ($user !== null && !($user instanceof User)) {
            $user = User::from($user);
        }

        $this->fields['user'] = $user;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('file', $this->fields)) {
            $data['file'] = $this->fields['file']?->jsonSerialize();
        }
        if (array_key_exists('user', $this->fields)) {
            $data['user'] = $this->fields['user']?->jsonSerialize();
        }

        return $data;
    }
}
