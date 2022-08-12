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

class RedsysCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('merchantCode', $data)) {
            $this->setMerchantCode($data['merchantCode']);
        }
        if (array_key_exists('secretCode', $data)) {
            $this->setSecretCode($data['secretCode']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMerchantCode(): string
    {
        return $this->fields['merchantCode'];
    }

    public function setMerchantCode(string $merchantCode): self
    {
        $this->fields['merchantCode'] = $merchantCode;

        return $this;
    }

    public function getSecretCode(): string
    {
        return $this->fields['secretCode'];
    }

    public function setSecretCode(string $secretCode): self
    {
        $this->fields['secretCode'] = $secretCode;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchantCode', $this->fields)) {
            $data['merchantCode'] = $this->fields['merchantCode'];
        }
        if (array_key_exists('secretCode', $this->fields)) {
            $data['secretCode'] = $this->fields['secretCode'];
        }

        return $data;
    }
}
