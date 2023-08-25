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
use JsonSerializable;

class RuleSetDraft implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('baseVersion', $data)) {
            $this->setBaseVersion($data['baseVersion']);
        }
        if (array_key_exists('binds', $data)) {
            $this->setBinds($data['binds']);
        }
        if (array_key_exists('rules', $data)) {
            $this->setRules($data['rules']);
        }
        if (array_key_exists('author', $data)) {
            $this->setAuthor($data['author']);
        }
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
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

    public function getBaseVersion(): int
    {
        return $this->fields['baseVersion'];
    }

    public function setBaseVersion(int $baseVersion): static
    {
        $this->fields['baseVersion'] = $baseVersion;

        return $this;
    }

    /**
     * @return null|Bind[]
     */
    public function getBinds(): ?array
    {
        return $this->fields['binds'] ?? null;
    }

    /**
     * @param null|array[]|Bind[] $binds
     */
    public function setBinds(null|array $binds): static
    {
        $binds = $binds !== null ? array_map(
            fn ($value) => $value !== null ? ($value instanceof Bind ? $value : Bind::from($value)) : null,
            $binds,
        ) : null;

        $this->fields['binds'] = $binds;

        return $this;
    }

    /**
     * @return Rule[]
     */
    public function getRules(): array
    {
        return $this->fields['rules'];
    }

    /**
     * @param array[]|Rule[] $rules
     */
    public function setRules(array $rules): static
    {
        $rules = array_map(
            fn ($value) => $value !== null ? ($value instanceof Rule ? $value : Rule::from($value)) : null,
            $rules,
        );

        $this->fields['rules'] = $rules;

        return $this;
    }

    public function getAuthor(): ?RuleSetDraftAuthor
    {
        return $this->fields['author'] ?? null;
    }

    public function setAuthor(null|RuleSetDraftAuthor|array $author): static
    {
        if ($author !== null && !($author instanceof RuleSetDraftAuthor)) {
            $author = RuleSetDraftAuthor::from($author);
        }

        $this->fields['author'] = $author;

        return $this;
    }

    public function getName(): string
    {
        return $this->fields['name'];
    }

    public function setName(string $name): static
    {
        $this->fields['name'] = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->fields['description'] ?? null;
    }

    public function setDescription(null|string $description): static
    {
        $this->fields['description'] = $description;

        return $this;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('baseVersion', $this->fields)) {
            $data['baseVersion'] = $this->fields['baseVersion'];
        }
        if (array_key_exists('binds', $this->fields)) {
            $data['binds'] = $this->fields['binds'];
        }
        if (array_key_exists('rules', $this->fields)) {
            $data['rules'] = $this->fields['rules'];
        }
        if (array_key_exists('author', $this->fields)) {
            $data['author'] = $this->fields['author']?->jsonSerialize();
        }
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setCreatedTime(null|DateTimeImmutable|string $createdTime): static
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): static
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }

    /**
     * @param null|array[]|ResourceLink[] $links
     */
    private function setLinks(null|array $links): static
    {
        $links = $links !== null ? array_map(
            fn ($value) => $value instanceof ResourceLink ? $value : ResourceLink::from($value),
            $links,
        ) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
