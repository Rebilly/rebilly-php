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

class PickInstructionGatewayAcquirerWeightsWeightedList implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('gatewayName', $data)) {
            $this->setGatewayName($data['gatewayName']);
        }
        if (array_key_exists('acquirerName', $data)) {
            $this->setAcquirerName($data['acquirerName']);
        }
        if (array_key_exists('weight', $data)) {
            $this->setWeight($data['weight']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getGatewayName(): string
    {
        return $this->fields['gatewayName'];
    }

    public function setGatewayName(string $gatewayName): static
    {
        $this->fields['gatewayName'] = $gatewayName;

        return $this;
    }

    public function getAcquirerName(): string
    {
        return $this->fields['acquirerName'];
    }

    public function setAcquirerName(string $acquirerName): static
    {
        $this->fields['acquirerName'] = $acquirerName;

        return $this;
    }

    public function getWeight(): int
    {
        return $this->fields['weight'];
    }

    public function setWeight(int $weight): static
    {
        $this->fields['weight'] = $weight;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('gatewayName', $this->fields)) {
            $data['gatewayName'] = $this->fields['gatewayName'];
        }
        if (array_key_exists('acquirerName', $this->fields)) {
            $data['acquirerName'] = $this->fields['acquirerName'];
        }
        if (array_key_exists('weight', $this->fields)) {
            $data['weight'] = $this->fields['weight'];
        }

        return $data;
    }
}
