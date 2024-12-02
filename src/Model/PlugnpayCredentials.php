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

class PlugnpayCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('publisher-name', $data)) {
            $this->setPublisherName($data['publisher-name']);
        }
        if (array_key_exists('publisher-password', $data)) {
            $this->setPublisherPassword($data['publisher-password']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPublisherName(): string
    {
        return $this->fields['publisher-name'];
    }

    public function setPublisherName(string $publisherName): static
    {
        $this->fields['publisher-name'] = $publisherName;

        return $this;
    }

    public function getPublisherPassword(): string
    {
        return $this->fields['publisher-password'];
    }

    public function setPublisherPassword(string $publisherPassword): static
    {
        $this->fields['publisher-password'] = $publisherPassword;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('publisher-name', $this->fields)) {
            $data['publisher-name'] = $this->fields['publisher-name'];
        }
        if (array_key_exists('publisher-password', $this->fields)) {
            $data['publisher-password'] = $this->fields['publisher-password'];
        }

        return $data;
    }
}
