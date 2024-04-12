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

class ApplePayFeature implements PaymentCardFeature
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('displayName', $data)) {
            $this->setDisplayName($data['displayName']);
        }
        if (array_key_exists('country', $data)) {
            $this->setCountry($data['country']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getName(): string
    {
        return 'Apple Pay';
    }

    public function getDisplayName(): ?string
    {
        return $this->fields['displayName'] ?? null;
    }

    public function setDisplayName(null|string $displayName): static
    {
        $this->fields['displayName'] = $displayName;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->fields['country'] ?? null;
    }

    public function setCountry(null|string $country): static
    {
        $this->fields['country'] = $country;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'name' => 'Apple Pay',
        ];
        if (array_key_exists('displayName', $this->fields)) {
            $data['displayName'] = $this->fields['displayName'];
        }
        if (array_key_exists('country', $this->fields)) {
            $data['country'] = $this->fields['country'];
        }

        return $data;
    }
}
