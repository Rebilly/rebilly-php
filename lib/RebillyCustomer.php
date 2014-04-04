<?php
/**
 * Class RebillyCustomer Holds all the variables and methods to create/update
 *  - Customer
 *  - PaymentCard
 *  - Charge
 *  - Subscription
 *
 * Usage: Example to create a customer
 * <pre>
 *     // Please checkout our documentation for more examples
 *     $customer = new RebillyCustomer();
 *     $customer->setEnvironment(RebillyRequest::ENV_SANDBOX);
 *     $customer->setApiKey('apiKey');
 *     $customer->customerId = 'cust123';
 *     $customer->email = 'email@email.com';
 *     $customer->firstName = 'John';
 *     $customer->lastName = 'Doe';
 *     $customer->ipAddress = '192.168.1.1';
 *
 *     $response = $customer->create();
 *     $rawResponse = $response->getRawResponse();
 *
 *     if ($rawResponse->action === RebillyResponse::CUSTOMER_CREATE && $rawResponse->status === RebillyResponse::STATUS_SUCCESS) {
 *         // Successfully created customer
 *     }
 * </pre>
 *
 * Available attributes:
 * @var string $customerId
 * @var string $lookupCustomerId
 * @var string $email
 * @var string $firstName
 * @var string $lastName
 * @var string $ipAddress
 * @var RebillyPaymentCard $paymentCard
 * @var RebillySubscription $subscription
 * @var RebillySubscription $subscription
 */

class RebillyCustomer extends RebillyRequest
{
    /**
     * Customer's URL endpoint
     */
    const CUSTOMER_URL = 'customers/';

    /**
     * @var string $customerId unique id for each customer use for creating new customer
     */
    public $customerId;
    /**
     * @var string $lookupCustomerId unique id for each customer use for updating existing customer
     */
    public $lookupCustomerId;
    /**
     * @var string $email customer's email
     */
    public $email;
    /**
     * @var string $firstName customer's first name
     */
    public $firstName;
    /**
     * @var string $lastName customer's last name
     */
    public $lastName;
    /**
     * @var string $ipAddress customer's IP address
     */
    public $ipAddress;
    /**
     * @var RebillyPaymentCard $paymentCard payment card attach to a customer
     */
    public $paymentCard;
    /**
     * @var RebillySubscription $subscription subscription attach to a customer
     */
    public $subscription;
    /**
     * @var RebillySubscription $subscription subscription attach to a customer use when switch subscription
     */
    public $newSubscription;

    /**
     * Set lookupCustomerId when $id is passed
     * @param null $id
     */
    public function __construct($id = null)
    {
        if ($id) {
            $this->lookupCustomerId = $id;
        }
        $this->setApiController(self::CUSTOMER_URL);
    }

    /**
     * Get customer information
     * @return RebillyResponse
     */
    public function retrieve()
    {
        $this->setApiController(self::CUSTOMER_URL . $this->lookupCustomerId);

        return $this->sendGetRequest();
    }

    /**
     * Get all subscriptions that belong to a customer
     * @return RebillyResponse
     */
    public function retrieveSubscriptions()
    {
        $this->setApiController(self::CUSTOMER_URL . $this->lookupCustomerId . '/subscriptions');

        return $this->sendGetRequest();
    }

    /**
     * Get all transactions that belong to a customer
     * @return RebillyResponse
     */
    public function retrieveTransactions()
    {
        $this->setApiController(self::CUSTOMER_URL . $this->lookupCustomerId . '/transactions');

        return $this->sendGetRequest();
    }

    /**
     * Send POST request to Rebilly
     * @return RebillyResponse response from Rebilly
     */
    public function create()
    {
        $data = $this->buildRequest($this);

        return $this->sendPostRequest($data, get_class());
    }

    /**
     * Send PUT request to Rebilly
     * @return RebillyResponse response from Rebilly
     */
    public function update()
    {
        $data = $this->buildRequest($this);

        return $this->sendPutRequest($data);
    }

    /**
     * Send PUT request to Rebilly
     * To switch a subscription
     * @return RebillyResponse response from Rebilly
     */
    public function switchPlan()
    {
        $data = $this->buildRequest($this);

        return $this->sendPutRequest($data);
    }

    /**
     * Send DELETE request to Rebilly
     * To cancel/revoke access
     * @return RebillyResponse response from Rebilly
     */
    public function stopSubscription()
    {
        $data = $this->buildRequest($this);

        return $this->sendDeleteRequest($data, get_class());
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
