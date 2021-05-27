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
use Rebilly\Entities\Blocklist;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class BlocklistService
 *
 */
final class BlocklistService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return Blocklist[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'blocklists', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return Blocklist[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('blocklists', $params);
    }

    /**
     * @param string $blocklistId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does not exist
     *
     * @return Blocklist
     */
    public function load($blocklistId, $params = [])
    {
        return $this->client()->get('blocklists/{blocklistId}', ['blocklistId' => $blocklistId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|Blocklist $data
     * @param string $blocklistId
     *
     * @throws DataValidationException The input data does not valid
     *
     * @return Blocklist
     */
    public function create($data, $blocklistId = null)
    {
        if (isset($blocklistId)) {
            return $this->client()->put($data, 'blocklists/{blocklistId}', ['blocklistId' => $blocklistId]);
        }

        return $this->client()->post($data, 'blocklists');
    }

    /**
     * @param string $blocklistId
     */
    public function delete($blocklistId)
    {
        $this->client()->delete('blocklists/{blocklistId}', ['blocklistId' => $blocklistId]);
    }
}
