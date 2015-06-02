<?php
/**
 * This file is part of Rebilly.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see http://rebilly.com
 */

namespace Rebilly\Test\Deprecated;

use RebillyCustomer;
use RebillyPaymentCard;
use RebillyBlacklist;
use RebillyCharge;
use RebillySubscription;
use RebillyTransaction;
use Rebilly\Test\TestCase;

/**
 * Class RebillyTokenTest.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 */
final class RebillyApiTest extends TestCase
{
    /**
     * @test
     */
    public function createApiObjects()
    {
        $this->assertInstanceOf('RebillyRequest', new RebillyCustomer());
        $this->assertInstanceOf('RebillyRequest', new RebillyBlacklist(RebillyBlacklist::TYPE_BIN));
        $this->assertInstanceOf('RebillyRequest', new RebillyCharge());
        $this->assertInstanceOf('RebillyRequest', new RebillyPaymentCard());
        $this->assertInstanceOf('RebillyRequest', new RebillySubscription());
        $this->assertInstanceOf('RebillyRequest', new RebillyTransaction('dummyid'));
    }
}
