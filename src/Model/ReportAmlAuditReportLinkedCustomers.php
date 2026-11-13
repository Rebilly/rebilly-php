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
use Rebilly\Sdk\Trait\HasMetadata;

class ReportAmlAuditReportLinkedCustomers implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('websiteId', $data)) {
            $this->setWebsiteId($data['websiteId']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getId(): string
    {
        return $this->fields['id'];
    }

    public function setId(string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    public function getWebsiteId(): string
    {
        return $this->fields['websiteId'];
    }

    public function setWebsiteId(string $websiteId): static
    {
        $this->fields['websiteId'] = $websiteId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('websiteId', $this->fields)) {
            $data['websiteId'] = $this->fields['websiteId'];
        }

        return $data;
    }
}
