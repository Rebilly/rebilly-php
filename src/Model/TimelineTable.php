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
    public const TYPE__LIST = 'list';

    public const TYPE_ONE_COLUMNS = 'one-columns';

    public const TYPE_TWO_COLUMNS = 'two-columns';

    public const TYPE_THREE_COLUMNS = 'three-columns';

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
            case 'three-columns':
                return new ThreeColumnsTimelineTable($data);
            case 'one-column':
                return new OneColumnTimelineTable($data);
            case 'list':
                return new ListTimelineTable($data);
            case 'two-columns':
                return new TwoColumnsTimelineTable($data);
        }

        throw new InvalidArgumentException("Unsupported type value: '{$data['type']}'");
    }

    /**
     * @psalm-return self::TYPE_*|null $type
     */
    public function getType(): ?string
    {
        return $this->fields['type'] ?? null;
    }

    public function getTitle(): ?string
    {
        return $this->fields['title'] ?? null;
    }

    public function setTitle(null|string $title): self
    {
        $this->fields['title'] = $title;

        return $this;
    }

    public function getFooter(): ?string
    {
        return $this->fields['footer'] ?? null;
    }

    public function setFooter(null|string $footer): self
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

    /**
     * @psalm-param self::TYPE_*|null $type
     */
    private function setType(null|string $type): self
    {
        $this->fields['type'] = $type;

        return $this;
    }
}
