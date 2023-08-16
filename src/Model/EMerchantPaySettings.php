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

class EMerchantPaySettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('useGenesisPlatform', $data)) {
            $this->setUseGenesisPlatform($data['useGenesisPlatform']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getUseGenesisPlatform(): ?bool
    {
        return $this->fields['useGenesisPlatform'] ?? null;
    }

    public function setUseGenesisPlatform(null|bool $useGenesisPlatform): static
    {
        $this->fields['useGenesisPlatform'] = $useGenesisPlatform;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('useGenesisPlatform', $this->fields)) {
            $data['useGenesisPlatform'] = $this->fields['useGenesisPlatform'];
        }

        return $data;
    }
}
