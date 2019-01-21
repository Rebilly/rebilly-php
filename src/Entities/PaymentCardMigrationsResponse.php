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

use Rebilly\Rest\Resource;

/**
 * Class PaymentCardMigrationsResponse.
 */
final class PaymentCardMigrationsResponse extends Resource
{
    /**
     * @return string
     */
    public function getMigratedCards()
    {
        return $this->getAttribute('migratedCards');
    }
}
