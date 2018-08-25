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

namespace Rebilly\Entities\Subscriptions;

use DomainException;
use Rebilly\Rest\Resource;

abstract class PlanPricing extends Resource
{
    public const UNSUPPORTED_FORMULA = 'Unexpected formula. Only %s methods are supported';

    public const REQUIRED_FORMULA = 'Formula is required';

    public const FLAT_RATE = 'flat-rate';

    public const FIXED_FEE = 'fixed-fee';

    public const STAIRSTEP = 'stairstep';

    public const TIERED = 'tiered';

    public const VOLUME = 'volume';

    public function __construct(array $data = [])
    {
        parent::__construct(['formula' => $this->formula()] + $data);
    }

    public static function getAvailableFormulas()
    {
        return [
            self::FLAT_RATE,
            self::FIXED_FEE,
            self::STAIRSTEP,
            self::TIERED,
            self::VOLUME,
        ];
    }

    /**
     * @param array $data
     *
     * @return Pricing\FlatRate|Pricing\FixedFee|Pricing\Stairstep|Pricing\Tiered|Pricing\Volume
     */
    public static function createFromData(array $data)
    {
        if (!isset($data['formula'])) {
            throw new DomainException(self::REQUIRED_FORMULA);
        }

        switch ($data['formula']) {
            case self::FLAT_RATE:
                return new Pricing\FlatRate($data);
            case self::FIXED_FEE:
                return new Pricing\FixedFee($data);
            case self::STAIRSTEP:
                return new Pricing\Stairstep($data);
            case self::TIERED:
                return new Pricing\Tiered($data);
            case self::VOLUME:
                return new Pricing\Volume($data);
            default:
                throw new DomainException(sprintf(self::UNSUPPORTED_FORMULA, implode(',', self::getAvailableFormulas())));
        }
    }

    public function getFormula()
    {
        return $this->getAttribute('formula');
    }

    abstract protected function formula();
}
