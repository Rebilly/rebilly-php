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

namespace Rebilly\Entities;

use DomainException;
use Rebilly\Rest\Entity;

/**
 * Class Session.
 */
final class Session extends Entity
{
    public const METHOD_POST = 'POST';

    public const METHOD_GET = 'GET';

    public const METHOD_PUT = 'PUT';

    public const METHOD_DELETE = 'DELETE';

    public const METHOD_HEAD = 'HEAD';

    public const METHOD_PATCH = 'PATCH';

    public const MSG_UNEXPECTED_RESOURCE = 'Unexpected resource. Only %s resources support';

    public const MSG_INVALID_RESOURCE_IDS = 'Incorrect resource ids format. It should be empty or an array';

    public const MSG_INVALID_METHODS = 'Incorrect methods format. It should be empty or an array';

    public const MSG_UNEXPECTED_METHOD = 'Unexpected method. Only %s methods support';

    public const MSG_INVALID_FORMAT = 'Incorrect permissions format';

    public const MSG_MISSING_PROPERTY = 'Incorrect permissions format - missing %s property';

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
        $allowedResources = self::allowedResources();
        $allowedMethods = self::allowedMethods();

        if ($value !== null && !is_array($value)) {
            throw new DomainException(self::MSG_INVALID_FORMAT);
        }

        foreach ($value as $rule) {
            if (!is_array($rule)) {
                throw new DomainException(self::MSG_INVALID_FORMAT);
            }

            if (!empty($rule['resourceName']) && !in_array($rule['resourceName'], $allowedResources, true)) {
                throw new DomainException(sprintf(self::MSG_UNEXPECTED_RESOURCE, implode(', ', $allowedResources)));
            }

            if (!empty($rule['resourceIds']) && !is_array($rule['resourceIds'])) {
                throw new DomainException(self::MSG_INVALID_RESOURCE_IDS);
            }

            if (!empty($rule['methods']) && !is_array($rule['methods'])) {
                throw new DomainException(self::MSG_INVALID_METHODS);
            }

            if (!empty($rule['methods'])) {
                foreach ($rule['methods'] as $method) {
                    if (!in_array($method, $allowedMethods, true)) {
                        throw new DomainException(sprintf(self::MSG_UNEXPECTED_METHOD, implode(', ', $allowedMethods)));
                    }
                }
            }
        }

        return $this->setAttribute('permissions', $value);
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->getAttribute('userId');
    }

    /**
     * @return string
     */
    public function getCustomerId()
    {
        return $this->getAttribute('customerId');
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->getAttribute('type');
    }

    /**
     * @return array
     */
    public static function allowedResources()
    {
        return [
            ResourceType::TYPE_AUTHENTICATION_OPTIONS,
            ResourceType::TYPE_AUTHENTICATION_TOKENS,
            ResourceType::TYPE_BANK_ACCOUNTS,
            ResourceType::TYPE_BLACKLISTS,
            ResourceType::TYPE_CREDENTIALS,
            ResourceType::TYPE_CUSTOMERS,
            ResourceType::TYPE_CUSTOM_FIELDS,
            ResourceType::TYPE_DISPUTES,
            ResourceType::TYPE_GATEWAY_ACCOUNTS,
            ResourceType::TYPE_INVOICES,
            ResourceType::TYPE_KYC,
            ResourceType::TYPE_LEAD_SOURCES,
            ResourceType::TYPE_ORGANIZATIONS,
            ResourceType::TYPE_PAYMENT_CARDS,
            ResourceType::TYPE_PAYMENTS,
            ResourceType::TYPE_PASSWORD_TOKENS,
            ResourceType::TYPE_PLANS,
            ResourceType::TYPE_SUBSCRIPTIONS,
            ResourceType::TYPE_TRANSACTIONS,
            ResourceType::TYPE_TOKENS,
            ResourceType::TYPE_WEBSITES,
        ];
    }

    /**
     * @return array
     */
    public static function allowedMethods()
    {
        return [
            self::METHOD_GET,
            self::METHOD_POST,
            self::METHOD_PUT,
            self::METHOD_DELETE,
            self::METHOD_HEAD,
            self::METHOD_PATCH,
        ];
    }
}
