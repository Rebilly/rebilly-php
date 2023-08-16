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

use InvalidArgumentException;
use JsonSerializable;

abstract class Stripe3dsServers implements JsonSerializable
{
    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
    }

    public static function from(array $data = []): self
    {
        switch ($data['name']) {
            case 'Stripe3dsServer':
                return new Stripe3dsServer($data);
        }

        throw new InvalidArgumentException("Unsupported name value: '{$data['name']}'");
    }

    public function getName(): ?ThreeDSecureServerName
    {
        return $this->fields['name'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name']?->value;
        }

        return $data;
    }

    private function setName(null|ThreeDSecureServerName|string $name): static
    {
        if ($name !== null && !($name instanceof ThreeDSecureServerName)) {
            $name = ThreeDSecureServerName::from($name);
        }

        $this->fields['name'] = $name;

        return $this;
    }
}
