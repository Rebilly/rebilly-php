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
use Rebilly\Entities\PaymentCardToken;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Resource\Collection;
use Rebilly\Resource\Service;

/**
 * Class PaymentCardTokenService
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class PaymentCardTokenService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return PaymentCardToken[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('tokens', $params);
    }

    /**
     * @param string $tokenId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return PaymentCardToken
     */
    public function load($tokenId, $params = [])
    {
        return $this->client()->get('tokens/{tokenId}', ['tokenId' => $tokenId] + (array) $params);
    }
}
