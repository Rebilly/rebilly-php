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

class DigitalWalletOnboardingApplePayDomains implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('domains', $data)) {
            $this->setDomains($data['domains']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    /**
     * @return string[]
     */
    public function getDomains(): array
    {
        return $this->fields['domains'];
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('domains', $this->fields)) {
            $data['domains'] = $this->fields['domains'];
        }

        return $data;
    }

    /**
     * @param string[] $domains
     */
    private function setDomains(array $domains): static
    {
        $this->fields['domains'] = $domains;

        return $this;
    }
}
