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

use Rebilly\Entities\Reports\TransactionsHistogramReport;
use Rebilly\Rest\Service;

/**
 * Class HistogramService
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class HistogramService extends Service
{
    /**
     * Get transactions histogram report
     *
     * @param array $params
     *
     * @return TransactionsHistogramReport
     */
    public function transactions($params = [])
    {
        return $this->client()->get('histograms/transactions', $params);
    }
}
