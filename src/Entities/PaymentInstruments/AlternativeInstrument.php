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

use DomainException;
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
            throw new DomainException(self::MSG_REQUIRED_METHOD);
        }

        if (!in_array($data['method'], self::$supportedAlternativeMethods, true)) {
            throw new DomainException(
                sprintf(self::MSG_UNSUPPORTED_METHOD, implode(',', self::$supportedAlternativeMethods))
            );
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
