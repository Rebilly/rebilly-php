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
use Rebilly\Sdk\Trait\HasMetadata;

class PostFinanceSettings implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('skipPaymentFileUpload', $data)) {
            $this->setSkipPaymentFileUpload($data['skipPaymentFileUpload']);
        }
        if (array_key_exists('enableAliasAuthentication', $data)) {
            $this->setEnableAliasAuthentication($data['enableAliasAuthentication']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getSkipPaymentFileUpload(): ?bool
    {
        return $this->fields['skipPaymentFileUpload'] ?? null;
    }

    public function setSkipPaymentFileUpload(null|bool $skipPaymentFileUpload): static
    {
        $this->fields['skipPaymentFileUpload'] = $skipPaymentFileUpload;

        return $this;
    }

    public function getEnableAliasAuthentication(): ?bool
    {
        return $this->fields['enableAliasAuthentication'] ?? null;
    }

    public function setEnableAliasAuthentication(null|bool $enableAliasAuthentication): static
    {
        $this->fields['enableAliasAuthentication'] = $enableAliasAuthentication;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('skipPaymentFileUpload', $this->fields)) {
            $data['skipPaymentFileUpload'] = $this->fields['skipPaymentFileUpload'];
        }
        if (array_key_exists('enableAliasAuthentication', $this->fields)) {
            $data['enableAliasAuthentication'] = $this->fields['enableAliasAuthentication'];
        }

        return $data;
    }
}
