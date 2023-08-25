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

class PagsmileSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('useTradePay', $data)) {
            $this->setUseTradePay($data['useTradePay']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getUseTradePay(): ?bool
    {
        return $this->fields['useTradePay'] ?? null;
    }

    public function setUseTradePay(null|bool $useTradePay): static
    {
        $this->fields['useTradePay'] = $useTradePay;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('useTradePay', $this->fields)) {
            $data['useTradePay'] = $this->fields['useTradePay'];
        }

        return $data;
    }
}
