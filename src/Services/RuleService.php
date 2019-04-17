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

use ArrayObject;
use JsonSerializable;
use Rebilly\Entities\RulesEngine\EventRules;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Rest\Service;

/**
 * Class RuleService
 */
final class RuleService extends Service
{
    /**
     * @param string $eventType
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does not exist
     *
     * @return EventRules
     */
    public function load($eventType, $params = []): EventRules
    {
        return $this->client()->get('events/{eventType}/rules', ['eventType' => $eventType] + (array) $params);
    }

    /**
     * @param string $eventType
     * @param array|JsonSerializable|EventRules $data
     *
     * @return EventRules
     */
    public function update($eventType, $data): EventRules
    {
        return $this->client()->put($data, 'events/{eventType}/rules', ['eventType' => $eventType]);
    }
}
