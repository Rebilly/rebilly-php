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

namespace Rebilly\Entities;

use Rebilly\Entities\InvoiceRetryInstructions\RetryInstruction;
use Rebilly\Rest\Entity;

/**
 * Class Invoice.
 */
final class Invoice extends Entity
{
    /**
     * @return string
     */
    public function getCustomerId()
    {
        return $this->getAttribute('customerId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCustomerId($value)
    {
        return $this->setAttribute('customerId', $value);
    }

    /**
     * @return string
     */
    public function getWebsiteId()
    {
        return $this->getAttribute('websiteId');
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->getAttribute('amount');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setWebsiteId($value)
    {
        return $this->setAttribute('websiteId', $value);
    }

    /**
     * @return string
     */
    public function getSubscriptionId()
    {
        return $this->getAttribute('subscriptionId');
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->getAttribute('currency');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCurrency($value)
    {
        return $this->setAttribute('currency', $value);
    }

    /**
     * @return int
     */
    public function getInvoiceNumber()
    {
        return $this->getAttribute('invoiceNumber');
    }

    /**
     * @return string
     */
    public function getPaidTime()
    {
        return $this->getAttribute('paidTime');
    }

    /**
     * @return string
     */
    public function getAbandonedTime()
    {
        return $this->getAttribute('abandonedTime');
    }

    /**
     * @return string
     */
    public function getVoidedTime()
    {
        return $this->getAttribute('voidedTime');
    }

    /**
     * @return string
     */
    public function getIssuedTime()
    {
        return $this->getAttribute('issuedTime');
    }

    /**
     * @return string
     */
    public function getDueTime()
    {
        return $this->getAttribute('dueTime');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setDueTime($value)
    {
        return $this->setAttribute('dueTime', $value);
    }

    /**
     * @return null|LeadSource
     */
    public function getLeadSource()
    {
        if ($this->hasEmbeddedResource('leadSource')) {
            return new LeadSource($this->getEmbeddedResource('leadSource'));
        }

        return null;
    }

    /**
     * @return array|InvoiceItem[]
     */
    public function getItems()
    {
        return $this->getAttribute('items');
    }

    /**
     * @param array $data
     *
     * @return array|InvoiceItem[]
     */
    public function createItems(array $data)
    {
        return array_map(function ($element) {
            return new InvoiceItem($element);
        }, $data);
    }

    /**
     * @deprecated use {@see getShipping()} instead
     *
     * @return float
     */
    public function getShippingAmount()
    {
        return $this->getAttribute('shippingAmount');
    }

    /**
     * @return float
     */
    public function getDiscountAmount()
    {
        return $this->getAttribute('discountAmount');
    }

    /**
     * @return float
     */
    public function getSubtotalAmount()
    {
        return $this->getAttribute('subtotalAmount');
    }

    /**
     * @deprecated use {@see getTax()} instead
     *
     * @return array
     */
    public function getTaxes()
    {
        $invoiceTaxes = [];
        $taxes = $this->getAttribute('taxes');
        if ($taxes && count($taxes) > 0) {
            foreach ($taxes as $tax) {
                $invoiceTaxes[] = new InvoiceTax($tax);
            }
        } else {
            $invoiceTaxes = $taxes;
        }

        return $invoiceTaxes;
    }

    /**
     * @return Address
     */
    public function getBillingAddress()
    {
        return $this->getAttribute('billingAddress');
    }

    /**
     * @param Address|array $value
     *
     * @return $this
     */
    public function setBillingAddress($value)
    {
        return $this->setAttribute('billingAddress', $value);
    }

    /**
     * @return Address
     */
    public function getDeliveryAddress()
    {
        return $this->getAttribute('deliveryAddress');
    }

    /**
     * @param Address|array $value
     *
     * @return $this
     */
    public function setDeliveryAddress($value)
    {
        return $this->setAttribute('deliveryAddress', $value);
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->getAttribute('status');
    }

    /**
     * @return int
     */
    public function getCollectionPeriod()
    {
        return $this->getAttribute('collectionPeriod');
    }

    /**
     * @return int
     */
    public function getDelinquentCollectionPeriod()
    {
        return $this->getAttribute('delinquentCollectionPeriod');
    }

    /**
     * @return string
     */
    public function getAutopayScheduledTime()
    {
        return $this->getAttribute('autopayScheduledTime');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setAutopayScheduledTime($value)
    {
        return $this->setAttribute('autopayScheduledTime', $value);
    }

    /**
     * @return RetryInstruction
     */
    public function getRetryInstruction()
    {
        return $this->getAttribute('retryInstruction');
    }

    /**
     * @param RetryInstruction|array $value
     *
     * @return $this
     */
    public function setRetryInstruction($value)
    {
        return $this->setAttribute('retryInstruction', $value);
    }

    /**
     * @param array $data
     *
     * @return Address
     */
    public function createBillingAddress(array $data)
    {
        return new Address($data);
    }

    /**
     * @param array $data
     *
     * @return Address
     */
    public function createDeliveryAddress(array $data)
    {
        return new Address($data);
    }

    /**
     * @param array $data
     *
     * @return RetryInstruction
     */
    public function createRetryInstruction(array $data)
    {
        return RetryInstruction::createFromData($data);
    }

    /**
     * @return array|Transaction[]
     */
    public function getTransactions()
    {
        return $this->getAttribute('transactions');
    }

    /**
     * @param array $data
     *
     * @return array|Transaction[]
     */
    public function createTransactions(array $data)
    {
        return array_map(function ($element) {
            return new Transaction($element);
        }, $data);
    }

    /**
     * @return null|string
     */
    public function getPoNumber()
    {
        return $this->getAttribute('poNumber');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPoNumber($value)
    {
        return $this->setAttribute('poNumber', $value);
    }

    /**
     * @return null|string
     */
    public function getNotes()
    {
        return $this->getAttribute('notes');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setNotes($value)
    {
        return $this->setAttribute('notes', $value);
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }

    /**
     * @return string
     */
    public function getRevision()
    {
        return $this->getAttribute('revision');
    }

    /**
     * @return float
     */
    public function getAmountDue()
    {
        return $this->getAttribute('amountDue');
    }

    /**
     * @return int
     */
    public function getAutopayRetryNumber()
    {
        return $this->getAttribute('autopayRetryNumber');
    }

    /**
     * @return null|string
     */
    public function getDueReminderTime()
    {
        return $this->getAttribute('dueReminderTime');
    }

    /**
     * @return int
     */
    public function getDueReminderNumber()
    {
        return $this->getAttribute('dueReminderNumber');
    }

    /**
     * @return string
     */
    public function getPaymentFormUrl()
    {
        return $this->getAttribute('paymentFormUrl');
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->getAttribute('type');
    }

    /**
     * @return array|InvoiceDiscount[]
     */
    public function getDiscounts()
    {
        return $this->getAttribute('discounts');
    }

    /**
     * @param array $data
     *
     * @return array|InvoiceDiscount[]
     */
    public function createDiscounts(array $data)
    {
        return array_map(function ($element) {
            return new InvoiceDiscount($element);
        }, $data);
    }

    /**
     * @return Shipping
     */
    public function getShipping()
    {
        return $this->getAttribute('shipping');
    }

    /**
     * @param array|Shipping $value
     *
     * @return $this
     */
    public function setShipping($value)
    {
        return $this->setAttribute('shipping', $value);
    }

    /**
     * @param array $data
     *
     * @return Shipping
     */
    public function createShipping(array $data)
    {
        return new Shipping($data);
    }

    /**
     * @return InvoiceTax
     */
    public function getTax()
    {
        return $this->getAttribute('tax');
    }

    /**
     * @param array|InvoiceTax $value
     *
     * @return $this
     */
    public function setTax($value)
    {
        return $this->setAttribute('tax', $value);
    }

    /**
     * @param array $data
     *
     * @return InvoiceTax
     */
    public function createTax(array $data)
    {
        return new InvoiceTax($data);
    }
}
