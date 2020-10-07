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
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class BankAccountService.
 */
final class BankAccountService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return CommonPaymentInstrument[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'bank-accounts', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return CommonPaymentInstrument[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('bank-accounts', $params);
    }

    /**
     * @param string $bankAccountId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does not exist
     *
     * @return CommonPaymentInstrument
     */
    public function load($bankAccountId, $params = [])
    {
        return $this->client()->get('bank-accounts/{bankAccountId}', ['bankAccountId' => $bankAccountId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|CommonPaymentInstrument $data
     * @param string $bankAccountId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return CommonPaymentInstrument
     */
    public function create($data, $bankAccountId = null)
    {
        if (isset($bankAccountId)) {
            return $this->client()->put($data, 'bank-accounts/{bankAccountId}', ['bankAccountId' => $bankAccountId]);
        }

        return $this->client()->post($data, 'bank-accounts');
    }

    /**
     * @param string|array|JsonSerializable $token
     * @param array|JsonSerializable|CommonPaymentInstrument $data
     * @param string $bankAccountId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return CommonPaymentInstrument
     */
    public function createFromToken($token, $data, $bankAccountId = null)
    {
        if ($data instanceof JsonSerializable) {
            $data = $data->jsonSerialize();
        }

        if (is_string($token)) {
            $data['token'] = $token;
        } else {
            $data['token'] = $token['token'];
        }

        return $this->create($data, $bankAccountId);
    }

    /**
     * @param string $bankAccountId
     * @param array|JsonSerializable|CommonPaymentInstrument $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return CommonPaymentInstrument
     */
    public function update($bankAccountId, $data)
    {
        return $this->client()->patch($data, 'bank-accounts/{bankAccountId}', ['bankAccountId' => $bankAccountId]);
    }

    /**
     * @param string $bankAccountId
     *
     * @return CommonPaymentInstrument
     */
    public function deactivate($bankAccountId)
    {
        return $this->client()->post([], 'bank-accounts/{bankAccountId}/deactivation', ['bankAccountId' => $bankAccountId]);
    }
}
