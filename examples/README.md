# Examples of Rebilly SDK for PHP

This directory contains examples of how to use the **Rebilly PHP SDK for PHP** version v3.0. Below, you will find the instructions for running the examples.

## Requirements

- PHP version ^8.0.
- Create a Rebilly API key (use [sandbox environment](https://www.rebilly.com/docs/tutorials/environments/#sandbox-environment) for testing).  
  See [API keys](https://www.rebilly.com/docs/dev-docs/api-keys/) for more information.

## Running the examples

1. Go to the examples directory `cd ./examples`.
1. Run `composer install`.
1. Add your keys to the top of the files `purchase.php` and `pagination.php`. It should look like the following:
    ```php
    $client = new Client([
        'baseUrl' => Client::SANDBOX_HOST,
        'organizationId' => '{organizationId}',
        'apiKey' => '{secretKey}',
    ]);
    ```
    In the `purchase.php` file, you also need to include the `websiteId`.  
    See [Organizations and websites](https://www.rebilly.com/docs/dev-docs/organizations-and-websites/#websites) for more information.
1. Run `php purchase.php`.   
   This script execute different operations to complete a purchase, check out the code to see the details.
1. Run `php pagination.php`.   
   This script list the products in the organization using pagination. 
