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

namespace Rebilly\Tests\Stub;

use Psr\Log\AbstractLogger;

/**
 * Class EchoLogger.
 *
 */
final class EchoLogger extends AbstractLogger
{
    public function log($level, $message, array $context = [])
    {
        echo $message, PHP_EOL;
    }
}
