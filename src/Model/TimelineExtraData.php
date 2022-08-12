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

class TimelineExtraData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('actions', $data)) {
            $this->setActions($data['actions']);
        }
        if (array_key_exists('tables', $data)) {
            $this->setTables($data['tables']);
        }
        if (array_key_exists('author', $data)) {
            $this->setAuthor($data['author']);
        }
        if (array_key_exists('mentions', $data)) {
            $this->setMentions($data['mentions']);
        }
        if (array_key_exists('links', $data)) {
            $this->setLinks($data['links']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return null|\Rebilly\Sdk\Model\TimelineAction[]
     */
    public function getActions(): ?array
    {
        return $this->fields['actions'] ?? null;
    }

    /**
     * @param null|\Rebilly\Sdk\Model\TimelineAction[] $actions
     */
    public function setActions(null|array $actions): self
    {
        $actions = $actions !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\TimelineAction ? $value : \Rebilly\Sdk\Model\TimelineAction::from($value)) : null, $actions) : null;

        $this->fields['actions'] = $actions;

        return $this;
    }

    /**
     * @return null|\Rebilly\Sdk\Model\TimelineTable[]
     */
    public function getTables(): ?array
    {
        return $this->fields['tables'] ?? null;
    }

    /**
     * @param null|\Rebilly\Sdk\Model\TimelineTable[] $tables
     */
    public function setTables(null|array $tables): self
    {
        $tables = $tables !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\TimelineTable ? $value : \Rebilly\Sdk\Model\TimelineTable::from($value)) : null, $tables) : null;

        $this->fields['tables'] = $tables;

        return $this;
    }

    public function getAuthor(): ?TimelineExtraDataAuthor
    {
        return $this->fields['author'] ?? null;
    }

    public function setAuthor(null|TimelineExtraDataAuthor|array $author): self
    {
        if ($author !== null && !($author instanceof \Rebilly\Sdk\Model\TimelineExtraDataAuthor)) {
            $author = \Rebilly\Sdk\Model\TimelineExtraDataAuthor::from($author);
        }

        $this->fields['author'] = $author;

        return $this;
    }

    /**
     * @return null|array<string,string>
     */
    public function getMentions(): ?array
    {
        return $this->fields['mentions'] ?? null;
    }

    /**
     * @param null|array<string,string> $mentions
     */
    public function setMentions(null|array $mentions): self
    {
        $this->fields['mentions'] = $mentions;

        return $this;
    }

    /**
     * @return null|\Rebilly\Sdk\Model\TimelineExtraDataLinks[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['links'] ?? null;
    }

    /**
     * @param null|\Rebilly\Sdk\Model\TimelineExtraDataLinks[] $links
     */
    public function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\TimelineExtraDataLinks ? $value : \Rebilly\Sdk\Model\TimelineExtraDataLinks::from($value)) : null, $links) : null;

        $this->fields['links'] = $links;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('actions', $this->fields)) {
            $data['actions'] = $this->fields['actions'];
        }
        if (array_key_exists('tables', $this->fields)) {
            $data['tables'] = $this->fields['tables'];
        }
        if (array_key_exists('author', $this->fields)) {
            $data['author'] = $this->fields['author']?->jsonSerialize();
        }
        if (array_key_exists('mentions', $this->fields)) {
            $data['mentions'] = $this->fields['mentions'];
        }
        if (array_key_exists('links', $this->fields)) {
            $data['links'] = $this->fields['links'];
        }

        return $data;
    }
}
