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

class ResourceLink implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('href', $data)) {
            $this->setHref($data['href']);
        }
        if (array_key_exists('rel', $data)) {
            $this->setRel($data['rel']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getHref(): ?string
    {
        return $this->fields['href'] ?? null;
    }

    public function setHref(null|string $href): static
    {
        $this->fields['href'] = $href;

        return $this;
    }

    public function getRel(): ?string
    {
        return $this->fields['rel'] ?? null;
    }

    public function setRel(null|string $rel): static
    {
        $this->fields['rel'] = $rel;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('href', $this->fields)) {
            $data['href'] = $this->fields['href'];
        }
        if (array_key_exists('rel', $this->fields)) {
            $data['rel'] = $this->fields['rel'];
        }

        return $data;
    }
}
