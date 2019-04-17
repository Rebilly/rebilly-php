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

namespace Rebilly\Tests\Api;

use DomainException;
use Rebilly\Entities\RulesEngine\Condition;
use Rebilly\Tests\TestCase as BaseTestCase;

/**
 * Class RuleEntityTest.
 */
class ConditionEntityTest extends BaseTestCase
{
    /**
     * @test
     */
    public function invalidOperation(): void
    {
        $this->expectException(DomainException::class);
        $condition = new Condition();
        $condition->setOp('wrong');
    }

    /**
     * @test
     */
    public function nestedCondition(): void
    {
        $condition = Condition::createFromData([
            'op' => Condition::OP_AND,
            'conditions' => [
                [
                    'op' => Condition::OP_NOT,
                    'condition' => [
                        'op' => Condition::OP_EQUALS,
                        'path' => 'one',
                        'value' => 1,
                    ],
                ],
                [
                    'op' => Condition::OP_GREATER_THAN_OR_EQUAL,
                    'path' => 'two',
                    'value' => 2,
                ],
            ],
        ]);

        self::assertSame(Condition::OP_AND, $condition->getOp());
        self::assertCount(2, $condition->getConditions());
        self::assertInstanceOf(Condition::class, $condition->getConditions()[0]);
        self::assertInstanceOf(Condition::class, $condition->getConditions()[0]->getCondition());
    }
}
