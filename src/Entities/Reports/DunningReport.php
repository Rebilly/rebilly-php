<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities\Reports;

use Rebilly\Rest\Entity;

/**
 * Class DunningReport
 *
 * ```json
 * {
 *   "data"
 * }
 * ```
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class DunningReport extends Entity
{
    /**
     * @return array
     */
    public function getData()
    {
        return $this->getAttribute('data');
    }
}
