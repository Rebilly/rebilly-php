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

namespace Rebilly\Tests\Api;

use Rebilly\Entities\PaymentInstrumentValidation;
use Rebilly\Entities\PaymentMethod;
use Rebilly\Rest\Collection;

class PaymentInstrumentValidationTest extends TestCase
{
    /**
     * @test
     */
    public function search()
    {
        $client = $this->getClient();

        $resources = $client->paymentInstrumentValidation()->search();

        $this->assertInstanceOf(Collection::class, $resources);
        $this->assertGreaterThan(0, count($resources));

        return $resources[0];
    }

    /**
     * @test
     */
    public function create()
    {
        $client = $this->getClient();

        $form = new PaymentInstrumentValidation();
        $form->setMethod(PaymentMethod::METHOD_PAYMENT_CARD);
        $form->setPaymentInstrumentId('payment-instrument-1');
        $resource = $client->paymentInstrumentValidation()->create($form);

        $this->assertInstanceOf(PaymentInstrumentValidation::class, $resource);
        $this->assertEquals($form->getPaymentInstrumentId(), $resource->getPaymentInstrumentId());
    }
}
