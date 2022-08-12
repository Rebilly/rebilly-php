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

class PaymentToken extends PaymentInstruction
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct($data);

        if (array_key_exists('token', $data)) {
            $this->setToken($data['token']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getToken(): string
    {
        return $this->fields['token'];
    }

    public function setToken(string $token): self
    {
        $this->fields['token'] = $token;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('token', $this->fields)) {
            $data['token'] = $this->fields['token'];
        }

        return parent::jsonSerialize() + $data;
    }
}
