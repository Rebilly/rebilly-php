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

class RuleActionRequestPhysicalAddress extends RuleAction
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        parent::__construct([
            'name' => 'request-physical-address',
        ] + $data, $metadata);

        if (array_key_exists('instructionsText', $data)) {
            $this->setInstructionsText($data['instructionsText']);
        }
        if (array_key_exists('buttonText', $data)) {
            $this->setButtonText($data['buttonText']);
        }
        if (array_key_exists('skipLinkText', $data)) {
            $this->setSkipLinkText($data['skipLinkText']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getInstructionsText(): ?string
    {
        return $this->fields['instructionsText'] ?? null;
    }

    public function setInstructionsText(null|string $instructionsText): static
    {
        $this->fields['instructionsText'] = $instructionsText;

        return $this;
    }

    public function getButtonText(): ?string
    {
        return $this->fields['buttonText'] ?? null;
    }

    public function setButtonText(null|string $buttonText): static
    {
        $this->fields['buttonText'] = $buttonText;

        return $this;
    }

    public function getSkipLinkText(): ?string
    {
        return $this->fields['skipLinkText'] ?? null;
    }

    public function setSkipLinkText(null|string $skipLinkText): static
    {
        $this->fields['skipLinkText'] = $skipLinkText;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('instructionsText', $this->fields)) {
            $data['instructionsText'] = $this->fields['instructionsText'];
        }
        if (array_key_exists('buttonText', $this->fields)) {
            $data['buttonText'] = $this->fields['buttonText'];
        }
        if (array_key_exists('skipLinkText', $this->fields)) {
            $data['skipLinkText'] = $this->fields['skipLinkText'];
        }

        return parent::jsonSerialize() + $data;
    }
}
