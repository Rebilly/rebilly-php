<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Tests\Stub;

use Psr\Log\AbstractLogger;

/**
 * Class EchoLogger.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 */
final class EchoLogger extends AbstractLogger
{
    public function log($level, $message, array $context = [])
    {
        echo $message, PHP_EOL;
    }
}
