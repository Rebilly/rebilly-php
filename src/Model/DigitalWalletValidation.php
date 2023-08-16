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

use InvalidArgumentException;
use JsonSerializable;

abstract class DigitalWalletValidation implements JsonSerializable
{
    public const TYPE_APPLE_PAY = 'Apple Pay';

    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
    }

    public static function from(array $data = []): self
    {
        switch ($data['type']) {
            case 'Apple Pay':
                return new ApplePayValidation($data);
        }

        throw new InvalidArgumentException("Unsupported type value: '{$data['type']}'");
    }

    /**
     * @psalm-return self::TYPE_* $type
     */
    public function getType(): string
    {
        return $this->fields['type'];
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }

        return $data;
    }

    /**
     * @psalm-param self::TYPE_* $type
     */
    private function setType(string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }
}
