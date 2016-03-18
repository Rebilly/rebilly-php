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

use Rebilly\Rest\Resource;

/**
 * Class StatisticsReport
 *
 * ```json
 * {
 *   "data"
 *   "revenue"
 *   "revenueGrowthPercentage"
 *   "customers"
 *   "customersGrowthPercentage"
 *   "cancels"
 *   "cancelsGrowthPercentage"
 *   "refunds"
 *   "refundsGrowthPercentage"
 * }
 * ```
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class StatisticsReport extends Resource
{
    /**
     * @return float
     */
    public function getRevenue()
    {
        return $this->getAttribute('revenue');
    }

    /**
     * @return float
     */
    public function getRevenueGrowthPercentage()
    {
        return $this->getAttribute('revenueGrowthPercentage');
    }

    /**
     * @return int
     */
    public function getCustomers()
    {
        return $this->getAttribute('customers');
    }

    /**
     * @return float
     */
    public function getCustomersGrowthPercentage()
    {
        return $this->getAttribute('customersGrowthPercentage');
    }

    /**
     * @return int
     */
    public function getCancels()
    {
        return $this->getAttribute('cancels');
    }

    /**
     * @return float
     */
    public function getCancelsGrowthPercentage()
    {
        return $this->getAttribute('cancelsGrowthPercentage');
    }

    /**
     * @return int
     */
    public function getRefunds()
    {
        return $this->getAttribute('refunds');
    }

    /**
     * @return float
     */
    public function getRefundsGrowthPercentage()
    {
        return $this->getAttribute('refundsGrowthPercentage');
    }
}
