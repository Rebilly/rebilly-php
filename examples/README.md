# Examples of Rebilly SDK for PHP

This directory contains examples of how to use the **Rebilly PHP SDK for PHP** version v3.0. Below, there are instructions for running the code examples. Check out the [Rebilly API](https://api-reference.rebilly.com/) for more SDK examples.

## Requirements

- PHP version ^8.0.
- Create a Rebilly API key (use [sandbox environment](https://www.rebilly.com/docs/tutorials/environments/#sandbox-environment) for testing).  
  See [API keys](https://www.rebilly.com/docs/dev-docs/api-keys/) for more information.

## Running the examples

1. Go to the examples directory:  

   ```bash
   cd ./examples
   ```

1. Install the package via Composer:  

   ```bash
   composer install
   ```

1. Add the API key and organization ID to the client parameters in the *[purchase.php](./purchase.php)* and *[pagination.php](./pagination.php)* files.

    ```php
    $client = new Client([
        'baseUrl' => Client::SANDBOX_HOST,
        'organizationId' => '{organizationId}',
        'apiKey' => '{secretKey}',
    ]);
    ```

1. Run the purchase script:  

   ```bash
   php purchase.php
   ```

1. Run the pagination script:  
   ```bash
   php pagination.php
   ```

