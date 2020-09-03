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
use Rebilly\Entities\Transaction;
use Rebilly\Http\Exception\ClientException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class PayoutService
 *
 */
final class PayoutService extends Service
{
    /**
     * @param array|JsonSerializable|Payout $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Payout
     */
    public function create($data)
    {
        return $this->client()->post(
            $data,
            'payouts'
        );
    }
}
