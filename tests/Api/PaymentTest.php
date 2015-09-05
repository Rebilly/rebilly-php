<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Tests\Api;

use Rebilly\Entities\Payment;
use Rebilly\Entities\PaymentMethods\PaymentCardMethod;
use Rebilly\Entities\ScheduledPayment;
use Rebilly\Http\Exception\UnprocessableEntityException;

/**
 * Class PaymentTest.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 */
final class PaymentTest extends TestCase
{
    /**
     * @test
     * @ expectedException \Rebilly\Http\Exception\UnprocessableEntityException
     */
    public function howToUsePayments()
    {
        $faker = $this->getFaker();
        $client = $this->getClient();

        $method = new PaymentCardMethod();
        $method->setPaymentCardId($faker->uuid);

        $payment = new Payment();
        $payment->setDescription($faker->sentence);
        $payment->setWebsiteId('github');
        $payment->setCustomerId('customer-1');
        $payment->setAmount(10);
        $payment->setCurrency('USD');
        $payment->setMethod($method);

        try {
            $payment = $client->payments()->create($payment);
        } catch (UnprocessableEntityException $e) {
            var_dump($e->getErrors());
            return;
        }

        if ($payment instanceof ScheduledPayment) {
            if ($payment->isApprovalRequired()) {
                // Redirect the user to approval URL
                $this->assertStringStartsWith('http', $payment->getApprovalLink());
            } else {
                $attemptsWait = 2;

                while ($payment instanceof ScheduledPayment && $attemptsWait-- > 0) {
                    sleep(1);
                    echo "Polling queue...\n";
                    $payment = $client->payments()->loadFromQueue($payment->getId());
                }
            }
        }

        // $this->assertInstanceOf(Payment::class, $payment);
    }
}
