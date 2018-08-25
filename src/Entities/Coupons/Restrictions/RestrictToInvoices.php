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

namespace Rebilly\Entities\Coupons\Restrictions;

use Rebilly\Entities\Coupons\Restriction;

/**
 * Class RestrictToInvoices.
 */
class RestrictToInvoices extends Restriction
{
    /**
     * @return array
     */
    public function getInvoiceIds()
    {
        return $this->getAttribute('invoiceIds');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setInvoiceIds($value)
    {
        return $this->setAttribute('invoiceIds', $value);
    }

    /**
     * @return string
     */
    protected function restrictionType()
    {
        return self::TYPE_RESTRICT_TO_INVOICES;
    }
}
