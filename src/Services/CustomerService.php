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
use Rebilly\Entities\Customer;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Resource\Collection;
use Rebilly\Resource\Service;

/**
 * Class CustomerService
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class CustomerService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return Customer[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('customers', $params);
    }

    /**
     * @param string $customerId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The customer does not exist
     *
     * @return Customer
     */
    public function load($customerId, $params = [])
    {
        return $this->client()->get('customers/{customerId}', ['customerId' => $customerId] + (array) $params);
    }

    /**
     * @param array|Customer $data
     * @param string $customerId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Customer
     */
    public function create($data, $customerId = null)
    {
        if (isset($customerId)) {
            return $this->client()->put($data, 'customers/{customerId}', ['customerId' => $customerId]);
        } else {
            return $this->client()->post($data, 'customers');
        }
    }

    /**
     * @param string $customerId
     * @param array|Customer $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Customer
     */
    public function update($customerId, $data)
    {
        return $this->client()->put($data, 'customers/{customerId}', ['customerId' => $customerId]);
    }
}
