<?php

namespace Rebilly\v2_1;

use RebillyRequest;
use RebillyResponse;
use RebillyHttpStatusCode;
use Exception;

/**
 * Class Payment.
 */
class Payment extends RebillyRequest
{
    const PAYMENT_END_POINT = 'payments/';
    const PAYMENT_QUEUE_END_POINT = 'queue/payments/';

    const METHOD_PAYMENT_CARD = 'payment_card';

    /** @var string */
    public $website;

    /** @var string */
    public $method = self::METHOD_PAYMENT_CARD;

    /** @var PaymentCardInstrument */
    public $paymentInstrument;

    /** @var float */
    public $amount;

    /** @var string */
    public $currency;

    /** @var string */
    public $description;

    /** @var string */
    private $id;

    /**
     * Create new payment.
     *
     * @param string|null $id
     */
    public function __construct($id = null)
    {
        $this->setApiController(self::PAYMENT_END_POINT);
        $this->setVersion(2.1);

        if ($id !== null) {
            $this->id = $id;
            $this->setApiController(self::PAYMENT_END_POINT . $id . '/');
        }
    }

    /**
     * @throws Exception
     */
    private function ensureIdentity()
    {
        if ($this->id === null) {
            throw new Exception('Payment ID cannot be empty');
        }
    }

    /**
     * Return all the property of this class.
     *
     * @internal
     *
     * @param object $class
     *
     * @return array
     */
    public function getPublicProperties($class)
    {
        $properties = get_object_vars($class);

        if (is_object($properties['paymentInstrument'])) {
            $properties['paymentInstrument'] = get_object_vars($properties['paymentInstrument']);
        }

        return $properties;
    }

    /**
     * Get a payment.
     *
     * @throws Exception
     *
     * @return RebillyResponse
     */
    public function retrieve()
    {
        $this->ensureIdentity();

        return $this->sendGetRequest();
    }

    /**
     * Get a payment.
     *
     * @throws Exception
     *
     * @return RebillyResponse
     */
    public function readQueue()
    {
        $this->ensureIdentity();
        $this->setApiController(self::PAYMENT_QUEUE_END_POINT . $this->id . '/');

        return $this->sendGetRequest();
    }

    /**
     * List all payment card.
     *
     * @return RebillyResponse
     */
    public function listAll()
    {
        return $this->sendGetRequest();
    }

    /**
     * Create new payment.
     *
     * @return RebillyResponse
     */
    public function create()
    {
        return $this->sendPostRequest($this->buildRequest($this));
    }

    /**
     * Update scheduled payment.
     *
     * @return RebillyResponse
     */
    public function update()
    {
        $this->ensureIdentity();
        $this->setApiController(self::PAYMENT_QUEUE_END_POINT . $this->id . '/');

        return $this->sendPutRequest($this->buildRequest($this));
    }

    /**
     * Check if the payment is scheduled in the queue.
     *
     * @return bool
     */
    public function isScheduled()
    {
        $this->ensureIdentity();
        $this->setApiController(self::PAYMENT_QUEUE_END_POINT . $this->id . '/');

        $response = $this->sendHeadRequest();

        return $response->statusCode === RebillyHttpStatusCode::STATUS_OK;
    }
}
