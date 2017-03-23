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
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getMinOrderSubtotal()
    {
        return $this->minOrderSubtotal;
    }

    /**
     * @param mixed $minOrderSubtotal
     */
    public function setMinOrderSubtotal($minOrderSubtotal)
    {
        $this->minOrderSubtotal = $minOrderSubtotal;
    }

    /**
     * @return mixed
     */
    public function getMaxOrderSubtotal()
    {
        return $this->maxOrderSubtotal;
    }

    /**
     * @param mixed $maxOrderSubtotal
     */
    public function setMaxOrderSubtotal($maxOrderSubtotal)
    {
        $this->maxOrderSubtotal = $maxOrderSubtotal;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }
}
