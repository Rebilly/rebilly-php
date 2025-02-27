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

class GigadatSettings implements JsonSerializable
{
    public const METHOD_TYPE_CPI = 'CPI';

    public const METHOD_TYPE_ETI = 'ETI';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('sandbox', $data)) {
            $this->setSandbox($data['sandbox']);
        }
        if (array_key_exists('methodType', $data)) {
            $this->setMethodType($data['methodType']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getSandbox(): bool
    {
        return $this->fields['sandbox'];
    }

    public function setSandbox(bool $sandbox): static
    {
        $this->fields['sandbox'] = $sandbox;

        return $this;
    }

    public function getMethodType(): ?string
    {
        return $this->fields['methodType'] ?? null;
    }

    public function setMethodType(null|string $methodType): static
    {
        $this->fields['methodType'] = $methodType;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('sandbox', $this->fields)) {
            $data['sandbox'] = $this->fields['sandbox'];
        }
        if (array_key_exists('methodType', $this->fields)) {
            $data['methodType'] = $this->fields['methodType'];
        }

        return $data;
    }
}
