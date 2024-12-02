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

class ForgotPassword implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('email', $data)) {
            $this->setEmail($data['email']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getEmail(): string
    {
        return $this->fields['email'];
    }

    public function setEmail(string $email): static
    {
        $this->fields['email'] = $email;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('email', $this->fields)) {
            $data['email'] = $this->fields['email'];
        }

        return $data;
    }
}
