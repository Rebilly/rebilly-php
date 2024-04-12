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

class ProofOfCreditFileKycDocumentEmbedded implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('customer', $data)) {
            $this->setCustomer($data['customer']);
        }
        if (array_key_exists('files', $data)) {
            $this->setFiles($data['files']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCustomer(): ?Customer
    {
        return $this->fields['customer'] ?? null;
    }

    public function setCustomer(null|Customer|array $customer): static
    {
        if ($customer !== null && !($customer instanceof Customer)) {
            $customer = Customer::from($customer);
        }

        $this->fields['customer'] = $customer;

        return $this;
    }

    /**
     * @return null|File[]
     */
    public function getFiles(): ?array
    {
        return $this->fields['files'] ?? null;
    }

    /**
     * @param null|array[]|File[] $files
     */
    public function setFiles(null|array $files): static
    {
        $files = $files !== null ? array_map(
            fn ($value) => $value instanceof File ? $value : File::from($value),
            $files,
        ) : null;

        $this->fields['files'] = $files;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('customer', $this->fields)) {
            $data['customer'] = $this->fields['customer']?->jsonSerialize();
        }
        if (array_key_exists('files', $this->fields)) {
            $data['files'] = $this->fields['files'] !== null
                ? array_map(
                    static fn (File $file) => $file->jsonSerialize(),
                    $this->fields['files'],
                )
                : null;
        }

        return $data;
    }
}
