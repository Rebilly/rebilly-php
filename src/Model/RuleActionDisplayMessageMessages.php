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

class RuleActionDisplayMessageMessages implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('langIso', $data)) {
            $this->setLangIso($data['langIso']);
        }
        if (array_key_exists('content', $data)) {
            $this->setContent($data['content']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getLangIso(): string
    {
        return $this->fields['langIso'];
    }

    public function setLangIso(string $langIso): static
    {
        $this->fields['langIso'] = $langIso;

        return $this;
    }

    public function getContent(): string
    {
        return $this->fields['content'];
    }

    public function setContent(string $content): static
    {
        $this->fields['content'] = $content;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('langIso', $this->fields)) {
            $data['langIso'] = $this->fields['langIso'];
        }
        if (array_key_exists('content', $this->fields)) {
            $data['content'] = $this->fields['content'];
        }

        return $data;
    }
}
