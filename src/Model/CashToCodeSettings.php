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

class CashToCodeSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('baseUrl', $data)) {
            $this->setBaseUrl($data['baseUrl']);
        }
        if (array_key_exists('skipAmountSelection', $data)) {
            $this->setSkipAmountSelection($data['skipAmountSelection']);
        }
        if (array_key_exists('amounts', $data)) {
            $this->setAmounts($data['amounts']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getBaseUrl(): ?string
    {
        return $this->fields['baseUrl'] ?? null;
    }

    public function setBaseUrl(null|string $baseUrl): static
    {
        $this->fields['baseUrl'] = $baseUrl;

        return $this;
    }

    public function getSkipAmountSelection(): ?bool
    {
        return $this->fields['skipAmountSelection'] ?? null;
    }

    public function setSkipAmountSelection(null|bool $skipAmountSelection): static
    {
        $this->fields['skipAmountSelection'] = $skipAmountSelection;

        return $this;
    }

    /**
     * @return null|float[]
     */
    public function getAmounts(): ?array
    {
        return $this->fields['amounts'] ?? null;
    }

    /**
     * @param null|float[] $amounts
     */
    public function setAmounts(null|array $amounts): static
    {
        $amounts = $amounts !== null ? array_map(
            fn ($value) => $value,
            $amounts,
        ) : null;

        $this->fields['amounts'] = $amounts;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('baseUrl', $this->fields)) {
            $data['baseUrl'] = $this->fields['baseUrl'];
        }
        if (array_key_exists('skipAmountSelection', $this->fields)) {
            $data['skipAmountSelection'] = $this->fields['skipAmountSelection'];
        }
        if (array_key_exists('amounts', $this->fields)) {
            $data['amounts'] = $this->fields['amounts'];
        }

        return $data;
    }
}
