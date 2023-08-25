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

use InvalidArgumentException;
use JsonSerializable;

abstract class TimelineTable implements JsonSerializable
{
    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('title', $data)) {
            $this->setTitle($data['title']);
        }
        if (array_key_exists('footer', $data)) {
            $this->setFooter($data['footer']);
        }
    }

    public static function from(array $data = []): self
    {
        switch ($data['type']) {
            case 'list':
                return new ListTimelineTable($data);
            case 'one-column':
                return new OneColumnTimelineTable($data);
            case 'three-columns':
                return new ThreeColumnsTimelineTable($data);
            case 'two-columns':
                return new TwoColumnsTimelineTable($data);
        }

        throw new InvalidArgumentException("Unsupported type value: '{$data['type']}'");
    }

    public function getType(): ?string
    {
        return $this->fields['type'] ?? null;
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

    public function getFooter(): ?string
    {
        return $this->fields['footer'] ?? null;
    }

    public function setFooter(null|string $footer): static
    {
        $this->fields['footer'] = $footer;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('title', $this->fields)) {
            $data['title'] = $this->fields['title'];
        }
        if (array_key_exists('footer', $this->fields)) {
            $data['footer'] = $this->fields['footer'];
        }

        return $data;
    }

    private function setType(null|string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }
}
