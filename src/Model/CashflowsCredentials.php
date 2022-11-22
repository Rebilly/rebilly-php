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

class CashflowsCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('authenticationId', $data)) {
            $this->setAuthenticationId($data['authenticationId']);
        }
        if (array_key_exists('authPassword', $data)) {
            $this->setAuthPassword($data['authPassword']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAuthenticationId(): ?string
    {
        return $this->fields['authenticationId'] ?? null;
    }

    public function setAuthenticationId(null|string $authenticationId): self
    {
        $this->fields['authenticationId'] = $authenticationId;

        return $this;
    }

    public function getAuthPassword(): string
    {
        return $this->fields['authPassword'];
    }

    public function setAuthPassword(string $authPassword): self
    {
        $this->fields['authPassword'] = $authPassword;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('authenticationId', $this->fields)) {
            $data['authenticationId'] = $this->fields['authenticationId'];
        }
        if (array_key_exists('authPassword', $this->fields)) {
            $data['authPassword'] = $this->fields['authPassword'];
        }

        return $data;
    }
}
