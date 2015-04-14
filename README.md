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

$customer = new Rebilly\v2_1\Customer();
$customer->setEnvironment(RebillyRequest::ENV_SANDBOX);
$customer->setApiKey(API_SECRET_KEY);
```
Use version 2.1 of the API.

Requirements
==========
* PHP 5.3+ (tested with 5.3, 5.4, 5.5, 5.6)
* CURL (verify peer requires a root certificate authority -- if you have not configured php curl to use one, and your system libs aren't linked to one, you may need to do a [manual configuration](http://stackoverflow.com/questions/17478283/paypal-access-ssl-certificate-unable-to-get-local-issuer-certificate/19149687#19149687) to use the appropriate certificate authority)
* Codeception (tests only)

Documentation
===========
Read https://www.rebilly.com/api/documentation/v2.1/ for more details.

Tests
===========
* Install codeception (recommended install with Composer).

```bash
#  install required files
composer install

#  run the tests (from project root)
./vendor/codeception/codeception/codecept run
```
