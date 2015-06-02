<?php
/**
 * Register `Rebilly` root namespace and link to `lib` directory.
 * All classes without namespace will load from base directory.
 */

require_once __DIR__ . '/lib/RebillyClassLoader.php';

$loader = new RebillyClassLoader(
    'Rebilly',
    __DIR__ . '/lib',
    [
        'RebillyHttpStatusCode' => __DIR__ . '/lib/util/RebillyHttpStatusCode.php',
        'RebillyRequest' => __DIR__ . '/lib/RebillyRequest.php',
        'RebillyResponse' => __DIR__ . '/lib/RebillyResponse.php',
        'RebillyAddressInfo' => __DIR__ . '/lib/RebillyAddressInfo.php',
        'RebillyBlacklist' => __DIR__ . '/lib/RebillyBlacklist.php',
        'RebillyCharge' => __DIR__ . '/lib/RebillyCharge.php',
        'RebillyCustomer' => __DIR__ . '/lib/RebillyCustomer.php',
        'RebillyDispute' => __DIR__ . '/lib/RebillyDispute.php',
        'RebillyPaymentCard' => __DIR__ . '/lib/RebillyPaymentCard.php',
        'RebillySignature' => __DIR__ . '/lib/RebillySignature.php',
        'RebillySubscription' => __DIR__ . '/lib/RebillySubscription.php',
        'RebillyTransaction' => __DIR__ . '/lib/RebillyTransaction.php',
        'RebillyToken' => __DIR__ . '/lib/RebillyToken.php',
        'RebillyThreeDSecure' => __DIR__ . '/lib/RebillyThreeDSecure.php',
        'RebillyPlan' => __DIR__ . '/lib/RebillyPlan.php',
        'RebillyLayout' => __DIR__ . '/lib/RebillyLayout.php',
        'RebillyCustomField' => __DIR__ . '/lib/RebillyCustomField.php',
    ]
);
$loader->register();
