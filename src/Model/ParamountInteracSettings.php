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

class ParamountInteracSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('sandbox', $data)) {
            $this->setSandbox($data['sandbox']);
        }
        if (array_key_exists('merchantSubId', $data)) {
            $this->setMerchantSubId($data['merchantSubId']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getSandbox(): ?bool
    {
        return $this->fields['sandbox'] ?? null;
    }

    public function setSandbox(null|bool $sandbox): static
    {
        $this->fields['sandbox'] = $sandbox;

        return $this;
    }

    public function getMerchantSubId(): ?int
    {
        return $this->fields['merchantSubId'] ?? null;
    }

    public function setMerchantSubId(null|int $merchantSubId): static
    {
        $this->fields['merchantSubId'] = $merchantSubId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('sandbox', $this->fields)) {
            $data['sandbox'] = $this->fields['sandbox'];
        }
        if (array_key_exists('merchantSubId', $this->fields)) {
            $data['merchantSubId'] = $this->fields['merchantSubId'];
        }

        return $data;
    }
}
