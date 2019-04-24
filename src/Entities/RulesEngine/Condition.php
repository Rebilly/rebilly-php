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
 * Class Condition.
 */
class Condition extends Resource
{
    public const UNEXPECTED_OP = 'Unexpected operation. Only %s operations are supported';

    public const OP_AND = 'and';

    public const OP_OR = 'or';

    public const OP_NOT = 'not';

    public const OP_BETWEEN = 'between';

    public const OP_EQUALS = 'equals';

    public const OP_IN = 'in';

    public const OP_IN_LIST = 'in-list';

    public const OP_SAME = 'same';

    public const OP_RAND = 'rand';

    public const OP_CONTAINS = 'contains';

    public const OP_COUNT = 'count';

    public const OP_GREATER_THAN = 'gt';

    public const OP_GREATER_THAN_OR_EQUAL = 'gte';

    public const OP_LESS_THAN = 'lt';

    public const OP_LESS_THAN_OR_EQUAL = 'lte';

    /**
     * @return string[]|array
     */
    public static function ops(): array
    {
        return [
            self::OP_AND,
            self::OP_OR,
            self::OP_NOT,
            self::OP_BETWEEN,
            self::OP_EQUALS,
            self::OP_IN,
            self::OP_IN_LIST,
            self::OP_SAME,
            self::OP_RAND,
            self::OP_CONTAINS,
            self::OP_COUNT,
            self::OP_GREATER_THAN,
            self::OP_GREATER_THAN_OR_EQUAL,
            self::OP_LESS_THAN,
            self::OP_LESS_THAN_OR_EQUAL,
        ];
    }

    /**
     * @param array $data
     *
     * @return Condition
     */
    public static function createFromData(array $data): self
    {
        return new self($data);
    }

    /**
     * @return string
     */
    public function getOp(): string
    {
        return $this->getAttribute('op');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setOp($value): self
    {
        if (!in_array($value, self::ops(), true)) {
            throw new DomainException(sprintf(self::UNEXPECTED_OP, implode(', ', self::ops())));
        }

        return $this->setAttribute('op', $value);
    }

    /**
     * @return Condition|null
     */
    public function getCondition(): ?self
    {
        return $this->getAttribute('condition');
    }

    /**
     * @param Condition|null $value
     *
     * @return $this
     */
    public function setCondition($value): self
    {
        return $this->setAttribute('condition', $value);
    }

    /**
     * @param array $data
     *
     * @return Condition
     */
    public function createCondition(array $data): self
    {
        return self::createFromData($data);
    }

    /**
     * @return Condition[]|array
     */
    public function getConditions(): array
    {
        return $this->getAttribute('conditions');
    }

    /**
     * @param Condition[]|array $value
     *
     * @return $this
     */
    public function setConditions($value): self
    {
        return $this->setAttribute('conditions', $value);
    }

    /**
     * @param array $data
     *
     * @return Condition[]|array
     */
    public function createConditions(array $data): array
    {
        return array_map(function ($data) {
            if ($data instanceof self) {
                return $data;
            }

            return self::createFromData((array) $data);
        }, $data);
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->getAttribute('path');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPath($value): self
    {
        return $this->setAttribute('path', $value);
    }

    /**
     * @return string
     */
    public function getComparePath(): string
    {
        return $this->getAttribute('comparePath');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setComparePath($value): self
    {
        return $this->setAttribute('comparePath', $value);
    }

    /**
     * @return string
     */
    public function getListId(): string
    {
        return $this->getAttribute('listId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setListId($value): self
    {
        return $this->setAttribute('listId', $value);
    }

    /**
     * @return string
     */
    public function getMin(): string
    {
        return $this->getAttribute('min');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setMin($value): self
    {
        return $this->setAttribute('min', $value);
    }

    /**
     * @return string
     */
    public function getMax(): string
    {
        return $this->getAttribute('max');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setMax($value): self
    {
        return $this->setAttribute('max', $value);
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->getAttribute('value');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setValue($value): self
    {
        return $this->setAttribute('value', $value);
    }

    /**
     * @return string[]|array
     */
    public function getValues(): array
    {
        return $this->getAttribute('values');
    }

    /**
     * @param string[]|array $value
     *
     * @return $this
     */
    public function setValues($value): self
    {
        return $this->setAttribute('values', $value);
    }
}
