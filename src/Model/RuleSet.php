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

class RuleSet implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('version', $data)) {
            $this->setVersion($data['version']);
        }
        if (array_key_exists('binds', $data)) {
            $this->setBinds($data['binds']);
        }
        if (array_key_exists('rules', $data)) {
            $this->setRules($data['rules']);
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

    public function getVersion(): ?int
    {
        return $this->fields['version'] ?? null;
    }

    /**
     * @return null|\Rebilly\Sdk\Model\Bind[]
     */
    public function getBinds(): ?array
    {
        return $this->fields['binds'] ?? null;
    }

    /**
     * @param null|\Rebilly\Sdk\Model\Bind[] $binds
     */
    public function setBinds(null|array $binds): self
    {
        $binds = $binds !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\Bind ? $value : \Rebilly\Sdk\Model\Bind::from($value)) : null, $binds) : null;

        $this->fields['binds'] = $binds;

        return $this;
    }

    /**
     * @return \Rebilly\Sdk\Model\Rule[]
     */
    public function getRules(): array
    {
        return $this->fields['rules'];
    }

    /**
     * @param \Rebilly\Sdk\Model\Rule[] $rules
     */
    public function setRules(array $rules): self
    {
        $rules = array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\Rule ? $value : \Rebilly\Sdk\Model\Rule::from($value)) : null, $rules);

        $this->fields['rules'] = $rules;

        return $this;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    /**
     * @return null|\Rebilly\Sdk\Model\SelfLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('version', $this->fields)) {
            $data['version'] = $this->fields['version'];
        }
        if (array_key_exists('binds', $this->fields)) {
            $data['binds'] = $this->fields['binds'];
        }
        if (array_key_exists('rules', $this->fields)) {
            $data['rules'] = $this->fields['rules'];
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return $data;
    }

    private function setVersion(null|int $version): self
    {
        $this->fields['version'] = $version;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): self
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }

    /**
     * @param null|\Rebilly\Sdk\Model\SelfLink[] $links
     */
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\SelfLink ? $value : \Rebilly\Sdk\Model\SelfLink::from($value)) : null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
