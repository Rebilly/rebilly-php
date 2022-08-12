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

class Unrestricted implements JsonSerializable
{
    public const MODE_UNKNOWN = 'unknown';

    public const MODE_ALL = 'all';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('mode', $data)) {
            $this->setMode($data['mode']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @psalm-return self::MODE_*|null $mode
     */
    public function getMode(): ?string
    {
        return $this->fields['mode'] ?? null;
    }

    /**
     * @psalm-param self::MODE_*|null $mode
     */
    public function setMode(null|string $mode): self
    {
        $this->fields['mode'] = $mode;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('mode', $this->fields)) {
            $data['mode'] = $this->fields['mode'];
        }

        return $data;
    }
}
