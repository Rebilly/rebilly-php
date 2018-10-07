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
