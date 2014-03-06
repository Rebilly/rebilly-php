<?php

/**
 * Class RebillyCustomField
 *
 * Usage:
 * <pre>
 * $customField = [
 *     new RebillyCustomField([
 *         'label' => 'customFieldABC',
 *         'value' => 'customFieldABC'
 *     ]),
 *     new RebillyCustomField([
 *         'label' => 'customFieldABC',
 *         'value' => 'customFieldABC'
 *     ])
 * ];
 * </pre>
 * Available attributes:
 * @property string $label
 * @property string $value
 *
 */
class RebillyCustomField extends RebillyRequest
{
    /**
     * @var string $label custom field's label max length of 35
     */
    public $label;
    /**
     * @var string $value custom field's value max length of 140
     */
    public $value;

    /**
     * @param array $attributes label and value pair
     */
    public function __construct($attributes)
    {
        if (is_array($attributes)) {
            foreach ($attributes as $attribute => $value) {
                $this->$attribute = $value;
            }
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
