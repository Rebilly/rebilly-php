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

use Rebilly\Sdk\Trait\HasMetadata;

class AdjustReadyToPayPaymentCard implements AdjustPaymentMethod
{
    use HasMetadata;

    public const FEATURE_APPLE_PAY = 'Apple Pay';

    public const FEATURE_GOOGLE_PAY = 'Google Pay';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('feature', $data)) {
            $this->setFeature($data['feature']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getPaymentMethod(): string
    {
        return 'payment-card';
    }

    public function getFeature(): ?string
    {
        return $this->fields['feature'] ?? null;
    }

    public function setFeature(null|string $feature): static
    {
        $this->fields['feature'] = $feature;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'paymentMethod' => 'payment-card',
        ];
        if (array_key_exists('feature', $this->fields)) {
            $data['feature'] = $this->fields['feature'];
        }

        return $data;
    }
}
