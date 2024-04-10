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

class AmlSettingsPrioritySanctions implements JsonSerializable
{
    public const VERY_STRONG_P0 = 'p0';

    public const VERY_STRONG_P1 = 'p1';

    public const VERY_STRONG_P2 = 'p2';

    public const VERY_STRONG_P3 = 'p3';

    public const STRONG_P0 = 'p0';

    public const STRONG_P1 = 'p1';

    public const STRONG_P2 = 'p2';

    public const STRONG_P3 = 'p3';

    public const MEDIUM_P0 = 'p0';

    public const MEDIUM_P1 = 'p1';

    public const MEDIUM_P2 = 'p2';

    public const MEDIUM_P3 = 'p3';

    public const WEAK_P0 = 'p0';

    public const WEAK_P1 = 'p1';

    public const WEAK_P2 = 'p2';

    public const WEAK_P3 = 'p3';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('veryStrong', $data)) {
            $this->setVeryStrong($data['veryStrong']);
        }
        if (array_key_exists('strong', $data)) {
            $this->setStrong($data['strong']);
        }
        if (array_key_exists('medium', $data)) {
            $this->setMedium($data['medium']);
        }
        if (array_key_exists('weak', $data)) {
            $this->setWeak($data['weak']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getVeryStrong(): ?string
    {
        return $this->fields['veryStrong'] ?? null;
    }

    public function setVeryStrong(null|string $veryStrong): static
    {
        $this->fields['veryStrong'] = $veryStrong;

        return $this;
    }

    public function getStrong(): ?string
    {
        return $this->fields['strong'] ?? null;
    }

    public function setStrong(null|string $strong): static
    {
        $this->fields['strong'] = $strong;

        return $this;
    }

    public function getMedium(): ?string
    {
        return $this->fields['medium'] ?? null;
    }

    public function setMedium(null|string $medium): static
    {
        $this->fields['medium'] = $medium;

        return $this;
    }

    public function getWeak(): ?string
    {
        return $this->fields['weak'] ?? null;
    }

    public function setWeak(null|string $weak): static
    {
        $this->fields['weak'] = $weak;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('veryStrong', $this->fields)) {
            $data['veryStrong'] = $this->fields['veryStrong'];
        }
        if (array_key_exists('strong', $this->fields)) {
            $data['strong'] = $this->fields['strong'];
        }
        if (array_key_exists('medium', $this->fields)) {
            $data['medium'] = $this->fields['medium'];
        }
        if (array_key_exists('weak', $this->fields)) {
            $data['weak'] = $this->fields['weak'];
        }

        return $data;
    }
}
