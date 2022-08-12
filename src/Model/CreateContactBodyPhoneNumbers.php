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

class CreateContactBodyPhoneNumbers implements JsonSerializable
{
    public const FIELD_PHONE1 = 'PHONE1';

    public const FIELD_PHONE2 = 'PHONE2';

    public const FIELD_PHONE3 = 'PHONE3';

    public const FIELD_PHONE4 = 'PHONE4';

    public const FIELD_PHONE5 = 'PHONE5';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('number', $data)) {
            $this->setNumber($data['number']);
        }
        if (array_key_exists('field', $data)) {
            $this->setField($data['field']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getNumber(): ?string
    {
        return $this->fields['number'] ?? null;
    }

    public function setNumber(null|string $number): self
    {
        $this->fields['number'] = $number;

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
    public function setField(null|string $field): self
    {
        $this->fields['field'] = $field;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('number', $this->fields)) {
            $data['number'] = $this->fields['number'];
        }
        if (array_key_exists('field', $this->fields)) {
            $data['field'] = $this->fields['field'];
        }

        return $data;
    }
}
