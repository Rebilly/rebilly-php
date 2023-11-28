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

class EmailMessage implements JsonSerializable
{
    public const STATUS_DRAFT = 'draft';

    public const STATUS_OUTBOX = 'outbox';

    public const STATUS_SENDING = 'sending';

    public const STATUS_SENT = 'sent';

    public const STATUS_FAILED = 'failed';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('metadata', $data)) {
            $this->setMetadata($data['metadata']);
        }
        if (array_key_exists('credentialHash', $data)) {
            $this->setCredentialHash($data['credentialHash']);
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
        if (array_key_exists('attachments', $data)) {
            $this->setAttachments($data['attachments']);
        }
        if (array_key_exists('responseCode', $data)) {
            $this->setResponseCode($data['responseCode']);
        }
        if (array_key_exists('responseBody', $data)) {
            $this->setResponseBody($data['responseBody']);
        }
        if (array_key_exists('initiatedTime', $data)) {
            $this->setInitiatedTime($data['initiatedTime']);
        }
        if (array_key_exists('sentTime', $data)) {
            $this->setSentTime($data['sentTime']);
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

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    /**
     * @return null|array<string,string>
     */
    public function getMetadata(): ?array
    {
        return $this->fields['metadata'] ?? null;
    }

    /**
     * @param null|array<string,string> $metadata
     */
    public function setMetadata(null|array $metadata): static
    {
        $this->fields['metadata'] = $metadata;

        return $this;
    }

    public function getCredentialHash(): ?string
    {
        return $this->fields['credentialHash'] ?? null;
    }

    public function setCredentialHash(null|string $credentialHash): static
    {
        $this->fields['credentialHash'] = $credentialHash;

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

    /**
     * @return null|EmailMessageAttachments[]
     */
    public function getAttachments(): ?array
    {
        return $this->fields['attachments'] ?? null;
    }

    /**
     * @param null|array[]|EmailMessageAttachments[] $attachments
     */
    public function setAttachments(null|array $attachments): static
    {
        $attachments = $attachments !== null ? array_map(
            fn ($value) => $value instanceof EmailMessageAttachments ? $value : EmailMessageAttachments::from($value),
            $attachments,
        ) : null;

        $this->fields['attachments'] = $attachments;

        return $this;
    }

    public function getResponseCode(): ?int
    {
        return $this->fields['responseCode'] ?? null;
    }

    public function getResponseBody(): ?string
    {
        return $this->fields['responseBody'] ?? null;
    }

    public function getInitiatedTime(): ?DateTimeImmutable
    {
        return $this->fields['initiatedTime'] ?? null;
    }

    public function getSentTime(): ?DateTimeImmutable
    {
        return $this->fields['sentTime'] ?? null;
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
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('metadata', $this->fields)) {
            $data['metadata'] = $this->fields['metadata'];
        }
        if (array_key_exists('credentialHash', $this->fields)) {
            $data['credentialHash'] = $this->fields['credentialHash'];
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
        if (array_key_exists('attachments', $this->fields)) {
            $data['attachments'] = $this->fields['attachments'];
        }
        if (array_key_exists('responseCode', $this->fields)) {
            $data['responseCode'] = $this->fields['responseCode'];
        }
        if (array_key_exists('responseBody', $this->fields)) {
            $data['responseBody'] = $this->fields['responseBody'];
        }
        if (array_key_exists('initiatedTime', $this->fields)) {
            $data['initiatedTime'] = $this->fields['initiatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('sentTime', $this->fields)) {
            $data['sentTime'] = $this->fields['sentTime']?->format(DateTimeInterface::RFC3339);
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

    private function setResponseCode(null|int $responseCode): static
    {
        $this->fields['responseCode'] = $responseCode;

        return $this;
    }

    private function setResponseBody(null|string $responseBody): static
    {
        $this->fields['responseBody'] = $responseBody;

        return $this;
    }

    private function setInitiatedTime(null|DateTimeImmutable|string $initiatedTime): static
    {
        if ($initiatedTime !== null && !($initiatedTime instanceof DateTimeImmutable)) {
            $initiatedTime = new DateTimeImmutable($initiatedTime);
        }

        $this->fields['initiatedTime'] = $initiatedTime;

        return $this;
    }

    private function setSentTime(null|DateTimeImmutable|string $sentTime): static
    {
        if ($sentTime !== null && !($sentTime instanceof DateTimeImmutable)) {
            $sentTime = new DateTimeImmutable($sentTime);
        }

        $this->fields['sentTime'] = $sentTime;

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
