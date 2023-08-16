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

class SMSVoucherCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('AppId', $data)) {
            $this->setAppId($data['AppId']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAppId(): string
    {
        return $this->fields['AppId'];
    }

    public function setAppId(string $appId): static
    {
        $this->fields['AppId'] = $appId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('AppId', $this->fields)) {
            $data['AppId'] = $this->fields['AppId'];
        }

        return $data;
    }
}
