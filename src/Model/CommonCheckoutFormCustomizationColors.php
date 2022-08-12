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

class CommonCheckoutFormCustomizationColors implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('primary', $data)) {
            $this->setPrimary($data['primary']);
        }
        if (array_key_exists('buttonText', $data)) {
            $this->setButtonText($data['buttonText']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPrimary(): ?string
    {
        return $this->fields['primary'] ?? null;
    }

    public function setPrimary(null|string $primary): self
    {
        $this->fields['primary'] = $primary;

        return $this;
    }

    public function getButtonText(): ?string
    {
        return $this->fields['buttonText'] ?? null;
    }

    public function setButtonText(null|string $buttonText): self
    {
        $this->fields['buttonText'] = $buttonText;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('primary', $this->fields)) {
            $data['primary'] = $this->fields['primary'];
        }
        if (array_key_exists('buttonText', $this->fields)) {
            $data['buttonText'] = $this->fields['buttonText'];
        }

        return $data;
    }
}
