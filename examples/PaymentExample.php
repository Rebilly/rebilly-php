<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see http://rebilly.com
 */

namespace Rebilly\Test;

use Rebilly\v2_1\Payment;
use Rebilly\v2_1\PaymentCardInstrument;
use RebillyResponse;
use Rebilly\HttpClient\HttpClient;
use RebillyHttpStatusCode;

/**
 * Class PaymentExample.
 */
final class PaymentExample
{
    /** @var HttpClient */
    private $client;

    /**
     * Create demo controller.
     *
     * @param HttpClient $client
     */
    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Log message.
     *
     * @param string $message
     */
    private function log($message)
    {
        echo $message, PHP_EOL;
    }

    /**
     * Demonstration how to list payments.
     *
     * @return RebillyResponse
     */
    public function listPayments()
    {
        $payment = new Payment();
        $payment->setHttpClient($this->client);

        $response = $payment->listAll();

        if ($response->statusCode === RebillyHttpStatusCode::STATUS_OK) {
            $this->log('Load ' . count($response->getRawResponse()) . ' payments');
        }

        return $response;
    }

    /**
     * Demonstration how to load payment by ID.
     *
     * @param string $id
     *
     * @return RebillyResponse
     */
    public function loadPayment($id)
    {
        $payment = new Payment($id);
        $payment->setHttpClient($this->client);

        $response = $payment->retrieve();

        if ($response->statusCode === RebillyHttpStatusCode::ERROR_NOT_FOUND) {
            $this->log('Payment not found');
        } else {
            $data = $response->getRawResponse();
            $this->log('Payment "' . $data->id . '" was ' . $data->state);
        }

        return $response;
    }

    /**
     * Demonstration how to load scheduled payment by ID.
     *
     * @param string $id
     *
     * @return RebillyResponse
     */
    public function loadScheduledPayment($id)
    {
        $payment = new Payment($id);
        $payment->setHttpClient($this->client);

        $response = $payment->readQueue();

        if ($response->statusCode === RebillyHttpStatusCode::ERROR_NOT_FOUND) {
            $this->log('Payment not found');
        } elseif ($response->statusCode === RebillyHttpStatusCode::REDIRECT_SEE_OTHER) {
            $this->log('Payment was processed, you can retrieve');
        } else {
            $data = $response->getRawResponse();
            $this->log('Payment "' . $data->id . '" is ' . $data->state);
        }

        return $response;
    }

    /**
     * Demonstration how to check scheduled payment state.
     *
     * @param string $id
     *
     * @return bool
     */
    public function checkPaymentState($id)
    {
        $payment = new Payment($id);
        $payment->setHttpClient($this->client);

        if ($payment->isScheduled()) {
            $this->log('Payment is in the queue, be patient, it will be processed soon');
            return true;
        } else {
            $this->log('Payment was processed, you can retrieve');
            return false;
        }
    }

    /**
     * Demonstration how to create scheduled payment.
     *
     * @return RebillyResponse
     */
    public function createPayment()
    {
        $payment = new Payment();
        $payment->setHttpClient($this->client);

        $payment->website = 'my_website';
        $payment->paymentInstrument = new PaymentCardInstrument();
        $payment->paymentInstrument->paymentCard = 'my_payment_card';

        $response = $payment->create();

        if ($response->statusCode === RebillyHttpStatusCode::ERROR_UNPROCESSABLE_ENTITY) {
            $this->log('Cannot save payment. The payment data has errors');
        } elseif ($response->statusCode === RebillyHttpStatusCode::STATUS_ACCEPTED) {
            $data = $response->getRawResponse();
            $this->log('Payment "' . $data->id . '" was scheduled at ' . $data->createdTime);
        } else {
            $this->log('Something wrong. See response message for details');
        }

        return $response;
    }
}
