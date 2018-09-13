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

/**
 * Class LeadSource
 *
 * ```json
 * {
 *   "original"
 *   "customerId"
 *   "medium"
 *   "source"
 *   "campaign"
 *   "term"
 *   "content"
 *   "affiliate"
 *   "subAffiliate"
 *   "salesAgent"
 *   "clickId"
 *   "path"
 *   "currency"
 *   "amount"
 * }
 * ```
 */
final class LeadSource extends LeadSourceData
{
    /**
     * @return LeadSourceData
     */
    public function getOriginal()
    {
        return new LeadSourceData((array) $this->getAttribute('original'));
    }
}
