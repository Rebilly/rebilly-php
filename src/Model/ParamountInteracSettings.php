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

class ParamountInteracSettings implements JsonSerializable
{
    public const PAYMENT_FLOW_REQUEST_MONEY = 'request_money';

    public const PAYMENT_FLOW_MANUAL = 'manual';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('sandbox', $data)) {
            $this->setSandbox($data['sandbox']);
        }
        if (array_key_exists('merchantSubId', $data)) {
            $this->setMerchantSubId($data['merchantSubId']);
        }
        if (array_key_exists('autodepositLookup', $data)) {
            $this->setAutodepositLookup($data['autodepositLookup']);
        }
        if (array_key_exists('autodepositLookupInterval', $data)) {
            $this->setAutodepositLookupInterval($data['autodepositLookupInterval']);
        }
        if (array_key_exists('bypassAutodepositLookup', $data)) {
            $this->setBypassAutodepositLookup($data['bypassAutodepositLookup']);
        }
        if (array_key_exists('paymentFlow', $data)) {
            $this->setPaymentFlow($data['paymentFlow']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getSandbox(): ?bool
    {
        return $this->fields['sandbox'] ?? null;
    }

    public function setSandbox(null|bool $sandbox): static
    {
        $this->fields['sandbox'] = $sandbox;

        return $this;
    }

    public function getMerchantSubId(): ?int
    {
        return $this->fields['merchantSubId'] ?? null;
    }

    public function setMerchantSubId(null|int $merchantSubId): static
    {
        $this->fields['merchantSubId'] = $merchantSubId;

        return $this;
    }

    public function getAutodepositLookup(): ?bool
    {
        return $this->fields['autodepositLookup'] ?? null;
    }

    public function setAutodepositLookup(null|bool $autodepositLookup): static
    {
        $this->fields['autodepositLookup'] = $autodepositLookup;

        return $this;
    }

    public function getAutodepositLookupInterval(): ?int
    {
        return $this->fields['autodepositLookupInterval'] ?? null;
    }

    public function setAutodepositLookupInterval(null|int $autodepositLookupInterval): static
    {
        $this->fields['autodepositLookupInterval'] = $autodepositLookupInterval;

        return $this;
    }

    public function getBypassAutodepositLookup(): ?bool
    {
        return $this->fields['bypassAutodepositLookup'] ?? null;
    }

    public function setBypassAutodepositLookup(null|bool $bypassAutodepositLookup): static
    {
        $this->fields['bypassAutodepositLookup'] = $bypassAutodepositLookup;

        return $this;
    }

    public function getPaymentFlow(): ?string
    {
        return $this->fields['paymentFlow'] ?? null;
    }

    public function setPaymentFlow(null|string $paymentFlow): static
    {
        $this->fields['paymentFlow'] = $paymentFlow;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('sandbox', $this->fields)) {
            $data['sandbox'] = $this->fields['sandbox'];
        }
        if (array_key_exists('merchantSubId', $this->fields)) {
            $data['merchantSubId'] = $this->fields['merchantSubId'];
        }
        if (array_key_exists('autodepositLookup', $this->fields)) {
            $data['autodepositLookup'] = $this->fields['autodepositLookup'];
        }
        if (array_key_exists('autodepositLookupInterval', $this->fields)) {
            $data['autodepositLookupInterval'] = $this->fields['autodepositLookupInterval'];
        }
        if (array_key_exists('bypassAutodepositLookup', $this->fields)) {
            $data['bypassAutodepositLookup'] = $this->fields['bypassAutodepositLookup'];
        }
        if (array_key_exists('paymentFlow', $this->fields)) {
            $data['paymentFlow'] = $this->fields['paymentFlow'];
        }

        return $data;
    }
}
