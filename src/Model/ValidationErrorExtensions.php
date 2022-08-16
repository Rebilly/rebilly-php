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

class ValidationErrorExtensions implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('invalidFields', $data)) {
            $this->setInvalidFields($data['invalidFields']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return null|ValidationError1InvalidFields[]
     */
    public function getInvalidFields(): ?array
    {
        return $this->fields['invalidFields'] ?? null;
    }

    /**
     * @param null|ValidationError1InvalidFields[] $invalidFields
     */
    public function setInvalidFields(null|array $invalidFields): self
    {
        $invalidFields = $invalidFields !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof ValidationError1InvalidFields ? $value : ValidationError1InvalidFields::from($value)) : null, $invalidFields) : null;

        $this->fields['invalidFields'] = $invalidFields;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('invalidFields', $this->fields)) {
            $data['invalidFields'] = $this->fields['invalidFields'];
        }

        return $data;
    }
}
