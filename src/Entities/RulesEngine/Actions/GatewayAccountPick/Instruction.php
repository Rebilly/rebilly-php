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

namespace Rebilly\Entities\RulesEngine\Actions\GatewayAccountPick;

use DomainException;
use Rebilly\Rest\Resource;

/**
 * Class GatewayAccountPickInstruction.
 */
abstract class Instruction extends Resource
{
    public const REQUIRED_METHOD = 'Method is required';

    public const UNEXPECTED_METHOD = 'Unexpected method. Only %s methods are supported';

    public const METHOD_ACCOUNT_WEIGHTS = 'gateway-account-weights';

    public const METHOD_ACQUIRER_WEIGHTS = 'gateway-acquirer-weights';

    /**
     * @return string[]|array
     */
    public static function methods(): array
    {
        return [
            self::METHOD_ACCOUNT_WEIGHTS,
            self::METHOD_ACQUIRER_WEIGHTS,
        ];
    }

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
     * @return Instruction
     */
    public static function createFromData(array $data): self
    {
        if (!isset($data['method'])) {
            throw new DomainException(self::REQUIRED_METHOD);
        }

        switch ($data['method']) {
            case self::METHOD_ACCOUNT_WEIGHTS:
                $instruction = new AccountWeights($data);

                break;
            case self::METHOD_ACQUIRER_WEIGHTS:
                $instruction = new AcquirerWeights($data);

                break;
            default:
                throw new DomainException(
                    sprintf(self::UNEXPECTED_METHOD, implode(',', self::methods()))
                );
        }

        return $instruction;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->getAttribute('method');
    }

    /**
     * @inheritdoc
     */
    abstract public function methodName(): string;
}
