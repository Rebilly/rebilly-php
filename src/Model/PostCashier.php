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

class PostCashier implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
        }
        if (array_key_exists('websiteId', $data)) {
            $this->setWebsiteId($data['websiteId']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('redirectUrl', $data)) {
            $this->setRedirectUrl($data['redirectUrl']);
        }
        if (array_key_exists('balance', $data)) {
            $this->setBalance($data['balance']);
        }
        if (array_key_exists('bonusBalance', $data)) {
            $this->setBonusBalance($data['bonusBalance']);
        }
        if (array_key_exists('depositLimits', $data)) {
            $this->setDepositLimits($data['depositLimits']);
        }
        if (array_key_exists('notificationUrl', $data)) {
            $this->setNotificationUrl($data['notificationUrl']);
        }
        if (array_key_exists('pendingPayoutTotal', $data)) {
            $this->setPendingPayoutTotal($data['pendingPayoutTotal']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
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

    public function getWebsiteId(): string
    {
        return $this->fields['websiteId'];
    }

    public function setWebsiteId(string $websiteId): static
    {
        $this->fields['websiteId'] = $websiteId;

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

    public function getRedirectUrl(): ?string
    {
        return $this->fields['redirectUrl'] ?? null;
    }

    public function setRedirectUrl(null|string $redirectUrl): static
    {
        $this->fields['redirectUrl'] = $redirectUrl;

        return $this;
    }

    public function getBalance(): ?float
    {
        return $this->fields['balance'] ?? null;
    }

    public function setBalance(null|float|string $balance): static
    {
        if (is_string($balance)) {
            $balance = (float) $balance;
        }

        $this->fields['balance'] = $balance;

        return $this;
    }

    public function getBonusBalance(): ?float
    {
        return $this->fields['bonusBalance'] ?? null;
    }

    public function setBonusBalance(null|float|string $bonusBalance): static
    {
        if (is_string($bonusBalance)) {
            $bonusBalance = (float) $bonusBalance;
        }

        $this->fields['bonusBalance'] = $bonusBalance;

        return $this;
    }

    public function getDepositLimits(): ?PostCashierDepositLimits
    {
        return $this->fields['depositLimits'] ?? null;
    }

    public function setDepositLimits(null|PostCashierDepositLimits|array $depositLimits): static
    {
        if ($depositLimits !== null && !($depositLimits instanceof PostCashierDepositLimits)) {
            $depositLimits = PostCashierDepositLimits::from($depositLimits);
        }

        $this->fields['depositLimits'] = $depositLimits;

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

    public function getPendingPayoutTotal(): ?float
    {
        return $this->fields['pendingPayoutTotal'] ?? null;
    }

    public function setPendingPayoutTotal(null|float|string $pendingPayoutTotal): static
    {
        if (is_string($pendingPayoutTotal)) {
            $pendingPayoutTotal = (float) $pendingPayoutTotal;
        }

        $this->fields['pendingPayoutTotal'] = $pendingPayoutTotal;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
        }
        if (array_key_exists('websiteId', $this->fields)) {
            $data['websiteId'] = $this->fields['websiteId'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('redirectUrl', $this->fields)) {
            $data['redirectUrl'] = $this->fields['redirectUrl'];
        }
        if (array_key_exists('balance', $this->fields)) {
            $data['balance'] = $this->fields['balance'];
        }
        if (array_key_exists('bonusBalance', $this->fields)) {
            $data['bonusBalance'] = $this->fields['bonusBalance'];
        }
        if (array_key_exists('depositLimits', $this->fields)) {
            $data['depositLimits'] = $this->fields['depositLimits']?->jsonSerialize();
        }
        if (array_key_exists('notificationUrl', $this->fields)) {
            $data['notificationUrl'] = $this->fields['notificationUrl'];
        }
        if (array_key_exists('pendingPayoutTotal', $this->fields)) {
            $data['pendingPayoutTotal'] = $this->fields['pendingPayoutTotal'];
        }

        return $data;
    }
}
