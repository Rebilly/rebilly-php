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

abstract class Shipping implements JsonSerializable
{
    public const CALCULATOR_MANUAL = 'manual';

    public const CALCULATOR_REBILLY = 'rebilly';

    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('calculator', $data)) {
            $this->setCalculator($data['calculator']);
        }
    }

    public static function from(array $data = []): self
    {
        switch ($data['calculator']) {
            case 'manual':
                return new ManualShipping($data);
            case 'rebilly':
                return new RebillyShipping($data);
        }

        throw new InvalidArgumentException("Unsupported calculator value: '{$data['calculator']}'");
    }

    /**
     * @psalm-return self::CALCULATOR_* $calculator
     */
    public function getCalculator(): string
    {
        return $this->fields['calculator'];
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('calculator', $this->fields)) {
            $data['calculator'] = $this->fields['calculator'];
        }

        return $data;
    }

    /**
     * @psalm-param self::CALCULATOR_* $calculator
     */
    private function setCalculator(string $calculator): static
    {
        $this->fields['calculator'] = $calculator;

        return $this;
    }
}
