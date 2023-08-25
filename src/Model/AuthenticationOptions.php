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

class AuthenticationOptions implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('passwordPattern', $data)) {
            $this->setPasswordPattern($data['passwordPattern']);
        }
        if (array_key_exists('credentialTtl', $data)) {
            $this->setCredentialTtl($data['credentialTtl']);
        }
        if (array_key_exists('authTokenTtl', $data)) {
            $this->setAuthTokenTtl($data['authTokenTtl']);
        }
        if (array_key_exists('resetTokenTtl', $data)) {
            $this->setResetTokenTtl($data['resetTokenTtl']);
        }
        if (array_key_exists('otpRequired', $data)) {
            $this->setOtpRequired($data['otpRequired']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPasswordPattern(): ?string
    {
        return $this->fields['passwordPattern'] ?? null;
    }

    public function setPasswordPattern(null|string $passwordPattern): static
    {
        $this->fields['passwordPattern'] = $passwordPattern;

        return $this;
    }

    public function getCredentialTtl(): ?int
    {
        return $this->fields['credentialTtl'] ?? null;
    }

    public function setCredentialTtl(null|int $credentialTtl): static
    {
        $this->fields['credentialTtl'] = $credentialTtl;

        return $this;
    }

    public function getAuthTokenTtl(): ?int
    {
        return $this->fields['authTokenTtl'] ?? null;
    }

    public function setAuthTokenTtl(null|int $authTokenTtl): static
    {
        $this->fields['authTokenTtl'] = $authTokenTtl;

        return $this;
    }

    public function getResetTokenTtl(): ?int
    {
        return $this->fields['resetTokenTtl'] ?? null;
    }

    public function setResetTokenTtl(null|int $resetTokenTtl): static
    {
        $this->fields['resetTokenTtl'] = $resetTokenTtl;

        return $this;
    }

    public function getOtpRequired(): ?bool
    {
        return $this->fields['otpRequired'] ?? null;
    }

    public function setOtpRequired(null|bool $otpRequired): static
    {
        $this->fields['otpRequired'] = $otpRequired;

        return $this;
    }

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    /**
     * @param null|array[]|ResourceLink[] $links
     */
    public function setLinks(null|array $links): static
    {
        $this->fields['_links'] = $links;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('passwordPattern', $this->fields)) {
            $data['passwordPattern'] = $this->fields['passwordPattern'];
        }
        if (array_key_exists('credentialTtl', $this->fields)) {
            $data['credentialTtl'] = $this->fields['credentialTtl'];
        }
        if (array_key_exists('authTokenTtl', $this->fields)) {
            $data['authTokenTtl'] = $this->fields['authTokenTtl'];
        }
        if (array_key_exists('resetTokenTtl', $this->fields)) {
            $data['resetTokenTtl'] = $this->fields['resetTokenTtl'];
        }
        if (array_key_exists('otpRequired', $this->fields)) {
            $data['otpRequired'] = $this->fields['otpRequired'];
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return $data;
    }
}
