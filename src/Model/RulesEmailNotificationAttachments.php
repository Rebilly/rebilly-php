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

class RulesEmailNotificationAttachments implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('resourceType', $data)) {
            $this->setResourceType($data['resourceType']);
        }
        if (array_key_exists('resourceId', $data)) {
            $this->setResourceId($data['resourceId']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getResourceType(): string
    {
        return $this->fields['resourceType'];
    }

    public function setResourceType(string $resourceType): self
    {
        $this->fields['resourceType'] = $resourceType;

        return $this;
    }

    public function getResourceId(): string
    {
        return $this->fields['resourceId'];
    }

    public function setResourceId(string $resourceId): self
    {
        $this->fields['resourceId'] = $resourceId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('resourceType', $this->fields)) {
            $data['resourceType'] = $this->fields['resourceType'];
        }
        if (array_key_exists('resourceId', $this->fields)) {
            $data['resourceId'] = $this->fields['resourceId'];
        }

        return $data;
    }
}
