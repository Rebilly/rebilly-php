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

class TransactionGatewayCvvResponse implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('code', $data)) {
            $this->setCode($data['code']);
        }
        if (array_key_exists('message', $data)) {
            $this->setMessage($data['message']);
        }
        if (array_key_exists('originalCode', $data)) {
            $this->setOriginalCode($data['originalCode']);
        }
        if (array_key_exists('originalMessage', $data)) {
            $this->setOriginalMessage($data['originalMessage']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCode(): ?string
    {
        return $this->fields['code'] ?? null;
    }

    public function setCode(null|string $code): self
    {
        $this->fields['code'] = $code;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->fields['message'] ?? null;
    }

    public function setMessage(null|string $message): self
    {
        $this->fields['message'] = $message;

        return $this;
    }

    public function getOriginalCode(): ?string
    {
        return $this->fields['originalCode'] ?? null;
    }

    public function setOriginalCode(null|string $originalCode): self
    {
        $this->fields['originalCode'] = $originalCode;

        return $this;
    }

    public function getOriginalMessage(): ?string
    {
        return $this->fields['originalMessage'] ?? null;
    }

    public function setOriginalMessage(null|string $originalMessage): self
    {
        $this->fields['originalMessage'] = $originalMessage;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('code', $this->fields)) {
            $data['code'] = $this->fields['code'];
        }
        if (array_key_exists('message', $this->fields)) {
            $data['message'] = $this->fields['message'];
        }
        if (array_key_exists('originalCode', $this->fields)) {
            $data['originalCode'] = $this->fields['originalCode'];
        }
        if (array_key_exists('originalMessage', $this->fields)) {
            $data['originalMessage'] = $this->fields['originalMessage'];
        }

        return $data;
    }
}
