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

class PerformExperianCheck extends RuleAction
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'name' => 'perform-experian-check',
        ] + $data);

        if (array_key_exists('experianCredentialHash', $data)) {
            $this->setExperianCredentialHash($data['experianCredentialHash']);
        }
        if (array_key_exists('tagOnApprove', $data)) {
            $this->setTagOnApprove($data['tagOnApprove']);
        }
        if (array_key_exists('tagOnReject', $data)) {
            $this->setTagOnReject($data['tagOnReject']);
        }
        if (array_key_exists('tagOnUnknown', $data)) {
            $this->setTagOnUnknown($data['tagOnUnknown']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getExperianCredentialHash(): string
    {
        return $this->fields['experianCredentialHash'];
    }

    public function setExperianCredentialHash(string $experianCredentialHash): static
    {
        $this->fields['experianCredentialHash'] = $experianCredentialHash;

        return $this;
    }

    public function getTagOnApprove(): ?string
    {
        return $this->fields['tagOnApprove'] ?? null;
    }

    public function setTagOnApprove(null|string $tagOnApprove): static
    {
        $this->fields['tagOnApprove'] = $tagOnApprove;

        return $this;
    }

    public function getTagOnReject(): ?string
    {
        return $this->fields['tagOnReject'] ?? null;
    }

    public function setTagOnReject(null|string $tagOnReject): static
    {
        $this->fields['tagOnReject'] = $tagOnReject;

        return $this;
    }

    public function getTagOnUnknown(): ?string
    {
        return $this->fields['tagOnUnknown'] ?? null;
    }

    public function setTagOnUnknown(null|string $tagOnUnknown): static
    {
        $this->fields['tagOnUnknown'] = $tagOnUnknown;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('experianCredentialHash', $this->fields)) {
            $data['experianCredentialHash'] = $this->fields['experianCredentialHash'];
        }
        if (array_key_exists('tagOnApprove', $this->fields)) {
            $data['tagOnApprove'] = $this->fields['tagOnApprove'];
        }
        if (array_key_exists('tagOnReject', $this->fields)) {
            $data['tagOnReject'] = $this->fields['tagOnReject'];
        }
        if (array_key_exists('tagOnUnknown', $this->fields)) {
            $data['tagOnUnknown'] = $this->fields['tagOnUnknown'];
        }

        return parent::jsonSerialize() + $data;
    }
}
