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
    public static function createFromData(array $data): self
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
    public function getMethod(): string
    {
        return $this->getAttribute('method');
    }

    /**
     * @return string
     */
    abstract protected function methodName(): string;
}
