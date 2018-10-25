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

namespace Rebilly\Entities\PaymentInstruments;

use DomainException;
use Rebilly\Entities\PaymentInstrument;
use Rebilly\Entities\PaymentMethod;

class BankAccountPaymentInstrument extends PaymentInstrument
{
    public const ACCOUNT_TYPE_CHECKING = 'checking';

    public const ACCOUNT_TYPE_SAVINGS = 'savings';

    public const ACCOUNT_TYPE_OTHER = 'other';

    public const MSG_UNEXPECTED_ACCOUNT_TYPE = 'Unexpected account type. Only %s account type support';

    /**
     * @return array
     */
    public static function allowedAccountTypes()
    {
        return [
            self::ACCOUNT_TYPE_CHECKING,
            self::ACCOUNT_TYPE_SAVINGS,
            self::ACCOUNT_TYPE_OTHER,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function name()
    {
        return PaymentMethod::METHOD_ACH;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setBankName($value)
    {
        return $this->setAttribute('bankName', $value);
    }

    /**
     * @return string
     */
    public function getBankName()
    {
        return $this->getAttribute('bankName');
    }

    /**
     * @return int
     */
    public function getRoutingNumber()
    {
        return $this->getAttribute('routingNumber');
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setRoutingNumber($value)
    {
        return $this->setAttribute('routingNumber', $value);
    }

    /**
     * @return int
     */
    public function getAccountNumber()
    {
        return $this->getAttribute('accountNumber');
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setAccountNumber($value)
    {
        return $this->setAttribute('accountNumber', $value);
    }

    /**
     * @return string
     */
    public function getAccountType()
    {
        return $this->getAttribute('accountType');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setAccountType($value)
    {
        $allowedAccountTypes = self::allowedAccountTypes();

        if (!in_array($value, $allowedAccountTypes, true)) {
            throw new DomainException(sprintf(self::MSG_UNEXPECTED_ACCOUNT_TYPE, implode(', ', $allowedAccountTypes)));
        }

        return $this->setAttribute('accountType', $value);
    }
}
