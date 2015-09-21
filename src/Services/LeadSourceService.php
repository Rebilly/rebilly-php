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
use Rebilly\Entities\LeadSource;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class LeadSourceService
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class LeadSourceService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return LeadSource[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'lead-sources', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return LeadSource[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('lead-sources', $params);
    }

    /**
     * @param string $leadSourceId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return LeadSource
     */
    public function load($leadSourceId, $params = [])
    {
        return $this->client()->get('lead-sources/{leadSourceId}', ['leadSourceId' => $leadSourceId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|LeadSource $data
     * @param string $leadSourceId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return LeadSource
     */
    public function create($data, $leadSourceId = null)
    {
        if (isset($leadSourceId)) {
            return $this->client()->put($data, 'lead-sources/{leadSourceId}', ['leadSourceId' => $leadSourceId]);
        } else {
            return $this->client()->post($data, 'lead-sources');
        }
    }
}
