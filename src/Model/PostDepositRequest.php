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

use DateTimeImmutable;
use DateTimeInterface;
use JsonSerializable;

class PostDepositRequest implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('websiteId', $data)) {
            $this->setWebsiteId($data['websiteId']);
        }
        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
        }
        if (array_key_exists('strategyId', $data)) {
            $this->setStrategyId($data['strategyId']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('amounts', $data)) {
            $this->setAmounts($data['amounts']);
        }
        if (array_key_exists('amountLimits', $data)) {
            $this->setAmountLimits($data['amountLimits']);
        }
        if (array_key_exists('customAmount', $data)) {
            $this->setCustomAmount($data['customAmount']);
        }
        if (array_key_exists('redirectUrl', $data)) {
            $this->setRedirectUrl($data['redirectUrl']);
        }
        if (array_key_exists('expirationTime', $data)) {
            $this->setExpirationTime($data['expirationTime']);
        }
        if (array_key_exists('customPropertySetId', $data)) {
            $this->setCustomPropertySetId($data['customPropertySetId']);
        }
        if (array_key_exists('notificationUrl', $data)) {
            $this->setNotificationUrl($data['notificationUrl']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getWebsiteId(): string
    {
        return $this->fields['websiteId'];
    }

    public function setWebsiteId(string $websiteId): static
    {
        $this->fields['websiteId'] = $websiteId;

        return $this;
    }

    public function getCustomerId(): string
    {
        return $this->fields['customerId'];
    }

    public function setCustomerId(string $customerId): static
    {
        $this->fields['customerId'] = $customerId;

        return $this;
    }

    public function getStrategyId(): ?string
    {
        return $this->fields['strategyId'] ?? null;
    }

    public function setStrategyId(null|string $strategyId): static
    {
        $this->fields['strategyId'] = $strategyId;

        return $this;
    }

    public function getCurrency(): string
    {
        return $this->fields['currency'];
    }

    public function setCurrency(string $currency): static
    {
        $this->fields['currency'] = $currency;

        return $this;
    }

    /**
     * @return null|float[]
     */
    public function getAmounts(): ?array
    {
        return $this->fields['amounts'] ?? null;
    }

    /**
     * @param null|float[]|string[] $amounts
     */
    public function setAmounts(null|array $amounts): static
    {
        $amounts = $amounts !== null ? array_map(
            fn ($value) => is_string($value) ? (float) $value : $value,
            $amounts,
        ) : null;

        $this->fields['amounts'] = $amounts;

        return $this;
    }

    public function getAmountLimits(): ?PostDepositRequestAmountLimits
    {
        return $this->fields['amountLimits'] ?? null;
    }

    public function setAmountLimits(null|PostDepositRequestAmountLimits|array $amountLimits): static
    {
        if ($amountLimits !== null && !($amountLimits instanceof PostDepositRequestAmountLimits)) {
            $amountLimits = PostDepositRequestAmountLimits::from($amountLimits);
        }

        $this->fields['amountLimits'] = $amountLimits;

        return $this;
    }

    public function getCustomAmount(): ?PostDepositRequestCustomAmount
    {
        return $this->fields['customAmount'] ?? null;
    }

    public function setCustomAmount(null|PostDepositRequestCustomAmount|array $customAmount): static
    {
        if ($customAmount !== null && !($customAmount instanceof PostDepositRequestCustomAmount)) {
            $customAmount = PostDepositRequestCustomAmount::from($customAmount);
        }

        $this->fields['customAmount'] = $customAmount;

        return $this;
    }

    public function getRedirectUrl(): ?string
    {
        return $this->fields['redirectUrl'] ?? null;
    }

    public function setRedirectUrl(null|string $redirectUrl): static
    {
        $this->fields['redirectUrl'] = $redirectUrl;

        return $this;
    }

    public function getExpirationTime(): ?DateTimeImmutable
    {
        return $this->fields['expirationTime'] ?? null;
    }

    public function setExpirationTime(null|DateTimeImmutable|string $expirationTime): static
    {
        if ($expirationTime !== null && !($expirationTime instanceof DateTimeImmutable)) {
            $expirationTime = new DateTimeImmutable($expirationTime);
        }

        $this->fields['expirationTime'] = $expirationTime;

        return $this;
    }

    public function getCustomPropertySetId(): ?string
    {
        return $this->fields['customPropertySetId'] ?? null;
    }

    public function setCustomPropertySetId(null|string $customPropertySetId): static
    {
        $this->fields['customPropertySetId'] = $customPropertySetId;

        return $this;
    }

    public function getNotificationUrl(): ?string
    {
        return $this->fields['notificationUrl'] ?? null;
    }

    public function setNotificationUrl(null|string $notificationUrl): static
    {
        $this->fields['notificationUrl'] = $notificationUrl;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('websiteId', $this->fields)) {
            $data['websiteId'] = $this->fields['websiteId'];
        }
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
        }
        if (array_key_exists('strategyId', $this->fields)) {
            $data['strategyId'] = $this->fields['strategyId'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('amounts', $this->fields)) {
            $data['amounts'] = $this->fields['amounts'];
        }
        if (array_key_exists('amountLimits', $this->fields)) {
            $data['amountLimits'] = $this->fields['amountLimits']?->jsonSerialize();
        }
        if (array_key_exists('customAmount', $this->fields)) {
            $data['customAmount'] = $this->fields['customAmount']?->jsonSerialize();
        }
        if (array_key_exists('redirectUrl', $this->fields)) {
            $data['redirectUrl'] = $this->fields['redirectUrl'];
        }
        if (array_key_exists('expirationTime', $this->fields)) {
            $data['expirationTime'] = $this->fields['expirationTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('customPropertySetId', $this->fields)) {
            $data['customPropertySetId'] = $this->fields['customPropertySetId'];
        }
        if (array_key_exists('notificationUrl', $this->fields)) {
            $data['notificationUrl'] = $this->fields['notificationUrl'];
        }

        return $data;
    }
}
