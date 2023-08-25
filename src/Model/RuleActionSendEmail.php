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

use DateTimeImmutable;
use DateTimeInterface;

class RuleActionSendEmail extends RuleAction
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'name' => 'send-email',
        ] + $data);

        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('title', $data)) {
            $this->setTitle($data['title']);
        }
        if (array_key_exists('emails', $data)) {
            $this->setEmails($data['emails']);
        }
        if (array_key_exists('splitTestStartTime', $data)) {
            $this->setSplitTestStartTime($data['splitTestStartTime']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->fields['title'] ?? null;
    }

    public function setTitle(null|string $title): static
    {
        $this->fields['title'] = $title;

        return $this;
    }

    /**
     * @return RulesEmailNotification[]
     */
    public function getEmails(): array
    {
        return $this->fields['emails'];
    }

    /**
     * @param array[]|RulesEmailNotification[] $emails
     */
    public function setEmails(array $emails): static
    {
        $emails = array_map(
            fn ($value) => $value !== null ? ($value instanceof RulesEmailNotification ? $value : RulesEmailNotification::from($value)) : null,
            $emails,
        );

        $this->fields['emails'] = $emails;

        return $this;
    }

    public function getSplitTestStartTime(): ?DateTimeImmutable
    {
        return $this->fields['splitTestStartTime'] ?? null;
    }

    public function setSplitTestStartTime(null|DateTimeImmutable|string $splitTestStartTime): static
    {
        if ($splitTestStartTime !== null && !($splitTestStartTime instanceof DateTimeImmutable)) {
            $splitTestStartTime = new DateTimeImmutable($splitTestStartTime);
        }

        $this->fields['splitTestStartTime'] = $splitTestStartTime;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('title', $this->fields)) {
            $data['title'] = $this->fields['title'];
        }
        if (array_key_exists('emails', $this->fields)) {
            $data['emails'] = $this->fields['emails'];
        }
        if (array_key_exists('splitTestStartTime', $this->fields)) {
            $data['splitTestStartTime'] = $this->fields['splitTestStartTime']?->format(DateTimeInterface::RFC3339);
        }

        return parent::jsonSerialize() + $data;
    }
}
