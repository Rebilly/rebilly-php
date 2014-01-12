<?php
class ResponseTest extends \Codeception\TestCase\Test
{
   public function testParseCreateCustomerNewCardSuccess()
    {
        $json = $this->getJsonFromFile('create_customer_new_card_success');

        $response = new RebillyResponse(200, $json);
        $response->prepareResponse();

        expect_not($response->errors);
        expect_not($response->hasError());
        expect_that($response->transactions);
        expect_that($response->hasTransaction());
        expect($response->transactions->id)->equals('3356446865202abe3d5044');
    }

    public function testParseCreateCustomerNewCardError()
    {
        $json = $this->getJsonFromFile('create_customer_new_card_error');
        $response = new RebillyResponse(200, $json);
        $response->prepareResponse();

        expect_that($response->errors);
        expect_that($response->hasError());
        expect_not($response->transactions);
        expect_not($response->hasTransaction());
        expect($response->errors[0])->equals('[customerId] is already used for another customer.');
    }


    private function getJsonFromFile($jsonName)
    {
        return file_get_contents(__DIR__ . '/json/' . $jsonName . '.json');
    }

}
