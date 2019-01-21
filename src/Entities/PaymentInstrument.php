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
 * Class PaymentInstrument.
 */
abstract class PaymentInstrument extends Resource
{
    /**
     * Return the method name
     *
     * @return string
     */
    abstract public function name();
}
