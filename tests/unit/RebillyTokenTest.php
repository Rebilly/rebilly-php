<?php
class RebillyTokenTest extends \Codeception\TestCase\Test
{
    public function testCreateTokenMinimalJson()
    {
        $token            = new RebillyToken();
        $token->pan       = '4111111111111111';
        $token->expMonth  = '10';
        $token->expYear   = '2018';
        $token->firstName = 'MyFirst';
        $token->lastName  = 'thelast';

        expect($token->buildRequest($token))
            ->equals('{"pan":"4111111111111111","expMonth":"10","expYear":"2018","firstName":"MyFirst","lastName":"thelast"}');
    }


    public function testCreateTokenFullJson()
    {
        $token              = new RebillyToken();
        $token->pan         = '4111111111111111';
        $token->expMonth    = '10';
        $token->expYear     = '2018';
        $token->cvv         = '123';
        $token->firstName   = 'MyFirst';
        $token->lastName    = 'thelast';
        $token->address     = '2020 Main Street';
        $token->address2    = '#555';
        $token->city        = 'Montreal';
        $token->region      = 'Quebec';
        $token->country     = 'CA';
        $token->phoneNumber = '555-555-5555';
        $token->postalCode  = 'H1A 2T9';

        expect($token->buildRequest($token))
            ->equals('{"pan":"4111111111111111","expMonth":"10","expYear":"2018","cvv":"123","firstName":"MyFirst","lastName":"thelast","address":"2020 Main Street","address2":"#555","city":"Montreal","region":"Quebec","country":"CA","phoneNumber":"555-555-5555","postalCode":"H1A 2T9"}');
    }
}
