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

class RiskScoreBlocklistTemporaryRules implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('address', $data)) {
            $this->setAddress($data['address']);
        }
        if (array_key_exists('bankAccount', $data)) {
            $this->setBankAccount($data['bankAccount']);
        }
        if (array_key_exists('bin', $data)) {
            $this->setBin($data['bin']);
        }
        if (array_key_exists('country', $data)) {
            $this->setCountry($data['country']);
        }
        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
        }
        if (array_key_exists('email', $data)) {
            $this->setEmail($data['email']);
        }
        if (array_key_exists('emailDomain', $data)) {
            $this->setEmailDomain($data['emailDomain']);
        }
        if (array_key_exists('fingerprint', $data)) {
            $this->setFingerprint($data['fingerprint']);
        }
        if (array_key_exists('ipAddress', $data)) {
            $this->setIpAddress($data['ipAddress']);
        }
        if (array_key_exists('paymentCard', $data)) {
            $this->setPaymentCard($data['paymentCard']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAddress(): ?RiskScoreBlocklistTemporaryRule
    {
        return $this->fields['address'] ?? null;
    }

    public function setAddress(null|RiskScoreBlocklistTemporaryRule|array $address): static
    {
        if ($address !== null && !($address instanceof RiskScoreBlocklistTemporaryRule)) {
            $address = RiskScoreBlocklistTemporaryRule::from($address);
        }

        $this->fields['address'] = $address;

        return $this;
    }

    public function getBankAccount(): ?RiskScoreBlocklistTemporaryRule
    {
        return $this->fields['bankAccount'] ?? null;
    }

    public function setBankAccount(null|RiskScoreBlocklistTemporaryRule|array $bankAccount): static
    {
        if ($bankAccount !== null && !($bankAccount instanceof RiskScoreBlocklistTemporaryRule)) {
            $bankAccount = RiskScoreBlocklistTemporaryRule::from($bankAccount);
        }

        $this->fields['bankAccount'] = $bankAccount;

        return $this;
    }

    public function getBin(): ?RiskScoreBlocklistTemporaryRule
    {
        return $this->fields['bin'] ?? null;
    }

    public function setBin(null|RiskScoreBlocklistTemporaryRule|array $bin): static
    {
        if ($bin !== null && !($bin instanceof RiskScoreBlocklistTemporaryRule)) {
            $bin = RiskScoreBlocklistTemporaryRule::from($bin);
        }

        $this->fields['bin'] = $bin;

        return $this;
    }

    public function getCountry(): ?RiskScoreBlocklistTemporaryRule
    {
        return $this->fields['country'] ?? null;
    }

    public function setCountry(null|RiskScoreBlocklistTemporaryRule|array $country): static
    {
        if ($country !== null && !($country instanceof RiskScoreBlocklistTemporaryRule)) {
            $country = RiskScoreBlocklistTemporaryRule::from($country);
        }

        $this->fields['country'] = $country;

        return $this;
    }

    public function getCustomerId(): ?RiskScoreBlocklistTemporaryRule
    {
        return $this->fields['customerId'] ?? null;
    }

    public function setCustomerId(null|RiskScoreBlocklistTemporaryRule|array $customerId): static
    {
        if ($customerId !== null && !($customerId instanceof RiskScoreBlocklistTemporaryRule)) {
            $customerId = RiskScoreBlocklistTemporaryRule::from($customerId);
        }

        $this->fields['customerId'] = $customerId;

        return $this;
    }

    public function getEmail(): ?RiskScoreBlocklistTemporaryRule
    {
        return $this->fields['email'] ?? null;
    }

    public function setEmail(null|RiskScoreBlocklistTemporaryRule|array $email): static
    {
        if ($email !== null && !($email instanceof RiskScoreBlocklistTemporaryRule)) {
            $email = RiskScoreBlocklistTemporaryRule::from($email);
        }

        $this->fields['email'] = $email;

        return $this;
    }

    public function getEmailDomain(): ?RiskScoreBlocklistTemporaryRule
    {
        return $this->fields['emailDomain'] ?? null;
    }

    public function setEmailDomain(null|RiskScoreBlocklistTemporaryRule|array $emailDomain): static
    {
        if ($emailDomain !== null && !($emailDomain instanceof RiskScoreBlocklistTemporaryRule)) {
            $emailDomain = RiskScoreBlocklistTemporaryRule::from($emailDomain);
        }

        $this->fields['emailDomain'] = $emailDomain;

        return $this;
    }

    public function getFingerprint(): ?RiskScoreBlocklistTemporaryRule
    {
        return $this->fields['fingerprint'] ?? null;
    }

    public function setFingerprint(null|RiskScoreBlocklistTemporaryRule|array $fingerprint): static
    {
        if ($fingerprint !== null && !($fingerprint instanceof RiskScoreBlocklistTemporaryRule)) {
            $fingerprint = RiskScoreBlocklistTemporaryRule::from($fingerprint);
        }

        $this->fields['fingerprint'] = $fingerprint;

        return $this;
    }

    public function getIpAddress(): ?RiskScoreBlocklistTemporaryRule
    {
        return $this->fields['ipAddress'] ?? null;
    }

    public function setIpAddress(null|RiskScoreBlocklistTemporaryRule|array $ipAddress): static
    {
        if ($ipAddress !== null && !($ipAddress instanceof RiskScoreBlocklistTemporaryRule)) {
            $ipAddress = RiskScoreBlocklistTemporaryRule::from($ipAddress);
        }

        $this->fields['ipAddress'] = $ipAddress;

        return $this;
    }

    public function getPaymentCard(): ?RiskScoreBlocklistTemporaryRule
    {
        return $this->fields['paymentCard'] ?? null;
    }

    public function setPaymentCard(null|RiskScoreBlocklistTemporaryRule|array $paymentCard): static
    {
        if ($paymentCard !== null && !($paymentCard instanceof RiskScoreBlocklistTemporaryRule)) {
            $paymentCard = RiskScoreBlocklistTemporaryRule::from($paymentCard);
        }

        $this->fields['paymentCard'] = $paymentCard;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('address', $this->fields)) {
            $data['address'] = $this->fields['address']?->jsonSerialize();
        }
        if (array_key_exists('bankAccount', $this->fields)) {
            $data['bankAccount'] = $this->fields['bankAccount']?->jsonSerialize();
        }
        if (array_key_exists('bin', $this->fields)) {
            $data['bin'] = $this->fields['bin']?->jsonSerialize();
        }
        if (array_key_exists('country', $this->fields)) {
            $data['country'] = $this->fields['country']?->jsonSerialize();
        }
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId']?->jsonSerialize();
        }
        if (array_key_exists('email', $this->fields)) {
            $data['email'] = $this->fields['email']?->jsonSerialize();
        }
        if (array_key_exists('emailDomain', $this->fields)) {
            $data['emailDomain'] = $this->fields['emailDomain']?->jsonSerialize();
        }
        if (array_key_exists('fingerprint', $this->fields)) {
            $data['fingerprint'] = $this->fields['fingerprint']?->jsonSerialize();
        }
        if (array_key_exists('ipAddress', $this->fields)) {
            $data['ipAddress'] = $this->fields['ipAddress']?->jsonSerialize();
        }
        if (array_key_exists('paymentCard', $this->fields)) {
            $data['paymentCard'] = $this->fields['paymentCard']?->jsonSerialize();
        }

        return $data;
    }
}
