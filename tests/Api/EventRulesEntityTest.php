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

use Rebilly\Entities\RulesEngine\Bind;
use Rebilly\Entities\RulesEngine\Condition;
use Rebilly\Entities\RulesEngine\EventRules;
use Rebilly\Tests\TestCase as BaseTestCase;

/**
 * Class RuleEntityTest.
 */
class EventRulesEntityTest extends BaseTestCase
{
    /**
     * @test
     */
    public function emptyEventRules(): void
    {
        $rule = EventRules::createFromData([
            'version' => 1,
            'binds' => [],
            'rules' => [],
        ]);

        self::assertSame(1, $rule->getVersion());
        self::assertEmpty($rule->getBinds());
        self::assertEmpty($rule->getRules());
    }

    /**
     * @test
     */
    public function simpleBindWithCriteria(): void
    {
        $rule = EventRules::createFromData([
            'version' => 1,
            'binds' => [
                [
                    'name' => 'bind-1',
                    'labels' => [
                        'Bind 1',
                        'Bind 0',
                    ],
                    'status' => Bind::STATUS_ACTIVE,
                    'criteria' => [
                        'op' => Condition::OP_EQUALS,
                        'path' => 'subscription.customer.id',
                        'value' => 'customer-1',
                    ],
                ],
            ],
            'rules' => [],
        ]);

        self::assertCount(1, $rule->getBinds());
        $bind = $rule->getBinds()[0];
        self::assertInstanceOf(Bind::class, $bind);
        self::assertSame('bind-1', $bind->getName());
        self::assertCount(2, $bind->getLabels());
        self::assertSame('active', $bind->getStatus());
        self::assertTrue($bind->isActive());
        self::assertInstanceOf(Condition::class, $bind->getCriteria());
        $criteria = $bind->getCriteria();
        self::assertSame(Condition::OP_EQUALS, $criteria->getOp());
        self::assertSame('subscription.customer.id', $criteria->getPath());
        self::assertSame('customer-1', $criteria->getValue());
    }

    /**
     * @test
     */
    public function simpleBindWithoutCriteria(): void
    {
        $rule = EventRules::createFromData([
            'version' => 1,
            'binds' => [
                [
                    'name' => 'bind-1',
                    'labels' => [
                        'Bind 1',
                        'Bind 0',
                    ],
                    'status' => Bind::STATUS_ACTIVE,
                ],
            ],
            'rules' => [],
        ]);

        self::assertCount(1, $rule->getBinds());
        $bind = $rule->getBinds()[0];
        self::assertNull($bind->getCriteria());
    }
}
