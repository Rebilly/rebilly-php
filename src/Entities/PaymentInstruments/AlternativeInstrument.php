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

namespace Rebilly\Entities\PaymentInstruments;

use InvalidArgumentException;
use Rebilly\Entities\PaymentMethodInstrument;

/**
 * Class AlternativeInstrument
 */
class AlternativeInstrument extends PaymentMethodInstrument
{
    private $alternativeMethod;

    public function __construct(array $data = [])
    {
        if (!isset($data['method'])) {
            throw new InvalidArgumentException(self::MSG_REQUIRED_METHOD);
        }

        $this->alternativeMethod = $data['method'];

        parent::__construct($data);
    }

    /**
     * {@inheritdoc}
     */
    protected function methodName()
    {
        return $this->alternativeMethod;
    }
}
