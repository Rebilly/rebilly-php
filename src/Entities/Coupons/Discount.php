<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2016 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities\Coupons;

use DomainException;
use Rebilly\Rest\Resource;

/**
 * Class Discount.
 */
abstract class Discount extends Resource
{
    const MSG_UNSUPPORTED_TYPE = 'Unexpected type. Only %s types support';
    const MSG_REQUIRED_TYPE = 'Type is required';

    const TYPE_FIXED = 'fixed';
    const TYPE_PERCENT = 'percent';

    private static $supportedTypes = [
        self::TYPE_FIXED,
        self::TYPE_PERCENT,
    ];

    /**
     * {@inheritdoc}
     */
    public function __construct(array $data = [])
    {
        parent::__construct(['type' => $this->discountType()] + $data);
    }

    /**
     * @param array $data
     *
     * @return Discount
     */
    public static function createFromData(array $data)
    {
        if (!isset($data['type'])) {
            throw new DomainException(self::MSG_REQUIRED_TYPE);
        }

        switch ($data['type']) {
            case self::TYPE_FIXED:
                $discount = new Discounts\Fixed($data);
                break;
            case self::TYPE_PERCENT:
                $discount = new Discounts\Percent($data);
                break;
            default:
                throw new DomainException(
                    sprintf(self::MSG_UNSUPPORTED_TYPE, implode(',', self::$supportedTypes))
                );
        }

        return $discount;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->getAttribute('type');
    }

    /**
     * @return string
     */
    abstract protected function discountType();
}
