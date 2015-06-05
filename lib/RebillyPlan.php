<?php
/**
 * Class RebillyPlan
 *
 * Available attributes:
 * @property boolean $isActive
 * @property string $name
 * @property string $currency
 * @property string $description
 * @property float $recurringAmount
 * @property string $recurringPeriodUnit
 * @property integer $recurringPeriodLength
 * @property float $trialAmount
 * @property string $trialPeriodUnit
 * @property integer $trialPeriodLength
 * @property float $setupAmount
 * @property string $expireTime
 * @property string $contractTermUnit
 * @property integer $contractTermLength
 * @property integer $recurringPeriodLimit
 */

class RebillyPlan extends RebillyRequest
{
    /**
     * Plan API's URL endpoint
     */
    const PLAN_URL = 'plans/';
    /**
     * @var boolean $isActive
     */
    public $isActive;
    /**
     * @var string $name
     */
    public $name;
    /**
     * @var string $currency
     */
    public $currency;
    /**
     * @var string $description
     */
    public $description;
    /**
     * @var float $recurringAmount
     */
    public $recurringAmount;
    /**
     * @var string $recurringPeriodUnit
     */
    public $recurringPeriodUnit;
    /**
     * @var int $recurringPeriodLength
     */
    public $recurringPeriodLength;
    /**
     * @var float $trialAmount
     */
    public $trialAmount;
    /**
     * @var string $trialPeriodUnit
     */
    public $trialPeriodUnit;
    /**
     * @var int $trialPeriodLength
     */
    public $trialPeriodLength;
    /**
     * @var float $setupAmount
     */
    public $setupAmount;
    /**
     * @var string $expireTime
     */
    public $expireTime;
    /**
     * @var string $contractTermUnit
     */
    public $contractTermUnit;
    /**
     * @var int $contractTermLength
     */
    public $contractTermLength;
    /**
     * @var int $contractTermLength
     */
    public $recurringPeriodLimit;

    private $id;

    public function __construct($id = null)
    {
        if ($id !== null) {
            $this->id = $id;
        }
        $this->setApiController(self::PLAN_URL);
    }

    /**
     * Send Post request to create new plan
     * @return mixed RebillyResponse
     */
    public function create()
    {
        $data = $this->buildRequest($this);

        return $this->sendPostRequest($data, get_class());
    }

    /**
     * Send Put request to update a plan
     * @return mixed RebillyResponse
     */
    public function update()
    {
        $this->setApiController(self::PLAN_URL . $this->id);
        $data = $this->buildRequest($this);

        return $this->sendPutRequest($data, get_class());
    }

    /**
     * Send Delete request to delete a plan
     * @return mixed RebillyResponse
     */
    public function delete()
    {
        $this->setApiController(self::PLAN_URL . $this->id);
        $data = $this->buildRequest($this);

        return $this->sendDeleteRequest($data, get_class());
    }

    /**
     * Send Get request to retrieve a plan
     * @return mixed RebillyResponse
     */
    public function retrieve()
    {
        $this->setApiController(self::PLAN_URL . $this->id);

        return $this->sendGetRequest();
    }
    /**
     * Send Get request to list all plans
     * @return mixed RebillyResponse
     */
    public function listAll()
    {
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
