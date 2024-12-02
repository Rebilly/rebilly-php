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

class SamsungPayFeature implements PaymentCardFeature
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('merchantName', $data)) {
            $this->setMerchantName($data['merchantName']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getName(): string
    {
        return 'Samsung Pay';
    }

    public function getMerchantName(): ?string
    {
        return $this->fields['merchantName'] ?? null;
    }

    public function setMerchantName(null|string $merchantName): static
    {
        $this->fields['merchantName'] = $merchantName;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'name' => 'Samsung Pay',
        ];
        if (array_key_exists('merchantName', $this->fields)) {
            $data['merchantName'] = $this->fields['merchantName'];
        }

        return $data;
    }
}
