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
 * Class PaymentMethod
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
abstract class PaymentMethod extends Resource
{
    /**
     * Return the method name
     *
     * @return string
     */
    abstract public function name();
}
