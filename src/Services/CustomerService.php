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
use Rebilly\Entities\Customer;
use Rebilly\Entities\LeadSource;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class CustomerService
 *
 */
final class CustomerService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return Customer[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'customers', $params);
    }

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
     * @param array|JsonSerializable|Customer $data
     * @param string $customerId
     *
     * @throws DataValidationException The input data does not valid
     *
     * @return Customer
     */
    public function create($data, $customerId = null)
    {
        if (isset($customerId)) {
            return $this->client()->put($data, 'customers/{customerId}', ['customerId' => $customerId]);
        }

        return $this->client()->post($data, 'customers');
    }

    /**
     * @param string $customerId
     * @param array|JsonSerializable|Customer $data
     *
     * @throws DataValidationException The input data does not valid
     *
     * @return Customer
     */
    public function update($customerId, $data)
    {
        return $this->client()->put($data, 'customers/{customerId}', ['customerId' => $customerId]);
    }

    /**
     * @param string $customerId
     *
     * @return LeadSource
     */
    public function getLeadSource($customerId)
    {
        return $this->client()->get('customers/{customerId}/lead-source', ['customerId' => $customerId]);
    }

    /**
     * @param string $customerId
     * @param array|JsonSerializable|LeadSource $leadSource
     *
     * @return LeadSource
     */
    public function updateLeadSource($customerId, $leadSource)
    {
        return $this->client()->put($leadSource, 'customers/{customerId}/lead-source', ['customerId' => $customerId]);
    }

    /**
     * @param string $customerId
     */
    public function deleteLeadSource($customerId)
    {
        $this->client()->delete('customers/{customerId}/lead-source', ['customerId' => $customerId]);
    }

    /**
     * @param string $duplicateCustomerId
     * @param string $targetCustomerId
     */
    public function merge($duplicateCustomerId, $targetCustomerId)
    {
        $this->client()->delete(
            'customers/{duplicateCustomerId}?targetCustomerId={targetCustomerId}',
            ['duplicateCustomerId' => $duplicateCustomerId, 'targetCustomerId' => $targetCustomerId]
        );
    }
}
