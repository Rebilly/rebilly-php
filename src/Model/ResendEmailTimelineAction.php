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

class ResendEmailTimelineAction implements TimelineAction
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('messageId', $data)) {
            $this->setMessageId($data['messageId']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAction(): string
    {
        return 'resend-email';
    }

    public function getMessageId(): ?string
    {
        return $this->fields['messageId'] ?? null;
    }

    public function setMessageId(null|string $messageId): static
    {
        $this->fields['messageId'] = $messageId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'action' => 'resend-email',
        ];
        if (array_key_exists('messageId', $this->fields)) {
            $data['messageId'] = $this->fields['messageId'];
        }

        return $data;
    }
}
