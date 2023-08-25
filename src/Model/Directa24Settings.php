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

class Directa24Settings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('banks', $data)) {
            $this->setBanks($data['banks']);
        }
        if (array_key_exists('skipStep', $data)) {
            $this->setSkipStep($data['skipStep']);
        }
        if (array_key_exists('useV3Api', $data)) {
            $this->setUseV3Api($data['useV3Api']);
        }
        if (array_key_exists('storeIdNumber', $data)) {
            $this->setStoreIdNumber($data['storeIdNumber']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return null|string[]
     */
    public function getBanks(): ?array
    {
        return $this->fields['banks'] ?? null;
    }

    /**
     * @param null|string[] $banks
     */
    public function setBanks(null|array $banks): static
    {
        $banks = $banks !== null ? array_map(
            fn ($value) => $value,
            $banks,
        ) : null;

        $this->fields['banks'] = $banks;

        return $this;
    }

    public function getSkipStep(): ?bool
    {
        return $this->fields['skipStep'] ?? null;
    }

    public function setSkipStep(null|bool $skipStep): static
    {
        $this->fields['skipStep'] = $skipStep;

        return $this;
    }

    public function getUseV3Api(): ?bool
    {
        return $this->fields['useV3Api'] ?? null;
    }

    public function setUseV3Api(null|bool $useV3Api): static
    {
        $this->fields['useV3Api'] = $useV3Api;

        return $this;
    }

    public function getStoreIdNumber(): ?bool
    {
        return $this->fields['storeIdNumber'] ?? null;
    }

    public function setStoreIdNumber(null|bool $storeIdNumber): static
    {
        $this->fields['storeIdNumber'] = $storeIdNumber;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('banks', $this->fields)) {
            $data['banks'] = $this->fields['banks'];
        }
        if (array_key_exists('skipStep', $this->fields)) {
            $data['skipStep'] = $this->fields['skipStep'];
        }
        if (array_key_exists('useV3Api', $this->fields)) {
            $data['useV3Api'] = $this->fields['useV3Api'];
        }
        if (array_key_exists('storeIdNumber', $this->fields)) {
            $data['storeIdNumber'] = $this->fields['storeIdNumber'];
        }

        return $data;
    }
}
