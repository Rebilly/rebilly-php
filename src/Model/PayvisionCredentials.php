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

class PayvisionCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('memberId', $data)) {
            $this->setMemberId($data['memberId']);
        }
        if (array_key_exists('memberGuid', $data)) {
            $this->setMemberGuid($data['memberGuid']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMemberId(): string
    {
        return $this->fields['memberId'];
    }

    public function setMemberId(string $memberId): self
    {
        $this->fields['memberId'] = $memberId;

        return $this;
    }

    public function getMemberGuid(): string
    {
        return $this->fields['memberGuid'];
    }

    public function setMemberGuid(string $memberGuid): self
    {
        $this->fields['memberGuid'] = $memberGuid;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('memberId', $this->fields)) {
            $data['memberId'] = $this->fields['memberId'];
        }
        if (array_key_exists('memberGuid', $this->fields)) {
            $data['memberGuid'] = $this->fields['memberGuid'];
        }

        return $data;
    }
}
