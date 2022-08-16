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
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return null|Directa24Banks[]
     */
    public function getBanks(): ?array
    {
        return $this->fields['banks'] ?? null;
    }

    /**
     * @param null|Directa24Banks[] $banks
     */
    public function setBanks(null|array $banks): self
    {
        $banks = $banks !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof Directa24Banks ? $value : Directa24Banks::from($value)) : null, $banks) : null;

        $this->fields['banks'] = $banks;

        return $this;
    }

    public function getSkipStep(): ?bool
    {
        return $this->fields['skipStep'] ?? null;
    }

    public function setSkipStep(null|bool $skipStep): self
    {
        $this->fields['skipStep'] = $skipStep;

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

        return $data;
    }
}
