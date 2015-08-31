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
use Rebilly\Entities\Blacklist;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class BlacklistService
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class BlacklistService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return Blacklist[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('blacklists', $params);
    }

    /**
     * @param string $blacklistId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return Blacklist
     */
    public function load($blacklistId, $params = [])
    {
        return $this->client()->get('blacklists/{blacklistId}', ['blacklistId' => $blacklistId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|Blacklist $data
     * @param string $blacklistId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Blacklist
     */
    public function create($data, $blacklistId = null)
    {
        if (isset($blacklistId)) {
            return $this->client()->put($data, 'blacklists/{blacklistId}', ['blacklistId' => $blacklistId]);
        } else {
            return $this->client()->post($data, 'blacklists');
        }
    }

    /**
     * @param string $blacklistId
     */
    public function delete($blacklistId)
    {
        $this->client()->delete('blacklists/{blacklistId}', ['blacklistId' => $blacklistId]);
    }
}
