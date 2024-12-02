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

class NMISettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('disableStoredCredentials', $data)) {
            $this->setDisableStoredCredentials($data['disableStoredCredentials']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getDisableStoredCredentials(): ?bool
    {
        return $this->fields['disableStoredCredentials'] ?? null;
    }

    public function setDisableStoredCredentials(null|bool $disableStoredCredentials): static
    {
        $this->fields['disableStoredCredentials'] = $disableStoredCredentials;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('disableStoredCredentials', $this->fields)) {
            $data['disableStoredCredentials'] = $this->fields['disableStoredCredentials'];
        }

        return $data;
    }
}
