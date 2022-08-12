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

class DataCashCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('client', $data)) {
            $this->setClient($data['client']);
        }
        if (array_key_exists('password', $data)) {
            $this->setPassword($data['password']);
        }
        if (array_key_exists('reportGroup', $data)) {
            $this->setReportGroup($data['reportGroup']);
        }
        if (array_key_exists('reportUser', $data)) {
            $this->setReportUser($data['reportUser']);
        }
        if (array_key_exists('reportPassword', $data)) {
            $this->setReportPassword($data['reportPassword']);
        }
        if (array_key_exists('visaPayoutsClient', $data)) {
            $this->setVisaPayoutsClient($data['visaPayoutsClient']);
        }
        if (array_key_exists('visaPayoutsPassword', $data)) {
            $this->setVisaPayoutsPassword($data['visaPayoutsPassword']);
        }
        if (array_key_exists('masterCardPayoutsClient', $data)) {
            $this->setMasterCardPayoutsClient($data['masterCardPayoutsClient']);
        }
        if (array_key_exists('masterCardPayoutsPassword', $data)) {
            $this->setMasterCardPayoutsPassword($data['masterCardPayoutsPassword']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getClient(): string
    {
        return $this->fields['client'];
    }

    public function setClient(string $client): self
    {
        $this->fields['client'] = $client;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->fields['password'];
    }

    public function setPassword(string $password): self
    {
        $this->fields['password'] = $password;

        return $this;
    }

    public function getReportGroup(): ?string
    {
        return $this->fields['reportGroup'] ?? null;
    }

    public function setReportGroup(null|string $reportGroup): self
    {
        $this->fields['reportGroup'] = $reportGroup;

        return $this;
    }

    public function getReportUser(): ?string
    {
        return $this->fields['reportUser'] ?? null;
    }

    public function setReportUser(null|string $reportUser): self
    {
        $this->fields['reportUser'] = $reportUser;

        return $this;
    }

    public function getReportPassword(): ?string
    {
        return $this->fields['reportPassword'] ?? null;
    }

    public function setReportPassword(null|string $reportPassword): self
    {
        $this->fields['reportPassword'] = $reportPassword;

        return $this;
    }

    public function getVisaPayoutsClient(): ?string
    {
        return $this->fields['visaPayoutsClient'] ?? null;
    }

    public function setVisaPayoutsClient(null|string $visaPayoutsClient): self
    {
        $this->fields['visaPayoutsClient'] = $visaPayoutsClient;

        return $this;
    }

    public function getVisaPayoutsPassword(): ?string
    {
        return $this->fields['visaPayoutsPassword'] ?? null;
    }

    public function setVisaPayoutsPassword(null|string $visaPayoutsPassword): self
    {
        $this->fields['visaPayoutsPassword'] = $visaPayoutsPassword;

        return $this;
    }

    public function getMasterCardPayoutsClient(): ?string
    {
        return $this->fields['masterCardPayoutsClient'] ?? null;
    }

    public function setMasterCardPayoutsClient(null|string $masterCardPayoutsClient): self
    {
        $this->fields['masterCardPayoutsClient'] = $masterCardPayoutsClient;

        return $this;
    }

    public function getMasterCardPayoutsPassword(): ?string
    {
        return $this->fields['masterCardPayoutsPassword'] ?? null;
    }

    public function setMasterCardPayoutsPassword(null|string $masterCardPayoutsPassword): self
    {
        $this->fields['masterCardPayoutsPassword'] = $masterCardPayoutsPassword;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('client', $this->fields)) {
            $data['client'] = $this->fields['client'];
        }
        if (array_key_exists('password', $this->fields)) {
            $data['password'] = $this->fields['password'];
        }
        if (array_key_exists('reportGroup', $this->fields)) {
            $data['reportGroup'] = $this->fields['reportGroup'];
        }
        if (array_key_exists('reportUser', $this->fields)) {
            $data['reportUser'] = $this->fields['reportUser'];
        }
        if (array_key_exists('reportPassword', $this->fields)) {
            $data['reportPassword'] = $this->fields['reportPassword'];
        }
        if (array_key_exists('visaPayoutsClient', $this->fields)) {
            $data['visaPayoutsClient'] = $this->fields['visaPayoutsClient'];
        }
        if (array_key_exists('visaPayoutsPassword', $this->fields)) {
            $data['visaPayoutsPassword'] = $this->fields['visaPayoutsPassword'];
        }
        if (array_key_exists('masterCardPayoutsClient', $this->fields)) {
            $data['masterCardPayoutsClient'] = $this->fields['masterCardPayoutsClient'];
        }
        if (array_key_exists('masterCardPayoutsPassword', $this->fields)) {
            $data['masterCardPayoutsPassword'] = $this->fields['masterCardPayoutsPassword'];
        }

        return $data;
    }
}
