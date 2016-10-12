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
 * Class PaymentCardMigrationsResponse
 *
 * ```json
 * {
 *   "migratedCards"
 * }
 * ```
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
