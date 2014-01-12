<?php

/**
 * Class RebillyThreeDSecure
 */
class RebillyThreeDSecure
{

    const THREE_D_SECURE_URL = 'threeDSecure/';
    /**
     * @var string
     */
    public $enrolled;

    /**
     * @var string
     */
    public $enrollmentEci;

    /**
     * @var string
     */
    public $eci;

    /**
     * @var string
     */
    public $cavv;

    /**
     * @var string
     */
    public $xid;

    /**
     * @var string
     */
    public $payerAuthResponseStatus;

    /**
     * @var string
     */
    public $signatureVerification;

    /**
     * @var decimal
     */
    public $amount;
}
