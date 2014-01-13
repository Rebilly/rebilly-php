<?php
/**
 * Class RebillyPlan
 *
 * Available attributes:
 * @property string $planId
 * @property string $lookupPlanId
 * @property string $name
 * @property string $currency
 * @property string $description
 * @property string $expireTime
 * @property decimal $setupAmount
 * @property decimal $recurringAmount
 * @property string $recurringIntervalUnit
 * @property integer $recurringIntervalLength
 * @property decimal $trialAmount
 * @property string $trialIntervalUnit
 * @property integer $trialIntervalLength
 * @property string $contractTerm
 * @property integer $contractRebill
 */

class RebillyPlan extends RebillyRequest
{
    /**
     * @var string $planId
     */
    public $planId;
    /**
     * @var string $lookupPlanId
     */
    public $lookupPlanId;
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
     * @var string $expireTime
     */
    public $expireTime;
    /**
     * @var number $setupAmount
     */
    public $setupAmount;
    /**
     * @var number $recurringAmount
     */
    public $recurringAmount;
    /**
     * @var string $recurringIntervalUnit
     */
    public $recurringIntervalUnit;
    /**
     * @var number $recurringIntervalLength
     */
    public $recurringIntervalLength;
    /**
     * @var number $trialAmount
     */
    public $trialAmount;
    /**
     * @var string $trialIntervalUnit
     */
    public $trialIntervalUnit;
    /**
     * @var number $trialIntervalLength
     */
    public $trialIntervalLength;
    /**
     * @var string $contractTerm (1 year, 2 months, 20 weeks, ...)
     */
    public $contractTerm;
    /**
     * @var number $contractRebill
     */
    public $contractRebill;

    const PLAN_URL = 'plans/';

    public function __construct($id = null)
    {
        if ($id !== null) {
            $this->lookupPlanId = $id;
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
     * Send Delete request to delete a plan
     * @return mixed RebillyResponse
     */
    public function delete()
    {
        $data = $this->buildRequest($this);

        return $this->sendDeleteRequest($data, get_class());
    }

    /**
     * Send Get request to retrieve a plan
     * @return mixed RebillyResponse
     */
    public function retrieve()
    {
        $this->setApiController(self::PLAN_URL . $this->lookupPlanId);

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
