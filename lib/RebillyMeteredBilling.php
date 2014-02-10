<?php

/**
 * Class RebillyMeteredBilling
 */
class RebillyMeteredBilling extends RebillyRequest
{
    /**
     * MeteredBilling type
     */
    const TYPE_DEBIT = 'debit';
    const TYPE_CREDIT = 'credit';

    /**
     * @var string $itemId the id assigned to the item by the Merchant
     */
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
    public function __construct($attributes = null)
    {
        if (is_array($attributes)) {
            foreach ($attributes as $attribute => $value) {
                $this->$attribute = $value;
            }
        } elseif (is_string($attributes)) {
            $this->itemId = $attributes;
        }
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
