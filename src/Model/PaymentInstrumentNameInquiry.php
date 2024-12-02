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

class PaymentInstrumentNameInquiry implements JsonSerializable
{
    public const RESULT_FULL_MATCH = 'full-match';

    public const RESULT_PARTIAL_MATCH = 'partial-match';

    public const RESULT_NO_MATCH = 'no-match';

    public const RESULT_NOT_SUPPORTED = 'not-supported';

    public const RESULT_UNKNOWN = 'unknown';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('gatewayAccountId', $data)) {
            $this->setGatewayAccountId($data['gatewayAccountId']);
        }
        if (array_key_exists('result', $data)) {
            $this->setResult($data['result']);
        }
        if (array_key_exists('response', $data)) {
            $this->setResponse($data['response']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getGatewayAccountId(): string
    {
        return $this->fields['gatewayAccountId'];
    }

    public function setGatewayAccountId(string $gatewayAccountId): static
    {
        $this->fields['gatewayAccountId'] = $gatewayAccountId;

        return $this;
    }

    public function getResult(): ?string
    {
        return $this->fields['result'] ?? null;
    }

    public function getResponse(): ?string
    {
        return $this->fields['response'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('gatewayAccountId', $this->fields)) {
            $data['gatewayAccountId'] = $this->fields['gatewayAccountId'];
        }
        if (array_key_exists('result', $this->fields)) {
            $data['result'] = $this->fields['result'];
        }
        if (array_key_exists('response', $this->fields)) {
            $data['response'] = $this->fields['response'];
        }

        return $data;
    }

    private function setResult(null|string $result): static
    {
        $this->fields['result'] = $result;

        return $this;
    }

    private function setResponse(null|string $response): static
    {
        $this->fields['response'] = $response;

        return $this;
    }
}
