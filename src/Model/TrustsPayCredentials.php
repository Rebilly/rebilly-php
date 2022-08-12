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

class TrustsPayCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('merchantNo', $data)) {
            $this->setMerchantNo($data['merchantNo']);
        }
        if (array_key_exists('gatewayNo', $data)) {
            $this->setGatewayNo($data['gatewayNo']);
        }
        if (array_key_exists('signkey', $data)) {
            $this->setSignkey($data['signkey']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMerchantNo(): string
    {
        return $this->fields['merchantNo'];
    }

    public function setMerchantNo(string $merchantNo): self
    {
        $this->fields['merchantNo'] = $merchantNo;

        return $this;
    }

    public function getGatewayNo(): string
    {
        return $this->fields['gatewayNo'];
    }

    public function setGatewayNo(string $gatewayNo): self
    {
        $this->fields['gatewayNo'] = $gatewayNo;

        return $this;
    }

    public function getSignkey(): string
    {
        return $this->fields['signkey'];
    }

    public function setSignkey(string $signkey): self
    {
        $this->fields['signkey'] = $signkey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchantNo', $this->fields)) {
            $data['merchantNo'] = $this->fields['merchantNo'];
        }
        if (array_key_exists('gatewayNo', $this->fields)) {
            $data['gatewayNo'] = $this->fields['gatewayNo'];
        }
        if (array_key_exists('signkey', $this->fields)) {
            $data['signkey'] = $this->fields['signkey'];
        }

        return $data;
    }
}
