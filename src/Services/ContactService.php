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
use Rebilly\Entities\Contact;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
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
     * @throws NotFoundException The payment does not exist
     *
     * @return Contact
     */
    public function load($contactId, $params = [])
    {
        return $this->client()->get('contacts/{contactId}', ['contactId' => $contactId] + (array) $params);
    }

    /**
     * @param array|ContactService $data
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
}
