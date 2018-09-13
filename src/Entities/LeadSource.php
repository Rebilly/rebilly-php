<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
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
