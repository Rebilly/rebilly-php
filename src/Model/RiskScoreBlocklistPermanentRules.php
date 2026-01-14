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

class RiskScoreBlocklistPermanentRules implements JsonSerializable
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

    public function getAddress(): ?RiskScoreBlocklistPermanentRule
    {
        return $this->fields['address'] ?? null;
    }

    public function setAddress(null|RiskScoreBlocklistPermanentRule|array $address): static
    {
        if ($address !== null && !($address instanceof RiskScoreBlocklistPermanentRule)) {
            $address = RiskScoreBlocklistPermanentRule::from($address);
        }

        $this->fields['address'] = $address;

        return $this;
    }

    public function getBankAccount(): ?RiskScoreBlocklistPermanentRule
    {
        return $this->fields['bankAccount'] ?? null;
    }

    public function setBankAccount(null|RiskScoreBlocklistPermanentRule|array $bankAccount): static
    {
        if ($bankAccount !== null && !($bankAccount instanceof RiskScoreBlocklistPermanentRule)) {
            $bankAccount = RiskScoreBlocklistPermanentRule::from($bankAccount);
        }

        $this->fields['bankAccount'] = $bankAccount;

        return $this;
    }

    public function getBin(): ?RiskScoreBlocklistPermanentRule
    {
        return $this->fields['bin'] ?? null;
    }

    public function setBin(null|RiskScoreBlocklistPermanentRule|array $bin): static
    {
        if ($bin !== null && !($bin instanceof RiskScoreBlocklistPermanentRule)) {
            $bin = RiskScoreBlocklistPermanentRule::from($bin);
        }

        $this->fields['bin'] = $bin;

        return $this;
    }

    public function getCountry(): ?RiskScoreBlocklistPermanentRule
    {
        return $this->fields['country'] ?? null;
    }

    public function setCountry(null|RiskScoreBlocklistPermanentRule|array $country): static
    {
        if ($country !== null && !($country instanceof RiskScoreBlocklistPermanentRule)) {
            $country = RiskScoreBlocklistPermanentRule::from($country);
        }

        $this->fields['country'] = $country;

        return $this;
    }

    public function getCustomerId(): ?RiskScoreBlocklistPermanentRule
    {
        return $this->fields['customerId'] ?? null;
    }

    public function setCustomerId(null|RiskScoreBlocklistPermanentRule|array $customerId): static
    {
        if ($customerId !== null && !($customerId instanceof RiskScoreBlocklistPermanentRule)) {
            $customerId = RiskScoreBlocklistPermanentRule::from($customerId);
        }

        $this->fields['customerId'] = $customerId;

        return $this;
    }

    public function getEmail(): ?RiskScoreBlocklistPermanentRule
    {
        return $this->fields['email'] ?? null;
    }

    public function setEmail(null|RiskScoreBlocklistPermanentRule|array $email): static
    {
        if ($email !== null && !($email instanceof RiskScoreBlocklistPermanentRule)) {
            $email = RiskScoreBlocklistPermanentRule::from($email);
        }

        $this->fields['email'] = $email;

        return $this;
    }

    public function getEmailDomain(): ?RiskScoreBlocklistPermanentRule
    {
        return $this->fields['emailDomain'] ?? null;
    }

    public function setEmailDomain(null|RiskScoreBlocklistPermanentRule|array $emailDomain): static
    {
        if ($emailDomain !== null && !($emailDomain instanceof RiskScoreBlocklistPermanentRule)) {
            $emailDomain = RiskScoreBlocklistPermanentRule::from($emailDomain);
        }

        $this->fields['emailDomain'] = $emailDomain;

        return $this;
    }

    public function getFingerprint(): ?RiskScoreBlocklistPermanentRule
    {
        return $this->fields['fingerprint'] ?? null;
    }

    public function setFingerprint(null|RiskScoreBlocklistPermanentRule|array $fingerprint): static
    {
        if ($fingerprint !== null && !($fingerprint instanceof RiskScoreBlocklistPermanentRule)) {
            $fingerprint = RiskScoreBlocklistPermanentRule::from($fingerprint);
        }

        $this->fields['fingerprint'] = $fingerprint;

        return $this;
    }

    public function getIpAddress(): ?RiskScoreBlocklistPermanentRule
    {
        return $this->fields['ipAddress'] ?? null;
    }

    public function setIpAddress(null|RiskScoreBlocklistPermanentRule|array $ipAddress): static
    {
        if ($ipAddress !== null && !($ipAddress instanceof RiskScoreBlocklistPermanentRule)) {
            $ipAddress = RiskScoreBlocklistPermanentRule::from($ipAddress);
        }

        $this->fields['ipAddress'] = $ipAddress;

        return $this;
    }

    public function getPaymentCard(): ?RiskScoreBlocklistPermanentRule
    {
        return $this->fields['paymentCard'] ?? null;
    }

    public function setPaymentCard(null|RiskScoreBlocklistPermanentRule|array $paymentCard): static
    {
        if ($paymentCard !== null && !($paymentCard instanceof RiskScoreBlocklistPermanentRule)) {
            $paymentCard = RiskScoreBlocklistPermanentRule::from($paymentCard);
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
