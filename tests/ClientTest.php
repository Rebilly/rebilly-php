<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Tests;

use RuntimeException;
use LogicException as PendingException;
use Rebilly\Client;

/**
 * Class ClientTest.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class ClientTest extends TestCase
{
    /**
     * @test
     * @expectedException RuntimeException
     * @expectedExceptionMessage The client is not initialized
     */
    public function useClientBeforeInitialization()
    {
        Client::get('/');
    }

    /**
     * @test
     */
    public function initClient()
    {
        throw new PendingException('The tests not ready');
    }
}
