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

class OnlineueberweisenSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('payformCode', $data)) {
            $this->setPayformCode($data['payformCode']);
        }
        if (array_key_exists('extraStep', $data)) {
            $this->setExtraStep($data['extraStep']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPayformCode(): ?string
    {
        return $this->fields['payformCode'] ?? null;
    }

    public function setPayformCode(null|string $payformCode): static
    {
        $this->fields['payformCode'] = $payformCode;

        return $this;
    }

    public function getExtraStep(): ?bool
    {
        return $this->fields['extraStep'] ?? null;
    }

    public function setExtraStep(null|bool $extraStep): static
    {
        $this->fields['extraStep'] = $extraStep;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('payformCode', $this->fields)) {
            $data['payformCode'] = $this->fields['payformCode'];
        }
        if (array_key_exists('extraStep', $this->fields)) {
            $data['extraStep'] = $this->fields['extraStep'];
        }

        return $data;
    }
}
