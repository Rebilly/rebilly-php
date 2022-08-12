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

abstract class InvoiceTax implements JsonSerializable
{
    public const CALCULATOR_MANUAL = 'manual';

    public const CALCULATOR_REBILLY_TAXJAR = 'rebilly-taxjar';

    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('calculator', $data)) {
            $this->setCalculator($data['calculator']);
        }
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
    }

    public static function from(array $data = []): self
    {
        switch ($data['calculator']) {
            case 'manual':
                return new Manual($data);
            case 'rebilly-taxjar':
                return new RebillyTaxjar($data);
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

    public function getAmount(): ?int
    {
        return $this->fields['amount'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('calculator', $this->fields)) {
            $data['calculator'] = $this->fields['calculator'];
        }
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }

        return $data;
    }

    /**
     * @psalm-param self::CALCULATOR_* $calculator
     */
    private function setCalculator(string $calculator): self
    {
        $this->fields['calculator'] = $calculator;

        return $this;
    }

    private function setAmount(null|int $amount): self
    {
        $this->fields['amount'] = $amount;

        return $this;
    }
}
