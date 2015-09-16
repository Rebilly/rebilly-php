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

use Rebilly\Rest\Resource;

/**
 * Class PaymentCardAuthorization
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class PaymentCardAuthorization extends Resource
{
    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->getAttribute('currency');
    }

    /**
     * @param string $value
     *
     * @return PaymentCardAuthorization
     */
    public function setCurrency($value)
    {
        return $this->setAttribute('currency', $value);
    }

    /**
     * @return string
     */
    public function getWebsiteId()
    {
        return $this->getAttribute('websiteId');
    }

    /**
     * @param string $value
     *
     * @return PaymentCardAuthorization
     */
    public function setWebsiteId($value)
    {
        return $this->setAttribute('websiteId', $value);
    }

    /**
     * @return string
     */
    public function getProcessorAccountId()
    {
        return $this->getAttribute('processorAccountId');
    }

    /**
     * @param string $value
     *
     * @return PaymentCardAuthorization
     */
    public function setProcessorAccountId($value)
    {
        return $this->setAttribute('processorAccountId', $value);
    }
}
