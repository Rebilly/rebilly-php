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

class GatewayWeightedList implements JsonSerializable
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

    public function getGatewayName(): GatewayName
    {
        return $this->fields['gatewayName'];
    }

    public function setGatewayName(GatewayName|string $gatewayName): static
    {
        if (!($gatewayName instanceof GatewayName)) {
            $gatewayName = GatewayName::from($gatewayName);
        }

        $this->fields['gatewayName'] = $gatewayName;

        return $this;
    }

    public function getAcquirerName(): AcquirerName
    {
        return $this->fields['acquirerName'];
    }

    public function setAcquirerName(AcquirerName|string $acquirerName): static
    {
        if (!($acquirerName instanceof AcquirerName)) {
            $acquirerName = AcquirerName::from($acquirerName);
        }

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
            $data['gatewayName'] = $this->fields['gatewayName']?->value;
        }
        if (array_key_exists('acquirerName', $this->fields)) {
            $data['acquirerName'] = $this->fields['acquirerName']?->value;
        }
        if (array_key_exists('weight', $this->fields)) {
            $data['weight'] = $this->fields['weight'];
        }

        return $data;
    }
}
