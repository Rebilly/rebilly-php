<?php

/**
 * Class RebillyMeteredBilling
 */
class RebillyMeteredBilling extends RebillyRequest
{
    const URL = 'meteredBilling/';

    public $itemId;
    /**
     * @var string $type Can be 'DEBIT' or 'CREDIT'
     */
    public $type;
    /**
     * @var decimal $amount Amount
     */
    public $amount;
    /**
     * @var integer $quantity Quantity
     */
    public $quantity;
    /**
     * @var string $description Description
     */
    public $description;

    /**
     * @param mixed $attributes
     */
    public function __construct($attributes)
    {
        if (is_array($attributes)) {
            foreach ($attributes as $attribute => $value) {
                $this->$attribute = $value;
            }
        } else {
            $this->itemId = $attributes;
        }
    }

    public function retrieve()
    {
        $this->setApiController(self::URL . $this->itemId);

        return $this->sendGetRequest();
    }

    /**
     * Return all the property of this class
     * @param $class
     * @return array
     */
    public function getPublicProperties($class)
    {
        return get_object_vars($class);
    }
}
