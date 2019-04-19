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

use DomainException;
use Rebilly\Rest\Resource;

/**
 * Class Rule.
 */
class Rule extends Resource
{
    public const UNEXPECTED_STATUS = 'Unexpected status. Only %s statuses are supported';

    public const STATUS_ACTIVE = 'active';

    public const STATUS_INACTIVE = 'inactive';

    /**
     * @return string[]|array
     */
    public static function statuses(): array
    {
        return [
            self::STATUS_ACTIVE,
            self::STATUS_INACTIVE,
        ];
    }

    /**
     * @param array $data
     *
     * @return Rule
     */
    public static function createFromData(array $data): self
    {
        return new self($data);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setName($value): self
    {
        return $this->setAttribute('name', $value);
    }

    /**
     * @return string[]|array
     */
    public function getLabels(): array
    {
        return $this->getAttribute('labels');
    }

    /**
     * @param string[]|array $value
     *
     * @return $this
     */
    public function setLabels($value): self
    {
        return $this->setAttribute('labels', $value);
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->getAttribute('status') === self::STATUS_ACTIVE;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->getAttribute('status');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setStatus($value): self
    {
        if (!in_array($value, self::statuses(), true)) {
            throw new DomainException(sprintf(self::UNEXPECTED_STATUS, implode(', ', self::statuses())));
        }

        return $this->setAttribute('status', $value);
    }

    /**
     * @return Condition
     */
    public function getCriteria(): Condition
    {
        return $this->getAttribute('criteria');
    }

    /**
     * @param Condition $value
     *
     * @return $this
     */
    public function setCriteria($value): self
    {
        return $this->setAttribute('criteria', $value);
    }

    /**
     * @param array $data
     *
     * @return Condition
     */
    public function createCriteria(array $data): Condition
    {
        return Condition::createFromData($data);
    }

    /**
     * @return RuleAction[]|array
     */
    public function getActions(): array
    {
        return $this->getAttribute('actions');
    }

    /**
     * @param RuleAction[]|array $value
     *
     * @return $this
     */
    public function setActions($value): self
    {
        return $this->setAttribute('actions', $value);
    }

    /**
     * @param array $data
     *
     * @return RuleAction[]|array
     */
    public function createActions(array $data): array
    {
        return array_map(function ($data) {
            return RuleAction::createFromData($data);
        }, $data);
    }

    /**
     * @return bool
     */
    public function isFinal(): bool
    {
        return $this->getAttribute('final');
    }

    /**
     * @param bool $value
     *
     * @return $this
     */
    public function setIsFinal($value): self
    {
        return $this->setAttribute('final', $value);
    }
}
