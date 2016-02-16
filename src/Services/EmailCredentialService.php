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
use Rebilly\Entities\EmailCredential;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class EmailCredentialService
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class EmailCredentialService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return EmailCredential[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'email-credentials', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return EmailCredential[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('email-credentials', $params);
    }

    /**
     * @param string $credentialId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return EmailCredential
     */
    public function load($credentialId, $params = [])
    {
        return $this->client()->get('email-credentials/{credentialId}', ['credentialId' => $credentialId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|EmailCredential $data
     * @param string $credentialId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return EmailCredential
     */
    public function create($data, $credentialId = null)
    {
        if (isset($credentialId)) {
            return $this->client()->put($data, 'email-credentials/{credentialId}', ['credentialId' => $credentialId]);
        } else {
            return $this->client()->post($data, 'email-credentials');
        }
    }

    /**
     * @param string $credentialId
     * @param array|JsonSerializable|EmailCredential $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return EmailCredential
     */
    public function update($credentialId, $data)
    {
        return $this->client()->put($data, 'email-credentials/{credentialId}', ['credentialId' => $credentialId]);
    }

    /**
     * @param string $credentialId
     */
    public function delete($credentialId)
    {
        $this->client()->delete('email-credentials/{credentialId}', ['credentialId' => $credentialId]);
    }
}
