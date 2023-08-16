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

class ElavonCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('ssl_merchant_id', $data)) {
            $this->setSslMerchantId($data['ssl_merchant_id']);
        }
        if (array_key_exists('ssl_user_id', $data)) {
            $this->setSslUserId($data['ssl_user_id']);
        }
        if (array_key_exists('ssl_pin', $data)) {
            $this->setSslPin($data['ssl_pin']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getSslMerchantId(): string
    {
        return $this->fields['ssl_merchant_id'];
    }

    public function setSslMerchantId(string $sslMerchantId): static
    {
        $this->fields['ssl_merchant_id'] = $sslMerchantId;

        return $this;
    }

    public function getSslUserId(): string
    {
        return $this->fields['ssl_user_id'];
    }

    public function setSslUserId(string $sslUserId): static
    {
        $this->fields['ssl_user_id'] = $sslUserId;

        return $this;
    }

    public function getSslPin(): string
    {
        return $this->fields['ssl_pin'];
    }

    public function setSslPin(string $sslPin): static
    {
        $this->fields['ssl_pin'] = $sslPin;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('ssl_merchant_id', $this->fields)) {
            $data['ssl_merchant_id'] = $this->fields['ssl_merchant_id'];
        }
        if (array_key_exists('ssl_user_id', $this->fields)) {
            $data['ssl_user_id'] = $this->fields['ssl_user_id'];
        }
        if (array_key_exists('ssl_pin', $this->fields)) {
            $data['ssl_pin'] = $this->fields['ssl_pin'];
        }

        return $data;
    }
}
