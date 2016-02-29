<?php
/**
 * Slavcodev Components
 *
 * @author Veaceslav Medvedev <slavcopost@gmail.com>
 * @license http://www.opensource.org/licenses/bsd-license.php
 */

namespace Rebilly\Entities;

use ArrayIterator;
use DomainException;
use IteratorAggregate;
use Rebilly\Rest\Resource;
use Traversable;

/**
 * Class ReportingCurrencies.
 */
final class ReportingCurrencies extends Resource implements IteratorAggregate
{
    /**
     * @return Traversable
     */
    public function getIterator()
    {
        return new ArrayIterator($this->jsonSerialize());
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($offset)
    {
        return $this->getAttribute($offset);
    }

    /**
     * {@inheritdoc}
     *
     * @throws DomainException
     */
    public function offsetSet($offset, $value)
    {
        throw new DomainException('Currencies list is immutable, you cannot change it');
    }
}
