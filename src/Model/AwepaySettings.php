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
use Rebilly\Sdk\Trait\HasMetadata;

class AwepaySettings implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('useP2pRest', $data)) {
            $this->setUseP2pRest($data['useP2pRest']);
        }
        if (array_key_exists('useRestApi', $data)) {
            $this->setUseRestApi($data['useRestApi']);
        }
        if (array_key_exists('paymentCode', $data)) {
            $this->setPaymentCode($data['paymentCode']);
        }
        if (array_key_exists('methodType', $data)) {
            $this->setMethodType($data['methodType']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
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

    public function getUseRestApi(): ?bool
    {
        return $this->fields['useRestApi'] ?? null;
    }

    public function setUseRestApi(null|bool $useRestApi): static
    {
        $this->fields['useRestApi'] = $useRestApi;

        return $this;
    }

    public function getPaymentCode(): ?string
    {
        return $this->fields['paymentCode'] ?? null;
    }

    public function setPaymentCode(null|string $paymentCode): static
    {
        $this->fields['paymentCode'] = $paymentCode;

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
        if (array_key_exists('useP2pRest', $this->fields)) {
            $data['useP2pRest'] = $this->fields['useP2pRest'];
        }
        if (array_key_exists('useRestApi', $this->fields)) {
            $data['useRestApi'] = $this->fields['useRestApi'];
        }
        if (array_key_exists('paymentCode', $this->fields)) {
            $data['paymentCode'] = $this->fields['paymentCode'];
        }
        if (array_key_exists('methodType', $this->fields)) {
            $data['methodType'] = $this->fields['methodType'];
        }

        return $data;
    }
}
