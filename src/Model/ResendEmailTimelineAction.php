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

use Rebilly\Sdk\Trait\HasMetadata;

class ResendEmailTimelineAction implements TimelineAction
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('messageId', $data)) {
            $this->setMessageId($data['messageId']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
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
