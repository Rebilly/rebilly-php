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
 * Class SubscribersReport
 *
 * ```json
 * {
 *   "data"
 *   "totalPastDue"
 *   "totalOnTrial"
 *   "totalCancelled"
 *   "totalActive"
 * }
 * ```
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class SubscribersReport extends Entity
{
    /**
     * @return array
     */
    public function getData()
    {
        return $this->getAttribute('data');
    }

    /**
     * @return int
     */
    public function getTotalPastDue()
    {
        return $this->getAttribute('totalPastDue');
    }

    /**
     * @return int
     */
    public function getTotalOnTrial()
    {
        return $this->getAttribute('totalOnTrial');
    }

    /**
     * @return int
     */
    public function getTotalCancelled()
    {
        return $this->getAttribute('totalCancelled');
    }

    /**
     * @return int
     */
    public function getTotalActive()
    {
        return $this->getAttribute('totalActive');
    }
}
