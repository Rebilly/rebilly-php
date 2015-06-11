<?php

namespace Rebilly\examples;

use Exception;
use HttpException;
use Rebilly\v2_1\Plan;
use RebillyHttpStatusCode;
use RebillyRequest;

/**
 * This is an example on how to copy the "SANDBOX" plans to "LIVE" account.
 *
 * ### Usage:
 * ```php
 * $class = new CopyPlansExample('LIVE_API_KEY', 'SANDBOX_API_KEY');
 * $class->copyPlans(100, 0);
 * ```
 */
final class CopyPlansExample
{
    /**
     * @var string Live API key
     */
    private $liveAPIKey;
    /**
     * @var string Sandbox API key
     */
    private $sandboxAPIKey;

    /**
     * @param string $liveAPIKey Live API key
     * @param string $sandboxAPIKey Sandbox API key
     */
    public function __construct($liveAPIKey, $sandboxAPIKey)
    {
        $this->liveAPIKey = $liveAPIKey;
        $this->sandboxAPIKey = $sandboxAPIKey;
    }

    /**
     * Copy the plans from sandbox account to live one.
     *
     * @param int $limit Limit
     * @param int $offset Offset
     *
     * @throws HttpException
     */
    public function copyPlans($limit = 50, $offset = 0)
    {
        $plans = $this->getSandboxPlans($limit, $offset);

        if (!empty($plans)) {
            foreach ($plans as $plan) {
                $this->saveLivePlan($plan);
            }
            $this->copyPlans($limit, $offset + $limit);
        }
    }

    /**
     * Get sandbox plans list.
     *
     * @param int $limit Limit
     * @param int $offset Offset
     *
     * @return array The plan list.
     *
     * @throws HttpException
     */
    public function getSandboxPlans($limit = 50, $offset = 0)
    {
        $plan = new Plan();
        $plan->setApiKey($this->sandboxAPIKey);
        $plan->setEnvironment(RebillyRequest::ENV_SANDBOX);
        $plan->setQueryParam(['limit' => $limit, 'offset' => $offset]);

        $response = $plan->listAll();

        if ($response->statusCode === RebillyHttpStatusCode::STATUS_OK) {
            return $response->getRawResponse();
        } else {
            $exception = $response->getRawResponse();
            throw new HttpException($exception->error, $exception->status);
        }
    }

    /**
     * Save live plan.
     *
     * @param object $data The plan data
     *
     * @throws HttpException
     */
    public function saveLivePlan($data)
    {
        $plan = new Plan($data->id);
        $plan->setApiKey($this->liveAPIKey);
        $plan->setEnvironment(RebillyRequest::ENV_LIVE);
        unset($data->id);

        foreach ($data as $attribute => $value) {
            $plan->{$attribute} = $value;
        }

        $response = $plan->update();

        if (!in_array($response->statusCode, [RebillyHttpStatusCode::STATUS_OK, RebillyHttpStatusCode::STATUS_CREATED])) {
            $exception = $response->getRawResponse();
            throw new HttpException($exception->error, $exception->status);
        }
    }
}
