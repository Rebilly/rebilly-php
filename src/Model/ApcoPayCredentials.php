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

class ApcoPayCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('profileID', $data)) {
            $this->setProfileID($data['profileID']);
        }
        if (array_key_exists('secretWord', $data)) {
            $this->setSecretWord($data['secretWord']);
        }
        if (array_key_exists('MerchantID', $data)) {
            $this->setMerchantID($data['MerchantID']);
        }
        if (array_key_exists('MerchantPassword', $data)) {
            $this->setMerchantPassword($data['MerchantPassword']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getProfileID(): string
    {
        return $this->fields['profileID'];
    }

    public function setProfileID(string $profileID): static
    {
        $this->fields['profileID'] = $profileID;

        return $this;
    }

    public function getSecretWord(): string
    {
        return $this->fields['secretWord'];
    }

    public function setSecretWord(string $secretWord): static
    {
        $this->fields['secretWord'] = $secretWord;

        return $this;
    }

    public function getMerchantID(): string
    {
        return $this->fields['MerchantID'];
    }

    public function setMerchantID(string $merchantID): static
    {
        $this->fields['MerchantID'] = $merchantID;

        return $this;
    }

    public function getMerchantPassword(): string
    {
        return $this->fields['MerchantPassword'];
    }

    public function setMerchantPassword(string $merchantPassword): static
    {
        $this->fields['MerchantPassword'] = $merchantPassword;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('profileID', $this->fields)) {
            $data['profileID'] = $this->fields['profileID'];
        }
        if (array_key_exists('secretWord', $this->fields)) {
            $data['secretWord'] = $this->fields['secretWord'];
        }
        if (array_key_exists('MerchantID', $this->fields)) {
            $data['MerchantID'] = $this->fields['MerchantID'];
        }
        if (array_key_exists('MerchantPassword', $this->fields)) {
            $data['MerchantPassword'] = $this->fields['MerchantPassword'];
        }

        return $data;
    }
}
