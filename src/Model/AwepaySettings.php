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

class AwepaySettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('useP2pRest', $data)) {
            $this->setUseP2pRest($data['useP2pRest']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getUseP2pRest(): ?bool
    {
        return $this->fields['useP2pRest'] ?? null;
    }

    public function setUseP2pRest(null|bool $useP2pRest): static
    {
        $this->fields['useP2pRest'] = $useP2pRest;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('useP2pRest', $this->fields)) {
            $data['useP2pRest'] = $this->fields['useP2pRest'];
        }

        return $data;
    }
}
