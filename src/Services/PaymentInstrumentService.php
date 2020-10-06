<?php
/**
 * This source file is proprietary and part of Rebilly.
 *
 * (c) Rebilly SRL
 *     Rebilly Ltd.
 *     Rebilly Inc.
 *
 * @see https://www.rebilly.com
 */

namespace Rebilly\Services;

use ArrayObject;
use JsonSerializable;
use Rebilly\Entities\CommonPaymentInstrument;
use Rebilly\Entities\PaymentToken;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class PaymentInstrumentService.
 */
final class PaymentInstrumentService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return CommonPaymentInstrument[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'payment-instruments', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return CommonPaymentInstrument[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('payment-instruments', $params);
    }

    /**
     * @param string $paymentInstrumentId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does not exist
     *
     * @return CommonPaymentInstrument
     */
    public function load($paymentInstrumentId, $params = [])
    {
        return $this->client()->get('payment-instruments/{paymentInstrumentId}', ['paymentInstrumentId' => $paymentInstrumentId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|CommonPaymentInstrument $data
     * @param string $cardId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return CommonPaymentInstrument
     */
    public function create($data)
    {
        return $this->client()->post($data, 'payment-instruments');
    }

    /**
     * @param string|array|JsonSerializable|PaymentToken $token
     * @param array|JsonSerializable|CommonPaymentInstrument $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return CommonPaymentInstrument
     */
    public function createFromToken($token, $data)
    {
        if ($data instanceof JsonSerializable) {
            $data = $data->jsonSerialize();
        }

        if (is_string($token)) {
            $data['token'] = $token;
        } else {
            $data['token'] = $token['token'];
        }

        return $this->create($data);
    }

    /**
     * @param string $paymentInstrumentId
     * @param array|JsonSerializable|CommonPaymentInstrument $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return CommonPaymentInstrument
     */
    public function update($paymentInstrumentId, $data)
    {
        return $this->client()->patch($data, 'payment-instruments/{paymentInstrumentId}', ['paymentInstrumentId' => $paymentInstrumentId]);
    }

    /**
     * @param string $paymentInstrumentId
     *
     * @return CommonPaymentInstrument
     */
    public function deactivate($paymentInstrumentId)
    {
        return $this->client()->post([], 'payment-instruments/{paymentInstrumentId}/deactivation', ['paymentInstrumentId' => $paymentInstrumentId]);
    }
}
