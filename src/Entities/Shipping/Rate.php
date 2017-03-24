<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2016 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities\Shipping;

use DomainException;
use Rebilly\Rest\Resource;

/**
 * Class Rate.
 */
class Rate extends Resource
{
    /*
     * @var string
     */
    private $name;

    /*
     * @var float
     */
    private $minOrderSubtotal;

    /*
     * @var float
     */
    private $maxOrderSubtotal;

    /*
     * @var float
     */
    private $price;

    /*
     * @var string
     */
    private $currency;

    const MSG_REQUIRED_NAME = 'Name can not be blank.';
    const MSG_REQUIRED_PRICE = 'Price can not be blank.';
    const MSG_REQUIRED_CURRENCY = 'Currency can not be blank.';

    /**
     * {@inheritdoc}
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);
    }

    /**
     * @param array $data
     *
     * @return Rate
     */
    public static function createFromData(array $data)
    {
        if (!isset($data['name'])) {
            throw new DomainException(self::MSG_REQUIRED_NAME);
        }

        if (!isset($data['price'])) {
            throw new DomainException(self::MSG_REQUIRED_NAME);
        }

        if (!isset($data['currency'])) {
            throw new DomainException(self::MSG_REQUIRED_CURRENCY);
        }

        $rate = new Rate($data);

        return $rate;
    }

    /**
     * @return float
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getMinOrderSubtotal()
    {
        return $this->minOrderSubtotal;
    }

    /**
     * @param float $minOrderSubtotal
     */
    public function setMinOrderSubtotal($minOrderSubtotal)
    {
        $this->minOrderSubtotal = $minOrderSubtotal;
    }

    /**
     * @return float
     */
    public function getMaxOrderSubtotal()
    {
        return $this->maxOrderSubtotal;
    }

    /**
     * @param float $maxOrderSubtotal
     */
    public function setMaxOrderSubtotal($maxOrderSubtotal)
    {
        $this->maxOrderSubtotal = $maxOrderSubtotal;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }
}
