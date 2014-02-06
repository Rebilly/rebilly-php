Installation
===========
*  You can copy the files into your project.
*  You can clone this repository if you use git.
*  If you use composer, you can install from composer as well.

Usage
==========
Include `rebilly_api.php`, set the environment, set your api key, and then use according to documentation.
```php
require('./client/php/rebilly_api.php');

$customer = new RebillyCustomer();
$customer->setEnvironment(RebillyRequest::ENV_SANDBOX);
$customer->setApiKey(API_SECRET_KEY);
```

Requirements
==========
* PHP 5.3+ (tested with 5.3, 5.4, 5.5)
* CURL
* Codeception (tests only)

Documentation
===========
Read https://www.rebilly.com/api/documentation for more details.

Tests
===========
* Install codeception (recommended install with Composer).

```bash
#  install required files
composer install

#  run the tests (from project root)
./vendor/codeception/codeception/codecept run
```
