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

namespace Rebilly\Entities\RulesEngine;

use Rebilly\Rest\Resource;

/**
 * Class EventRules.
 */
class EventRules extends Resource
{
    /**
     * @param array $data
     *
     * @return EventRules
     */
    public static function createFromData(array $data): self
    {
        return new self($data);
    }

    /**
     * @return int
     */
    public function getVersion(): int
    {
        return $this->getAttribute('version');
    }

    /**
     * @return Bind[]|array
     */
    public function getBinds(): array
    {
        return $this->getAttribute('binds');
    }

    /**
     * @param Bind[]|array $value
     *
     * @return $this
     */
    public function setBinds($value): self
    {
        return $this->setAttribute('binds', $value);
    }

    /**
     * @param array $data
     *
     * @return Bind[]|array
     */
    public function createBinds(array $data): array
    {
        return array_map(function ($data) {
            if ($data instanceof Bind) {
                return $data;
            }

            return Bind::createFromData((array) $data);
        }, $data);
    }

    /**
     * @return Rule[]|array
     */
    public function getRules(): array
    {
        return $this->getAttribute('rules');
    }

    /**
     * @param Rule[] $value
     *
     * @return $this
     */
    public function setRules($value): self
    {
        return $this->setAttribute('rules', $value);
    }

    /**
     * @param array $data
     *
     * @return Rule[]|array
     */
    public function createRules(array $data): array
    {
        return array_map(function ($data) {
            if ($data instanceof Rule) {
                return $data;
            }

            return Rule::createFromData((array) $data);
        }, $data);
    }

    /**
     * @return string
     */
    public function getUpdatedTime(): string
    {
        return $this->getAttribute('updatedTime');
    }
}
