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

class SkrillSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('merchantFields', $data)) {
            $this->setMerchantFields($data['merchantFields']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMerchantFields(): ?string
    {
        return $this->fields['merchantFields'] ?? null;
    }

    public function setMerchantFields(null|string $merchantFields): static
    {
        $this->fields['merchantFields'] = $merchantFields;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchantFields', $this->fields)) {
            $data['merchantFields'] = $this->fields['merchantFields'];
        }

        return $data;
    }
}
