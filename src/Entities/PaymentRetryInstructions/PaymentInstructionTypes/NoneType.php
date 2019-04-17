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

namespace Rebilly\Entities\PaymentRetryInstructions\PaymentInstructionTypes;

use Rebilly\Entities\PaymentRetryInstructions\PaymentInstruction;

/**
 * Class NoneType
 */
class NoneType extends PaymentInstruction
{
    public const TYPE_NONE = 'none';

    public const TYPE_PLAIN = 'plain';

    public const TYPE_LOGIN = 'login';

    public const TYPE_CRAM_MD5 = 'cram-md5';

    /**
     * @return string[]|array
     */
    public static function types(): array
    {
        return [
            self::TYPE_NONE,
            self::TYPE_PLAIN,
            self::TYPE_LOGIN,
            self::TYPE_CRAM_MD5,
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function methodName()
    {
        return PaymentInstruction::NONE;
    }
}
