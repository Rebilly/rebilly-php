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
use Rebilly\Entities\Log;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class LogService
 *
 * @author Maksim Tuzov <maksim.tuzov@rebilly.com>
 * @version 0.1
 */
final class LogService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return Log[]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'logs', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return Log[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('logs', $params);
    }

    /**
     * @param string $logId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return Log
     */
    public function load($logId, $params = [])
    {
        return $this->client()->get('logs/{logId}', ['logId' => $logId] + (array)$params);
    }
}
