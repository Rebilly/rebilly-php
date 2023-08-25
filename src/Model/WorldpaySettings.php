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

class WorldpaySettings implements JsonSerializable
{
    public const MERCHANT_INITIATED_REASON_UNSCHEDULED = 'UNSCHEDULED';

    public const MERCHANT_INITIATED_REASON_RECURRING = 'RECURRING';

    public const MERCHANT_INITIATED_REASON_INSTALMENT = 'INSTALMENT';

    public const MERCHANT_INITIATED_REASON_REAUTH = 'REAUTH';

    public const MERCHANT_INITIATED_REASON_DELAYED = 'DELAYED';

    public const MERCHANT_INITIATED_REASON_INCREMENTAL = 'INCREMENTAL';

    public const MERCHANT_INITIATED_REASON_RESUBMISSION = 'RESUBMISSION';

    public const MERCHANT_INITIATED_REASON_NOSHOW = 'NOSHOW';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('delay', $data)) {
            $this->setDelay($data['delay']);
        }
        if (array_key_exists('enableStoredCredentials', $data)) {
            $this->setEnableStoredCredentials($data['enableStoredCredentials']);
        }
        if (array_key_exists('merchantInitiatedReason', $data)) {
            $this->setMerchantInitiatedReason($data['merchantInitiatedReason']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getDelay(): ?int
    {
        return $this->fields['delay'] ?? null;
    }

    public function setDelay(null|int $delay): static
    {
        $this->fields['delay'] = $delay;

        return $this;
    }

    public function getEnableStoredCredentials(): ?bool
    {
        return $this->fields['enableStoredCredentials'] ?? null;
    }

    public function setEnableStoredCredentials(null|bool $enableStoredCredentials): static
    {
        $this->fields['enableStoredCredentials'] = $enableStoredCredentials;

        return $this;
    }

    public function getMerchantInitiatedReason(): ?string
    {
        return $this->fields['merchantInitiatedReason'] ?? null;
    }

    public function setMerchantInitiatedReason(null|string $merchantInitiatedReason): static
    {
        $this->fields['merchantInitiatedReason'] = $merchantInitiatedReason;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('delay', $this->fields)) {
            $data['delay'] = $this->fields['delay'];
        }
        if (array_key_exists('enableStoredCredentials', $this->fields)) {
            $data['enableStoredCredentials'] = $this->fields['enableStoredCredentials'];
        }
        if (array_key_exists('merchantInitiatedReason', $this->fields)) {
            $data['merchantInitiatedReason'] = $this->fields['merchantInitiatedReason'];
        }

        return $data;
    }
}
