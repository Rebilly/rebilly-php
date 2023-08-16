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

class ResetPassword implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('newPassword', $data)) {
            $this->setNewPassword($data['newPassword']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getNewPassword(): string
    {
        return $this->fields['newPassword'];
    }

    public function setNewPassword(string $newPassword): static
    {
        $this->fields['newPassword'] = $newPassword;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('newPassword', $this->fields)) {
            $data['newPassword'] = $this->fields['newPassword'];
        }

        return $data;
    }
}
