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

class NetellerCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('paysafePaymentsApiUsername', $data)) {
            $this->setPaysafePaymentsApiUsername($data['paysafePaymentsApiUsername']);
        }
        if (array_key_exists('paysafePaymentsApiPassword', $data)) {
            $this->setPaysafePaymentsApiPassword($data['paysafePaymentsApiPassword']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPaysafePaymentsApiUsername(): string
    {
        return $this->fields['paysafePaymentsApiUsername'];
    }

    public function setPaysafePaymentsApiUsername(string $paysafePaymentsApiUsername): self
    {
        $this->fields['paysafePaymentsApiUsername'] = $paysafePaymentsApiUsername;

        return $this;
    }

    public function getPaysafePaymentsApiPassword(): string
    {
        return $this->fields['paysafePaymentsApiPassword'];
    }

    public function setPaysafePaymentsApiPassword(string $paysafePaymentsApiPassword): self
    {
        $this->fields['paysafePaymentsApiPassword'] = $paysafePaymentsApiPassword;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('paysafePaymentsApiUsername', $this->fields)) {
            $data['paysafePaymentsApiUsername'] = $this->fields['paysafePaymentsApiUsername'];
        }
        if (array_key_exists('paysafePaymentsApiPassword', $this->fields)) {
            $data['paysafePaymentsApiPassword'] = $this->fields['paysafePaymentsApiPassword'];
        }

        return $data;
    }
}
