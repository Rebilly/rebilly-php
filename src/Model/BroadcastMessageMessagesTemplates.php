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

class BroadcastMessageMessagesTemplates implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('from', $data)) {
            $this->setFrom($data['from']);
        }
        if (array_key_exists('subject', $data)) {
            $this->setSubject($data['subject']);
        }
        if (array_key_exists('text', $data)) {
            $this->setText($data['text']);
        }
        if (array_key_exists('html', $data)) {
            $this->setHtml($data['html']);
        }
        if (array_key_exists('locale', $data)) {
            $this->setLocale($data['locale']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getFrom(): string
    {
        return $this->fields['from'];
    }

    public function setFrom(string $from): static
    {
        $this->fields['from'] = $from;

        return $this;
    }

    public function getSubject(): string
    {
        return $this->fields['subject'];
    }

    public function setSubject(string $subject): static
    {
        $this->fields['subject'] = $subject;

        return $this;
    }

    public function getText(): string
    {
        return $this->fields['text'];
    }

    public function setText(string $text): static
    {
        $this->fields['text'] = $text;

        return $this;
    }

    public function getHtml(): string
    {
        return $this->fields['html'];
    }

    public function setHtml(string $html): static
    {
        $this->fields['html'] = $html;

        return $this;
    }

    public function getLocale(): string
    {
        return $this->fields['locale'];
    }

    public function setLocale(string $locale): static
    {
        $this->fields['locale'] = $locale;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('from', $this->fields)) {
            $data['from'] = $this->fields['from'];
        }
        if (array_key_exists('subject', $this->fields)) {
            $data['subject'] = $this->fields['subject'];
        }
        if (array_key_exists('text', $this->fields)) {
            $data['text'] = $this->fields['text'];
        }
        if (array_key_exists('html', $this->fields)) {
            $data['html'] = $this->fields['html'];
        }
        if (array_key_exists('locale', $this->fields)) {
            $data['locale'] = $this->fields['locale'];
        }

        return $data;
    }
}
