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

class NetellerSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('populateCustomerEmail', $data)) {
            $this->setPopulateCustomerEmail($data['populateCustomerEmail']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPopulateCustomerEmail(): ?bool
    {
        return $this->fields['populateCustomerEmail'] ?? null;
    }

    public function setPopulateCustomerEmail(null|bool $populateCustomerEmail): static
    {
        $this->fields['populateCustomerEmail'] = $populateCustomerEmail;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('populateCustomerEmail', $this->fields)) {
            $data['populateCustomerEmail'] = $this->fields['populateCustomerEmail'];
        }

        return $data;
    }
}
