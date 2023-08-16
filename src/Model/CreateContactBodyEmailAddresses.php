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

class CreateContactBodyEmailAddresses implements JsonSerializable
{
    public const FIELD_EMAIL1 = 'EMAIL1';

    public const FIELD_EMAIL2 = 'EMAIL2';

    public const FIELD_EMAIL3 = 'EMAIL3';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('email', $data)) {
            $this->setEmail($data['email']);
        }
        if (array_key_exists('field', $data)) {
            $this->setField($data['field']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getEmail(): ?string
    {
        return $this->fields['email'] ?? null;
    }

    public function setEmail(null|string $email): static
    {
        $this->fields['email'] = $email;

        return $this;
    }

    /**
     * @psalm-return self::FIELD_*|null $field
     */
    public function getField(): ?string
    {
        return $this->fields['field'] ?? null;
    }

    /**
     * @psalm-param self::FIELD_*|null $field
     */
    public function setField(null|string $field): static
    {
        $this->fields['field'] = $field;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('email', $this->fields)) {
            $data['email'] = $this->fields['email'];
        }
        if (array_key_exists('field', $this->fields)) {
            $data['field'] = $this->fields['field'];
        }

        return $data;
    }
}
