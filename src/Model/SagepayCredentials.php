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

class SagepayCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('M_ID', $data)) {
            $this->setMID($data['M_ID']);
        }
        if (array_key_exists('M_KEY', $data)) {
            $this->setMKEY($data['M_KEY']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMID(): string
    {
        return $this->fields['M_ID'];
    }

    public function setMID(string $mID): static
    {
        $this->fields['M_ID'] = $mID;

        return $this;
    }

    public function getMKEY(): string
    {
        return $this->fields['M_KEY'];
    }

    public function setMKEY(string $mKEY): static
    {
        $this->fields['M_KEY'] = $mKEY;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('M_ID', $this->fields)) {
            $data['M_ID'] = $this->fields['M_ID'];
        }
        if (array_key_exists('M_KEY', $this->fields)) {
            $data['M_KEY'] = $this->fields['M_KEY'];
        }

        return $data;
    }
}
