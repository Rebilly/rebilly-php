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

class RiskScoreBlocklist implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('address', $data)) {
            $this->setAddress($data['address']);
        }
        if (array_key_exists('bank-account', $data)) {
            $this->setBankAccount($data['bank-account']);
        }
        if (array_key_exists('bin', $data)) {
            $this->setBin($data['bin']);
        }
        if (array_key_exists('country', $data)) {
            $this->setCountry($data['country']);
        }
        if (array_key_exists('customer-id', $data)) {
            $this->setCustomerId($data['customer-id']);
        }
        if (array_key_exists('email', $data)) {
            $this->setEmail($data['email']);
        }
        if (array_key_exists('email-domain', $data)) {
            $this->setEmailDomain($data['email-domain']);
        }
        if (array_key_exists('fingerprint', $data)) {
            $this->setFingerprint($data['fingerprint']);
        }
        if (array_key_exists('ip-address', $data)) {
            $this->setIpAddress($data['ip-address']);
        }
        if (array_key_exists('payment-card', $data)) {
            $this->setPaymentCard($data['payment-card']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAddress(): ?RiskScoreBlocklistType
    {
        return $this->fields['address'] ?? null;
    }

    public function setAddress(null|RiskScoreBlocklistType|array $address): static
    {
        if ($address !== null && !($address instanceof RiskScoreBlocklistType)) {
            $address = RiskScoreBlocklistType::from($address);
        }

        $this->fields['address'] = $address;

        return $this;
    }

    public function getBankAccount(): ?RiskScoreBlocklistType
    {
        return $this->fields['bank-account'] ?? null;
    }

    public function setBankAccount(null|RiskScoreBlocklistType|array $bankAccount): static
    {
        if ($bankAccount !== null && !($bankAccount instanceof RiskScoreBlocklistType)) {
            $bankAccount = RiskScoreBlocklistType::from($bankAccount);
        }

        $this->fields['bank-account'] = $bankAccount;

        return $this;
    }

    public function getBin(): ?RiskScoreBlocklistType
    {
        return $this->fields['bin'] ?? null;
    }

    public function setBin(null|RiskScoreBlocklistType|array $bin): static
    {
        if ($bin !== null && !($bin instanceof RiskScoreBlocklistType)) {
            $bin = RiskScoreBlocklistType::from($bin);
        }

        $this->fields['bin'] = $bin;

        return $this;
    }

    public function getCountry(): ?RiskScoreBlocklistType
    {
        return $this->fields['country'] ?? null;
    }

    public function setCountry(null|RiskScoreBlocklistType|array $country): static
    {
        if ($country !== null && !($country instanceof RiskScoreBlocklistType)) {
            $country = RiskScoreBlocklistType::from($country);
        }

        $this->fields['country'] = $country;

        return $this;
    }

    public function getCustomerId(): ?RiskScoreBlocklistType
    {
        return $this->fields['customer-id'] ?? null;
    }

    public function setCustomerId(null|RiskScoreBlocklistType|array $customerId): static
    {
        if ($customerId !== null && !($customerId instanceof RiskScoreBlocklistType)) {
            $customerId = RiskScoreBlocklistType::from($customerId);
        }

        $this->fields['customer-id'] = $customerId;

        return $this;
    }

    public function getEmail(): ?RiskScoreBlocklistType
    {
        return $this->fields['email'] ?? null;
    }

    public function setEmail(null|RiskScoreBlocklistType|array $email): static
    {
        if ($email !== null && !($email instanceof RiskScoreBlocklistType)) {
            $email = RiskScoreBlocklistType::from($email);
        }

        $this->fields['email'] = $email;

        return $this;
    }

    public function getEmailDomain(): ?RiskScoreBlocklistType
    {
        return $this->fields['email-domain'] ?? null;
    }

    public function setEmailDomain(null|RiskScoreBlocklistType|array $emailDomain): static
    {
        if ($emailDomain !== null && !($emailDomain instanceof RiskScoreBlocklistType)) {
            $emailDomain = RiskScoreBlocklistType::from($emailDomain);
        }

        $this->fields['email-domain'] = $emailDomain;

        return $this;
    }

    public function getFingerprint(): ?RiskScoreBlocklistType
    {
        return $this->fields['fingerprint'] ?? null;
    }

    public function setFingerprint(null|RiskScoreBlocklistType|array $fingerprint): static
    {
        if ($fingerprint !== null && !($fingerprint instanceof RiskScoreBlocklistType)) {
            $fingerprint = RiskScoreBlocklistType::from($fingerprint);
        }

        $this->fields['fingerprint'] = $fingerprint;

        return $this;
    }

    public function getIpAddress(): ?RiskScoreBlocklistType
    {
        return $this->fields['ip-address'] ?? null;
    }

    public function setIpAddress(null|RiskScoreBlocklistType|array $ipAddress): static
    {
        if ($ipAddress !== null && !($ipAddress instanceof RiskScoreBlocklistType)) {
            $ipAddress = RiskScoreBlocklistType::from($ipAddress);
        }

        $this->fields['ip-address'] = $ipAddress;

        return $this;
    }

    public function getPaymentCard(): ?RiskScoreBlocklistType
    {
        return $this->fields['payment-card'] ?? null;
    }

    public function setPaymentCard(null|RiskScoreBlocklistType|array $paymentCard): static
    {
        if ($paymentCard !== null && !($paymentCard instanceof RiskScoreBlocklistType)) {
            $paymentCard = RiskScoreBlocklistType::from($paymentCard);
        }

        $this->fields['payment-card'] = $paymentCard;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('address', $this->fields)) {
            $data['address'] = $this->fields['address']?->jsonSerialize();
        }
        if (array_key_exists('bank-account', $this->fields)) {
            $data['bank-account'] = $this->fields['bank-account']?->jsonSerialize();
        }
        if (array_key_exists('bin', $this->fields)) {
            $data['bin'] = $this->fields['bin']?->jsonSerialize();
        }
        if (array_key_exists('country', $this->fields)) {
            $data['country'] = $this->fields['country']?->jsonSerialize();
        }
        if (array_key_exists('customer-id', $this->fields)) {
            $data['customer-id'] = $this->fields['customer-id']?->jsonSerialize();
        }
        if (array_key_exists('email', $this->fields)) {
            $data['email'] = $this->fields['email']?->jsonSerialize();
        }
        if (array_key_exists('email-domain', $this->fields)) {
            $data['email-domain'] = $this->fields['email-domain']?->jsonSerialize();
        }
        if (array_key_exists('fingerprint', $this->fields)) {
            $data['fingerprint'] = $this->fields['fingerprint']?->jsonSerialize();
        }
        if (array_key_exists('ip-address', $this->fields)) {
            $data['ip-address'] = $this->fields['ip-address']?->jsonSerialize();
        }
        if (array_key_exists('payment-card', $this->fields)) {
            $data['payment-card'] = $this->fields['payment-card']?->jsonSerialize();
        }

        return $data;
    }
}
