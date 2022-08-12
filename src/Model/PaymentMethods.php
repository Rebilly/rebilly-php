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

class PaymentMethods extends PaymentInstruction
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct($data);

        if (array_key_exists('methods', $data)) {
            $this->setMethods($data['methods']);
        }
        if (array_key_exists('receivedBy', $data)) {
            $this->setReceivedBy($data['receivedBy']);
        }
        if (array_key_exists('reference', $data)) {
            $this->setReference($data['reference']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return null|\Rebilly\Sdk\Model\PaymentMethod[]
     */
    public function getMethods(): ?array
    {
        return $this->fields['methods'] ?? null;
    }

    /**
     * @param null|\Rebilly\Sdk\Model\PaymentMethod[] $methods
     */
    public function setMethods(null|array $methods): self
    {
        $methods = $methods !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\PaymentMethod ? $value : \Rebilly\Sdk\Model\PaymentMethod::from($value)) : null, $methods) : null;

        $this->fields['methods'] = $methods;

        return $this;
    }

    public function getReceivedBy(): ?string
    {
        return $this->fields['receivedBy'] ?? null;
    }

    public function setReceivedBy(null|string $receivedBy): self
    {
        $this->fields['receivedBy'] = $receivedBy;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->fields['reference'] ?? null;
    }

    public function setReference(null|string $reference): self
    {
        $this->fields['reference'] = $reference;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('methods', $this->fields)) {
            $data['methods'] = $this->fields['methods'];
        }
        if (array_key_exists('receivedBy', $this->fields)) {
            $data['receivedBy'] = $this->fields['receivedBy'];
        }
        if (array_key_exists('reference', $this->fields)) {
            $data['reference'] = $this->fields['reference'];
        }

        return parent::jsonSerialize() + $data;
    }
}
