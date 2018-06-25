<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities\PaymentRetryInstructions;

use DomainException;
use Rebilly\Entities\PaymentRetryInstructions\PaymentInstructionTypes\DiscountType;
use Rebilly\Entities\PaymentRetryInstructions\PaymentInstructionTypes\NoneType;
use Rebilly\Entities\PaymentRetryInstructions\PaymentInstructionTypes\PartialType;
use Rebilly\Rest\Resource;

/**
 * Class PaymentInstruction.
 */
abstract class PaymentInstruction extends Resource
{
    const UNSUPPORTED_METHOD = 'Unexpected method. Only %s methods are supported';
    const REQUIRED_METHOD = 'Method is required';

    const NONE = 'none';
    const PARTIAL = 'partial';
    const DISCOUNT = 'discount';

    private static $availableMethods = [
        self::NONE,
        self::PARTIAL,
        self::DISCOUNT,
    ];

    /**
     * {@inheritdoc}
     */
    public function __construct(array $data = [])
    {
        parent::__construct(['method' => $this->methodName()] + $data);
    }

    /**
     * @param array $data
     *
     * @return PaymentInstruction
     */
    public static function createFromData(array $data)
    {
        if (!isset($data['method'])) {
            throw new DomainException(self::REQUIRED_METHOD);
        }

        switch ($data['method']) {
            case self::NONE:
                $paymentInstruction = new NoneType($data);
                break;
            case self::PARTIAL:
                $paymentInstruction = new PartialType($data);
                break;
            case self::DISCOUNT:
                $paymentInstruction = new DiscountType($data);
                break;
            default:
                throw new DomainException(
                    sprintf(self::UNSUPPORTED_METHOD, implode(',', self::$availableMethods))
                );
        }

        return $paymentInstruction;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->getAttribute('method');
    }

    /**
     * @return string
     */
    abstract protected function methodName();
}
