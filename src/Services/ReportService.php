<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Services;

use Rebilly\Entities\Reports\DisputesReport;
use Rebilly\Entities\Reports\DunningReport;
use Rebilly\Entities\Reports\RetentionPercentageReport;
use Rebilly\Entities\Reports\RetentionValueReport;
use Rebilly\Entities\Reports\StatisticsReport;
use Rebilly\Entities\Reports\SubscribersReport;
use Rebilly\Entities\Reports\TransactionsReport;
use Rebilly\Rest\Service;

/**
 * Class ReportService
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class ReportService extends Service
{
    /**
     * Get disputes report
     *
     * @param array $params
     *
     * @return DisputesReport
     */
    public function disputes($params = [])
    {
        return $this->client()->get('reports/disputes', $params);
    }

    /**
     * Get dunning report
     *
     * @param array $params
     *
     * @return DunningReport
     */
    public function dunning($params = [])
    {
        return $this->client()->get('reports/dunning', $params);
    }

    /**
     * Get retention percentage report
     *
     * @param array $params
     *
     * @return RetentionPercentageReport
     */
    public function retentionPercentage($params = [])
    {
        return $this->client()->get('reports/retention-percentage', $params);
    }

    /**
     * Get retention value report
     *
     * @param array $params
     *
     * @return RetentionValueReport
     */
    public function retentionValue($params = [])
    {
        return $this->client()->get('reports/retention-value', $params);
    }

    /**
     * Get subscribers report
     *
     * @param array $params
     *
     * @return SubscribersReport
     */
    public function subscribers($params = [])
    {
        return $this->client()->get('reports/subscribers', $params);
    }

    /**
     * Get statistics report
     *
     * @param array $params
     *
     * @return StatisticsReport
     */
    public function statistics($params = [])
    {
        return $this->client()->get('reports/statistics', $params);
    }

    /**
     * Get transactions report
     *
     * @param array $params
     *
     * @return TransactionsReport
     */
    public function transactions($params = [])
    {
        return $this->client()->get('reports/transactions', $params);
    }
}
