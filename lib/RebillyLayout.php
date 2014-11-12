<?php

/**
 * Class RebillyLayout
 *
 * Available attributes:
 * @property string $name
 * @property array $items
 *
 */
class RebillyLayout extends RebillyRequest
{
    const LAYOUT_URL = 'layouts/';
    const ITEM_URL = '/items/';
    /**
     * @var string $name
     */
    public $name;
    /**
     * @var array $items
     */
    public $items;

    private $id;

    public function __construct($id = null)
    {
        if ($id !== null) {
            $this->id = $id;
        }
        $this->setApiController(self::LAYOUT_URL);
    }

    /**
     * Send Post request to create a new layout
     * @return mixed RebillyResponse
     */
    public function create()
    {
        $data = isset($this->name) ? $this->name : null;

        return $this->sendPostRequest($data, get_class());
    }

    /**
     * Send Put request to update a layout
     * @return mixed RebillyResponse
     */
    public function update()
    {
        $this->setApiController(self::LAYOUT_URL . $this->id);
        $data['name'] = isset($this->name) ? $this->name : null;

        return $this->sendPutRequest(json_encode($data), get_class());
    }

    /**
     * Send Put request to update a layoutItem
     * @return mixed RebillyResponse
     */
    public function updateItems()
    {
        $this->setApiController(self::LAYOUT_URL . $this->id . self::ITEM_URL);
        $data = isset($this->items) ? json_encode($this->items) : null;
        return $this->sendPutRequest($data, get_class());
    }

    /**
     * Send delete request to delete all items in the layout
     * @return mixed RebillyResponse
     */
    public function deleteItems()
    {
        $this->setApiController(self::LAYOUT_URL . $this->id . self::ITEM_URL);

        return $this->sendDeleteRequest(null);
    }

    /**
     * Retrieve a Layout
     * @return mixed RebillyResponse
     */
    public function retrieve()
    {
        $this->setApiController(self::LAYOUT_URL . $this->id);

        return $this->sendGetRequest();
    }

    /**
     * Retrieve an item by order
     * @param integer $order
     * @return mixed RebillyResponse
     */
    public function retrieveItem($order)
    {
        $this->setApiController(self::LAYOUT_URL . $this->id . self::ITEM_URL . intval($order));

        return $this->sendGetRequest();
    }

    /**
     * Retrieve all items for a Layout
     * @return mixed RebillyResponse
     */
    public function retrieveItems()
    {
        $this->setApiController(self::LAYOUT_URL . $this->id . self::ITEM_URL);

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
