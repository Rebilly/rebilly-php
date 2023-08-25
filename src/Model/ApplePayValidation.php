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

class ApplePayValidation extends DigitalWalletValidation
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'type' => 'Apple Pay',
        ] + $data);

        if (array_key_exists('validationRequest', $data)) {
            $this->setValidationRequest($data['validationRequest']);
        }
        if (array_key_exists('validationResponse', $data)) {
            $this->setValidationResponse($data['validationResponse']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
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

    public function getValidationResponse(): ?object
    {
        return $this->fields['validationResponse'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('validationRequest', $this->fields)) {
            $data['validationRequest'] = $this->fields['validationRequest']?->jsonSerialize();
        }
        if (array_key_exists('validationResponse', $this->fields)) {
            $data['validationResponse'] = $this->fields['validationResponse'];
        }

        return parent::jsonSerialize() + $data;
    }

    private function setValidationResponse(null|object $validationResponse): static
    {
        $this->fields['validationResponse'] = $validationResponse;

        return $this;
    }
}
