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

class PanamericanSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('extraStep', $data)) {
            $this->setExtraStep($data['extraStep']);
        }
        if (array_key_exists('convertToAscii', $data)) {
            $this->setConvertToAscii($data['convertToAscii']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getExtraStep(): bool
    {
        return $this->fields['extraStep'];
    }

    public function setExtraStep(bool $extraStep): static
    {
        $this->fields['extraStep'] = $extraStep;

        return $this;
    }

    public function getConvertToAscii(): ?bool
    {
        return $this->fields['convertToAscii'] ?? null;
    }

    public function setConvertToAscii(null|bool $convertToAscii): static
    {
        $this->fields['convertToAscii'] = $convertToAscii;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('extraStep', $this->fields)) {
            $data['extraStep'] = $this->fields['extraStep'];
        }
        if (array_key_exists('convertToAscii', $this->fields)) {
            $data['convertToAscii'] = $this->fields['convertToAscii'];
        }

        return $data;
    }
}
