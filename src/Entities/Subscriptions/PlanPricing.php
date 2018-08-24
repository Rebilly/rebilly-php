<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities\Subscriptions;

use DomainException;
use Rebilly\Rest\Resource;

abstract class PlanPricing extends Resource
{
    const UNSUPPORTED_FORMULA = 'Unexpected formula. Only %s methods are supported';
    const REQUIRED_FORMULA = 'Formula is required';

    const FLAT_RATE = 'flat-rate';
    const FIXED_FEE = 'fixed-fee';
    const STAIRSTEP = 'stairstep';
    const TIERED = 'tiered';
    const VOLUME = 'volume';

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
