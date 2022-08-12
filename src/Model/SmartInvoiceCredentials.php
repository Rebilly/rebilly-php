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

class SmartInvoiceCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('merchantId', $data)) {
            $this->setMerchantId($data['merchantId']);
        }
        if (array_key_exists('applicationId', $data)) {
            $this->setApplicationId($data['applicationId']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMerchantId(): string
    {
        return $this->fields['merchantId'];
    }

    public function setMerchantId(string $merchantId): self
    {
        $this->fields['merchantId'] = $merchantId;

        return $this;
    }

    public function getApplicationId(): string
    {
        return $this->fields['applicationId'];
    }

    public function setApplicationId(string $applicationId): self
    {
        $this->fields['applicationId'] = $applicationId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchantId', $this->fields)) {
            $data['merchantId'] = $this->fields['merchantId'];
        }
        if (array_key_exists('applicationId', $this->fields)) {
            $data['applicationId'] = $this->fields['applicationId'];
        }

        return $data;
    }
}
