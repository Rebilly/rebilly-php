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
    public const UNSUPPORTED_METHOD = 'Unexpected method. Only %s methods are supported';

    public const UNEXPECTED_TYPE = 'Unexpected type. Only %s types are supported';

    public const REQUIRED_METHOD = 'Method is required';

    public const NONE = 'none';

    public const PARTIAL = 'partial';

    public const DISCOUNT = 'discount';

    private static $availableMethods = [
        self::NONE,
        self::PARTIAL,
        self::DISCOUNT,
    ];

    /**
     * @return string[]|array
     */
    abstract public static function types(): array;

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
    public function getType()
    {
        return $this->getAttribute('type');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setType($value)
    {
        if (!in_array($value, static::types(), true)) {
            throw new DomainException(sprintf(self::UNEXPECTED_TYPE, implode(', ', static::types())));
        }

        return $this->setAttribute('type', $value);
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
