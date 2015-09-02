<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Services;

use ArrayObject;
use JsonSerializable;
use Rebilly\Entities\PaymentCard;
use Rebilly\Entities\PaymentCardAuthorization;
use Rebilly\Entities\PaymentCardToken;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class PaymentCardService
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class PaymentCardService extends Service
{
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
     * @throws NotFoundException The resource data does exist
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
        } else {
            return $this->client()->post($data, 'payment-cards');
        }
    }

    /**
     * @param string|array|JsonSerializable|PaymentCardToken $data
     * @param string $cardId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return PaymentCard
     */
    public function createFromToken($data, $cardId = null)
    {
        if (is_string($data)) {
            $data = ['token' => $data];
        }

        if (isset($cardId)) {
            return $this->client()->put($data, 'payment-cards/{cardId}', ['cardId' => $cardId]);
        } else {
            return $this->client()->post($data, 'payment-cards');
        }
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
