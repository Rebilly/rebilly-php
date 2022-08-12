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

abstract class PlanPriceFormula implements JsonSerializable
{
    public const FORMULA_FIXED_FEE = 'fixed-fee';

    public const FORMULA_FLAT_RATE = 'flat-rate';

    public const FORMULA_STAIRSTEP = 'stairstep';

    public const FORMULA_TIERED = 'tiered';

    public const FORMULA_VOLUME = 'volume';

    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('formula', $data)) {
            $this->setFormula($data['formula']);
        }
    }

    public static function from(array $data = []): self
    {
        switch ($data['formula']) {
            case 'fixed-fee':
                return new FixedFee($data);
            case 'flat-rate':
                return new FlatRate($data);
            case 'stairstep':
                return new Stairstep($data);
            case 'tiered':
                return new Tiered($data);
            case 'volume':
                return new Volume($data);
        }

        throw new InvalidArgumentException("Unsupported formula value: '{$data['formula']}'");
    }

    /**
     * @psalm-return self::FORMULA_* $formula
     */
    public function getFormula(): string
    {
        return $this->fields['formula'];
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('formula', $this->fields)) {
            $data['formula'] = $this->fields['formula'];
        }

        return $data;
    }

    /**
     * @psalm-param self::FORMULA_* $formula
     */
    private function setFormula(string $formula): self
    {
        $this->fields['formula'] = $formula;

        return $this;
    }
}
