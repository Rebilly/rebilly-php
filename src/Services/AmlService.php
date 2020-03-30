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

namespace Rebilly\Services;

use Rebilly\Entities\AmlEntry;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

final class AmlService extends Service
{
    /**
     * @param string $firstName
     * @param string $lastName
     *
     * @return AmlEntry[]|Collection
     */
    public function search(string $firstName, string $lastName): Collection
    {
        return $this->client()->get('aml', compact('firstName', 'lastName'));
    }
}
