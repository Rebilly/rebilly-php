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

class RulesEmailNotificationTemplates implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('locale', $data)) {
            $this->setLocale($data['locale']);
        }
        if (array_key_exists('from', $data)) {
            $this->setFrom($data['from']);
        }
        if (array_key_exists('to', $data)) {
            $this->setTo($data['to']);
        }
        if (array_key_exists('cc', $data)) {
            $this->setCc($data['cc']);
        }
        if (array_key_exists('bcc', $data)) {
            $this->setBcc($data['bcc']);
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
        if (array_key_exists('editor', $data)) {
            $this->setEditor($data['editor']);
        }
        if (array_key_exists('attachments', $data)) {
            $this->setAttachments($data['attachments']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
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

    public function getFrom(): string
    {
        return $this->fields['from'];
    }

    public function setFrom(string $from): static
    {
        $this->fields['from'] = $from;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getTo(): array
    {
        return $this->fields['to'];
    }

    /**
     * @param string[] $to
     */
    public function setTo(array $to): static
    {
        $to = array_map(
            fn ($value) => $value,
            $to,
        );

        $this->fields['to'] = $to;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getCc(): ?array
    {
        return $this->fields['cc'] ?? null;
    }

    /**
     * @param null|string[] $cc
     */
    public function setCc(null|array $cc): static
    {
        $cc = $cc !== null ? array_map(
            fn ($value) => $value,
            $cc,
        ) : null;

        $this->fields['cc'] = $cc;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getBcc(): ?array
    {
        return $this->fields['bcc'] ?? null;
    }

    /**
     * @param null|string[] $bcc
     */
    public function setBcc(null|array $bcc): static
    {
        $bcc = $bcc !== null ? array_map(
            fn ($value) => $value,
            $bcc,
        ) : null;

        $this->fields['bcc'] = $bcc;

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

    public function getEditor(): ?string
    {
        return $this->fields['editor'] ?? null;
    }

    public function setEditor(null|string $editor): static
    {
        $this->fields['editor'] = $editor;

        return $this;
    }

    /**
     * @return null|RulesEmailNotificationTemplatesAttachments[]
     */
    public function getAttachments(): ?array
    {
        return $this->fields['attachments'] ?? null;
    }

    /**
     * @param null|array[]|RulesEmailNotificationTemplatesAttachments[] $attachments
     */
    public function setAttachments(null|array $attachments): static
    {
        $attachments = $attachments !== null ? array_map(
            fn ($value) => $value !== null ? ($value instanceof RulesEmailNotificationTemplatesAttachments ? $value : RulesEmailNotificationTemplatesAttachments::from($value)) : null,
            $attachments,
        ) : null;

        $this->fields['attachments'] = $attachments;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('locale', $this->fields)) {
            $data['locale'] = $this->fields['locale'];
        }
        if (array_key_exists('from', $this->fields)) {
            $data['from'] = $this->fields['from'];
        }
        if (array_key_exists('to', $this->fields)) {
            $data['to'] = $this->fields['to'];
        }
        if (array_key_exists('cc', $this->fields)) {
            $data['cc'] = $this->fields['cc'];
        }
        if (array_key_exists('bcc', $this->fields)) {
            $data['bcc'] = $this->fields['bcc'];
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
        if (array_key_exists('editor', $this->fields)) {
            $data['editor'] = $this->fields['editor'];
        }
        if (array_key_exists('attachments', $this->fields)) {
            $data['attachments'] = $this->fields['attachments'];
        }

        return $data;
    }
}
