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

class DengiCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('projectId', $data)) {
            $this->setProjectId($data['projectId']);
        }
        if (array_key_exists('publicKey', $data)) {
            $this->setPublicKey($data['publicKey']);
        }
        if (array_key_exists('refundKey', $data)) {
            $this->setRefundKey($data['refundKey']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getProjectId(): string
    {
        return $this->fields['projectId'];
    }

    public function setProjectId(string $projectId): static
    {
        $this->fields['projectId'] = $projectId;

        return $this;
    }

    public function getPublicKey(): string
    {
        return $this->fields['publicKey'];
    }

    public function setPublicKey(string $publicKey): static
    {
        $this->fields['publicKey'] = $publicKey;

        return $this;
    }

    public function getRefundKey(): string
    {
        return $this->fields['refundKey'];
    }

    public function setRefundKey(string $refundKey): static
    {
        $this->fields['refundKey'] = $refundKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('projectId', $this->fields)) {
            $data['projectId'] = $this->fields['projectId'];
        }
        if (array_key_exists('publicKey', $this->fields)) {
            $data['publicKey'] = $this->fields['publicKey'];
        }
        if (array_key_exists('refundKey', $this->fields)) {
            $data['refundKey'] = $this->fields['refundKey'];
        }

        return $data;
    }
}
