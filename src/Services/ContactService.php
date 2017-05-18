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
use Rebilly\Entities\Contact;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class ContactService
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class ContactService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return Contact[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'contacts', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return Contact[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('contacts', $params);
    }

    /**
     * @param string $contactId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException
     *
     * @return Contact
     */
    public function load($contactId, $params = [])
    {
        return $this->client()->get('contacts/{contactId}', ['contactId' => $contactId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|Contact $data
     * @param string $contactId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Contact
     */
    public function create($data, $contactId = null)
    {
        if (isset($contactId)) {
            return $this->client()->put($data, 'contacts/{contactId}', ['contactId' => $contactId]);
        } else {
            return $this->client()->post($data, 'contacts');
        }
    }

    /**
     * @param string $contactId
     * @param array|JsonSerializable|Contact $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Contact
     */
    public function update($contactId, $data)
    {
        return $this->client()->put($data, 'contacts/{contactId}', ['contactId' => $contactId]);
    }

    /**
     * @param string $contactId
     *
     * @throws NotFoundException The contact does not exist
     */
    public function delete($contactId)
    {
        $this->client()->delete('contacts/{contactId}', ['contactId' => $contactId]);
    }
}
