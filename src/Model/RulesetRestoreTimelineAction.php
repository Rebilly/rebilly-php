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

class RulesetRestoreTimelineAction implements TimelineAction, JsonSerializable
{
    public const ACTION_RULESET_RESTORE = 'ruleset-restore';

    public const TYPE_ARREST = 'arrest';

    public const TYPE_BANKRUPTCY = 'bankruptcy';

    public const TYPE_FRAUD = 'fraud';

    public const TYPE_OCCUPATION = 'occupation';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('action', $data)) {
            $this->setAction($data['action']);
        }
        if (array_key_exists('version', $data)) {
            $this->setVersion($data['version']);
        }
        if (array_key_exists('redemptionId', $data)) {
            $this->setRedemptionId($data['redemptionId']);
        }
        if (array_key_exists('messageId', $data)) {
            $this->setMessageId($data['messageId']);
        }
        if (array_key_exists('searchLogId', $data)) {
            $this->setSearchLogId($data['searchLogId']);
        }
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAction(): ?string
    {
        return $this->fields['action'] ?? null;
    }

    public function setAction(null|string $action): static
    {
        $this->fields['action'] = $action;

        return $this;
    }

    public function getVersion(): ?int
    {
        return $this->fields['version'] ?? null;
    }

    public function setVersion(null|int $version): static
    {
        $this->fields['version'] = $version;

        return $this;
    }

    public function getRedemptionId(): ?string
    {
        return $this->fields['redemptionId'] ?? null;
    }

    public function setRedemptionId(null|string $redemptionId): static
    {
        $this->fields['redemptionId'] = $redemptionId;

        return $this;
    }

    public function getMessageId(): ?string
    {
        return $this->fields['messageId'] ?? null;
    }

    public function setMessageId(null|string $messageId): static
    {
        $this->fields['messageId'] = $messageId;

        return $this;
    }

    public function getSearchLogId(): ?string
    {
        return $this->fields['searchLogId'] ?? null;
    }

    public function setSearchLogId(null|string $searchLogId): static
    {
        $this->fields['searchLogId'] = $searchLogId;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->fields['type'] ?? null;
    }

    public function setType(null|string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('action', $this->fields)) {
            $data['action'] = $this->fields['action'];
        }
        if (array_key_exists('version', $this->fields)) {
            $data['version'] = $this->fields['version'];
        }
        if (array_key_exists('redemptionId', $this->fields)) {
            $data['redemptionId'] = $this->fields['redemptionId'];
        }
        if (array_key_exists('messageId', $this->fields)) {
            $data['messageId'] = $this->fields['messageId'];
        }
        if (array_key_exists('searchLogId', $this->fields)) {
            $data['searchLogId'] = $this->fields['searchLogId'];
        }
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }

        return $data;
    }
}
