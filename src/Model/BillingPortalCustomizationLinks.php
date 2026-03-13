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

class BillingPortalCustomizationLinks implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('refundPolicy', $data)) {
            $this->setRefundPolicy($data['refundPolicy']);
        }
        if (array_key_exists('privacyPolicy', $data)) {
            $this->setPrivacyPolicy($data['privacyPolicy']);
        }
        if (array_key_exists('termsOfService', $data)) {
            $this->setTermsOfService($data['termsOfService']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getRefundPolicy(): ?string
    {
        return $this->fields['refundPolicy'] ?? null;
    }

    public function setRefundPolicy(null|string $refundPolicy): static
    {
        $this->fields['refundPolicy'] = $refundPolicy;

        return $this;
    }

    public function getPrivacyPolicy(): ?string
    {
        return $this->fields['privacyPolicy'] ?? null;
    }

    public function setPrivacyPolicy(null|string $privacyPolicy): static
    {
        $this->fields['privacyPolicy'] = $privacyPolicy;

        return $this;
    }

    public function getTermsOfService(): ?string
    {
        return $this->fields['termsOfService'] ?? null;
    }

    public function setTermsOfService(null|string $termsOfService): static
    {
        $this->fields['termsOfService'] = $termsOfService;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('refundPolicy', $this->fields)) {
            $data['refundPolicy'] = $this->fields['refundPolicy'];
        }
        if (array_key_exists('privacyPolicy', $this->fields)) {
            $data['privacyPolicy'] = $this->fields['privacyPolicy'];
        }
        if (array_key_exists('termsOfService', $this->fields)) {
            $data['termsOfService'] = $this->fields['termsOfService'];
        }

        return $data;
    }
}
