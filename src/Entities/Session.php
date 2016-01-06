<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities;

use DomainException;
use Rebilly\Rest\Entity;

/**
 * Class Session
 *
 * ```json
 * {
 *   "id"
 *   "token"
 *   "expiredTime"
 *   "permissions"
 *   "createdTime"
 *   "updatedTime"
 * }
 * ```
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class Session extends Entity
{
    const WILDCARD = '*';

    const RESOURCE_AUTHENTICATION_OPTIONS = 'authentication-options';
    const RESOURCE_AUTHENTICATION_TOKENS = 'authentication-tokens';
    const RESOURCE_BANK_ACCOUNTS = 'bank-accounts';
    const RESOURCE_BLACKLISTS = 'blacklists';
    const RESOURCE_CONTACTS = 'contacts';
    const RESOURCE_CREDENTIALS = 'credentials';
    const RESOURCE_CUSTOMERS = 'customers';
    const RESOURCE_CUSTOM_FIELDS = 'custom-fields';
    const RESOURCE_DISPUTES = 'disputes';
    const RESOURCE_GATEWAY_ACCOUNTS = 'gateway-accounts';
    const RESOURCE_INVOICES = 'invoices';
    const RESOURCE_LEAD_SOURCES = 'lead-sources';
    const RESOURCE_LAYOUTS = 'layouts';
    const RESOURCE_ORGANIZATIONS = 'organizations';
    const RESOURCE_PAYMENT_CARDS = 'payment-cards';
    const RESOURCE_PAYMENTS = 'payments';
    const RESOURCE_PASSWORD_TOKENS = 'password-tokens';
    const RESOURCE_PLANS = 'plans';
    const RESOURCE_QUEUE = 'queue';
    const RESOURCE_SUBSCRIPTIONS = 'subscriptions';
    const RESOURCE_TRANSACTIONS = 'transactions';
    const RESOURCE_TOKENS = 'tokens';
    const RESOURCE_WEBSITES = 'websites';

    const METHOD_POST = 'POST';
    const METHOD_GET = 'GET';
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';
    const METHOD_HEAD = 'HEAD';

    const MSG_UNEXPECTED_RESOURCE = 'Unexpected resource. Only %s resources support';
    const MSG_UNEXPECTED_METHOD = 'Unexpected method. Only %s methods support';
    const MSG_INVALID_FORMAT = 'Incorrect permissions format';
    const MSG_MISSING_PROPERTY = 'Incorrect permissions format - missing %s property';

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->getAttribute('token');
    }

    /**
     * @return string
     */
    public function getExpiredTime()
    {
        return $this->getAttribute('expiredTime');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setExpiredTime($value)
    {
        return $this->setAttribute('expiredTime', $value);
    }

    /**
     * @return array
     */
    public function getPermissions()
    {
        return $this->getAttribute('permissions');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setPermissions($value)
    {
        $allowedResources = self::getAllowedResources();
        $allowedMethods = self::getAllowedMethods();

        if (!is_array($value)) {
            throw new DomainException(self::MSG_INVALID_FORMAT);
        }

        foreach ($value as $resourceName => $rule) {
            if (!in_array($resourceName, $allowedResources)) {
                throw new DomainException(sprintf(self::MSG_UNEXPECTED_RESOURCE, implode(', ', $allowedResources)));
            }

            if (!is_array($rule)) {
                throw new DomainException(self::MSG_INVALID_FORMAT);
            }

            if (!isset($rule['id'])) {
                throw new DomainException(sprintf(self::MSG_MISSING_PROPERTY, 'id'));
            }

            if (!isset($rule['methods'])) {
                throw new DomainException(sprintf(self::MSG_MISSING_PROPERTY, 'methods'));
            }

            if (self::WILDCARD !== $rule['methods']) {
                foreach ($rule['methods'] as $method) {
                    if (!in_array($method, $allowedMethods)) {
                        throw new DomainException(sprintf(self::MSG_UNEXPECTED_METHOD, implode(', ', $allowedMethods)));
                    }
                }
            }
        }

        return $this->setAttribute('permissions', $value);
    }

    /**
     * @return array
     */
    public static function getAllowedResources()
    {
        return [
            self::WILDCARD,
            self::RESOURCE_AUTHENTICATION_OPTIONS,
            self::RESOURCE_AUTHENTICATION_TOKENS,
            self::RESOURCE_BANK_ACCOUNTS,
            self::RESOURCE_BLACKLISTS,
            self::RESOURCE_CONTACTS,
            self::RESOURCE_CREDENTIALS,
            self::RESOURCE_CUSTOMERS,
            self::RESOURCE_CUSTOM_FIELDS,
            self::RESOURCE_DISPUTES,
            self::RESOURCE_GATEWAY_ACCOUNTS,
            self::RESOURCE_INVOICES,
            self::RESOURCE_LEAD_SOURCES,
            self::RESOURCE_LAYOUTS,
            self::RESOURCE_ORGANIZATIONS,
            self::RESOURCE_PAYMENT_CARDS,
            self::RESOURCE_PAYMENTS,
            self::RESOURCE_PASSWORD_TOKENS,
            self::RESOURCE_PLANS,
            self::RESOURCE_SUBSCRIPTIONS,
            self::RESOURCE_TRANSACTIONS,
            self::RESOURCE_TOKENS,
            self::RESOURCE_WEBSITES,
        ];
    }

    /**
     * @return array
     */
    public static function getAllowedMethods()
    {
        return [
            self::METHOD_GET,
            self::METHOD_POST,
            self::METHOD_PUT,
            self::METHOD_DELETE,
            self::METHOD_HEAD,
        ];
    }
}
