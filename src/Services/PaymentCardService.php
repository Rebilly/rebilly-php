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
use Rebilly\Entities\PaymentCard;
use Rebilly\Entities\PaymentCardAuthorization;
use Rebilly\Entities\PaymentCardToken;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class PaymentCardService.
 */
final class PaymentCardService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return PaymentCard[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'payment-cards', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return PaymentCard[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('payment-cards', $params);
    }

    /**
     * @param string $cardId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does not exist
     *
     * @return PaymentCard
     */
    public function load($cardId, $params = [])
    {
        return $this->client()->get('payment-cards/{cardId}', ['cardId' => $cardId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|PaymentCard $data
     * @param string $cardId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return PaymentCard
     */
    public function create($data, $cardId = null)
    {
        if (isset($cardId)) {
            return $this->client()->put($data, 'payment-cards/{cardId}', ['cardId' => $cardId]);
        }

        return $this->client()->post($data, 'payment-cards');
    }

    /**
     * @param string|array|JsonSerializable|PaymentCardToken $token
     * @param array|JsonSerializable|PaymentCard $data
     * @param string $cardId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return PaymentCard
     */
    public function createFromToken($token, $data, $cardId = null)
    {
        if ($data instanceof JsonSerializable) {
            $data = $data->jsonSerialize();
        }

        if (is_string($token)) {
            $data['token'] = $token;
        } else {
            $data['token'] = $token['token'];
        }

        return $this->create($data, $cardId);
    }

    /**
     * @param string $cardId
     * @param array|JsonSerializable|PaymentCard $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return PaymentCard
     */
    public function update($cardId, $data)
    {
        return $this->client()->patch($data, 'payment-cards/{cardId}', ['cardId' => $cardId]);
    }

    /**
     * @param array|JsonSerializable|PaymentCardAuthorization $data
     * @param string $cardId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return PaymentCard
     */
    public function authorize($data, $cardId)
    {
        return $this->client()->post($data, 'payment-cards/{cardId}/authorization', ['cardId' => $cardId]);
    }

    /**
     * @param string $cardId
     *
     * @return PaymentCard
     */
    public function deactivate($cardId)
    {
        return $this->client()->post([], 'payment-cards/{cardId}/deactivation', ['cardId' => $cardId]);
    }
}
