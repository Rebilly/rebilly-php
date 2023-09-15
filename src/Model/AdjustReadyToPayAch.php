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

class AdjustReadyToPayAch implements AdjustPaymentMethod, JsonSerializable
{
    public const FEATURE_PLAID = 'Plaid';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('feature', $data)) {
            $this->setFeature($data['feature']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPaymentMethod(): string
    {
        return 'ach';
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
            'paymentMethod' => 'ach',
        ];
        if (array_key_exists('feature', $this->fields)) {
            $data['feature'] = $this->fields['feature'];
        }

        return $data;
    }
}
