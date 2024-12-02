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

class IlixiumSettings implements JsonSerializable
{
    public const PLATFORM_ITIX = 'itix';

    public const PLATFORM_TPG = 'tpg';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('useIpFrame', $data)) {
            $this->setUseIpFrame($data['useIpFrame']);
        }
        if (array_key_exists('useCreditEndpoint', $data)) {
            $this->setUseCreditEndpoint($data['useCreditEndpoint']);
        }
        if (array_key_exists('useStandaloneCreditEndpoint', $data)) {
            $this->setUseStandaloneCreditEndpoint($data['useStandaloneCreditEndpoint']);
        }
        if (array_key_exists('platform', $data)) {
            $this->setPlatform($data['platform']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getUseIpFrame(): ?bool
    {
        return $this->fields['useIpFrame'] ?? null;
    }

    public function setUseIpFrame(null|bool $useIpFrame): static
    {
        $this->fields['useIpFrame'] = $useIpFrame;

        return $this;
    }

    public function getUseCreditEndpoint(): ?bool
    {
        return $this->fields['useCreditEndpoint'] ?? null;
    }

    public function setUseCreditEndpoint(null|bool $useCreditEndpoint): static
    {
        $this->fields['useCreditEndpoint'] = $useCreditEndpoint;

        return $this;
    }

    public function getUseStandaloneCreditEndpoint(): ?bool
    {
        return $this->fields['useStandaloneCreditEndpoint'] ?? null;
    }

    public function setUseStandaloneCreditEndpoint(null|bool $useStandaloneCreditEndpoint): static
    {
        $this->fields['useStandaloneCreditEndpoint'] = $useStandaloneCreditEndpoint;

        return $this;
    }

    public function getPlatform(): ?string
    {
        return $this->fields['platform'] ?? null;
    }

    public function setPlatform(null|string $platform): static
    {
        $this->fields['platform'] = $platform;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('useIpFrame', $this->fields)) {
            $data['useIpFrame'] = $this->fields['useIpFrame'];
        }
        if (array_key_exists('useCreditEndpoint', $this->fields)) {
            $data['useCreditEndpoint'] = $this->fields['useCreditEndpoint'];
        }
        if (array_key_exists('useStandaloneCreditEndpoint', $this->fields)) {
            $data['useStandaloneCreditEndpoint'] = $this->fields['useStandaloneCreditEndpoint'];
        }
        if (array_key_exists('platform', $this->fields)) {
            $data['platform'] = $this->fields['platform'];
        }

        return $data;
    }
}
