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

class ApplePayValidation extends DigitalWalletValidation
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        parent::__construct([
            'type' => 'Apple Pay',
        ] + $data, $metadata);

        if (array_key_exists('validationRequest', $data)) {
            $this->setValidationRequest($data['validationRequest']);
        }
        if (array_key_exists('validationResponse', $data)) {
            $this->setValidationResponse($data['validationResponse']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getValidationRequest(): ApplePayValidationValidationRequest
    {
        return $this->fields['validationRequest'];
    }

    public function setValidationRequest(ApplePayValidationValidationRequest|array $validationRequest): static
    {
        if (!($validationRequest instanceof ApplePayValidationValidationRequest)) {
            $validationRequest = ApplePayValidationValidationRequest::from($validationRequest);
        }

        $this->fields['validationRequest'] = $validationRequest;

        return $this;
    }

    public function getValidationResponse(): ?array
    {
        return $this->fields['validationResponse'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('validationRequest', $this->fields)) {
            $data['validationRequest'] = $this->fields['validationRequest']->jsonSerialize();
        }
        if (array_key_exists('validationResponse', $this->fields)) {
            $data['validationResponse'] = $this->fields['validationResponse'];
        }

        return parent::jsonSerialize() + $data;
    }

    private function setValidationResponse(null|array $validationResponse): static
    {
        $this->fields['validationResponse'] = $validationResponse;

        return $this;
    }
}
