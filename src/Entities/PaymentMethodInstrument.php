<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities;

use DomainException;
use Rebilly\Rest\Resource;

/**
 * Class BaseInstrument
 *
 * @author Maksim Tuzov <maksim.tuzov@rebilly.com>
 * @version 0.1
 */
abstract class PaymentMethodInstrument extends Resource
{
    /**
     * {@inheritdoc}
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        $this->setAttribute('method', $this->methodName());
    }

    /**
     * @return string
     */
    abstract protected function methodName();
}
