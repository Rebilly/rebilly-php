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

class TransactionGateway implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('response', $data)) {
            $this->setResponse($data['response']);
        }
        if (array_key_exists('avsResponse', $data)) {
            $this->setAvsResponse($data['avsResponse']);
        }
        if (array_key_exists('cvvResponse', $data)) {
            $this->setCvvResponse($data['cvvResponse']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getResponse(): ?TransactionGatewayResponse
    {
        return $this->fields['response'] ?? null;
    }

    public function setResponse(null|TransactionGatewayResponse|array $response): static
    {
        if ($response !== null && !($response instanceof TransactionGatewayResponse)) {
            $response = TransactionGatewayResponse::from($response);
        }

        $this->fields['response'] = $response;

        return $this;
    }

    public function getAvsResponse(): ?TransactionGatewayAvsResponse
    {
        return $this->fields['avsResponse'] ?? null;
    }

    public function setAvsResponse(null|TransactionGatewayAvsResponse|array $avsResponse): static
    {
        if ($avsResponse !== null && !($avsResponse instanceof TransactionGatewayAvsResponse)) {
            $avsResponse = TransactionGatewayAvsResponse::from($avsResponse);
        }

        $this->fields['avsResponse'] = $avsResponse;

        return $this;
    }

    public function getCvvResponse(): ?TransactionGatewayCvvResponse
    {
        return $this->fields['cvvResponse'] ?? null;
    }

    public function setCvvResponse(null|TransactionGatewayCvvResponse|array $cvvResponse): static
    {
        if ($cvvResponse !== null && !($cvvResponse instanceof TransactionGatewayCvvResponse)) {
            $cvvResponse = TransactionGatewayCvvResponse::from($cvvResponse);
        }

        $this->fields['cvvResponse'] = $cvvResponse;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('response', $this->fields)) {
            $data['response'] = $this->fields['response']?->jsonSerialize();
        }
        if (array_key_exists('avsResponse', $this->fields)) {
            $data['avsResponse'] = $this->fields['avsResponse']?->jsonSerialize();
        }
        if (array_key_exists('cvvResponse', $this->fields)) {
            $data['cvvResponse'] = $this->fields['cvvResponse']?->jsonSerialize();
        }

        return $data;
    }
}
