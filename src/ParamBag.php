<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly;

use ArrayObject;

/**
 * Class ParamBag.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class ParamBag extends ArrayObject
{
    /**
     * @return ParamBag
     */
    public static function create()
    {
        return new self();
    }

    /**
     * @param string $attribute
     * @param mixed $value
     *
     * @return $this
     */
    public function filter($attribute, $value)
    {
        $filter = $attribute . ':' . $value;

        if ($this->offsetExists('filter')) {
            $filter = $this->offsetGet('filter') . ';' . $filter;
        }

        $this->offsetSet('filter', $filter);

        return $this;
    }

    /**
     * @param string $attribute
     * @param mixed $startValue
     * @param mixed $endValue
     *
     * @return $this
     */
    public function filterRange($attribute, $startValue, $endValue)
    {
        $filter = $attribute . ':' . $startValue . '..' . $endValue;

        if ($this->offsetExists('filter')) {
            $filter = $this->offsetGet('filter') . ';' . $filter;
        }

        $this->offsetSet('filter', $filter);

        return $this;
    }

    /**
     * @param string $attribute
     * @param int $direction
     *
     * @return $this
     */
    public function sort($attribute, $direction = SORT_ASC)
    {
        if ($direction === SORT_DESC) {
            $attribute = '-' . $attribute;
        }

        if ($this->offsetExists('sort')) {
            $attribute = $this->offsetGet('sort') . ',' . $attribute;
        }

        $this->offsetSet('sort', $attribute);

        return $this;
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function limit($value)
    {
        $this->offsetSet('limit', (int) $value);

        return $this;
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function offset($value)
    {
        $this->offsetSet('offset', (int) $value);

        return $this;
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function fields(array $value)
    {
        $this->offsetSet('fields', implode(',', $value));

        return $this;
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function expand(array $value)
    {
        $this->offsetSet('expand', implode(',', $value));

        return $this;
    }
}
