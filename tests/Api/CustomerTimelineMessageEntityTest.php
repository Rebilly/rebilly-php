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

use Rebilly\Entities\CustomerTimelineMessage;
use Rebilly\Tests\TestCase as BaseTestCase;

class CustomerTimelineMessageEntityTest extends BaseTestCase
{
    public function testRestoreEntity()
    {
        $data = [
            'id' => 'message-1',
            'type' => 'custom-event',
            'customEventType' => 'test',
            'triggeredBy' => 'direct-api',
            'message' => 'test message',
            'extraData' => [
                'actions' => [
                    [
                        'action' => 'resend-email',
                        'messageId' => 'email-message-1',
                    ],
                ],
                'author' => [
                    'userFullName' => 'John Doe',
                    'userId' => 'user-1',
                ],
                'mentions' => [
                    '@test@mail.com' => 'user-1',
                ],
                'links' => [
                    [
                        'resourceType' => 'invoice',
                        'resourceId' => 'invoice-1',
                        'placeholder' => 'Invoice',
                    ],
                ],
                'tables' => [
                    [
                        'type' => 'two-columns',
                        'title' => 'Title',
                        'footer' => 'Footer',
                        'data' => [
                            [
                                'attribute' => 'test-attribute',
                                'value' => 'test-value',
                            ],
                        ],
                    ],
                ],
            ],
        ];
        $timelineMessage = new CustomerTimelineMessage($data);

        self::assertSame('message-1', $timelineMessage->getId());
        self::assertSame('custom-event', $timelineMessage->getType());
        self::assertSame('test', $timelineMessage->getCustomEventType());
        self::assertSame('direct-api', $timelineMessage->getTriggeredBy());
        self::assertSame('test message', $timelineMessage->getMessage());
        self::assertSame('resend-email', $timelineMessage->getExtraData()->getActions()[0]['action']);
        self::assertSame('email-message-1', $timelineMessage->getExtraData()->getActions()[0]['messageId']);
        self::assertSame('John Doe', $timelineMessage->getExtraData()->getAuthor()->getUserFullName());
        self::assertSame('user-1', $timelineMessage->getExtraData()->getAuthor()->getUserId());
        self::assertSame(['@test@mail.com' => 'user-1'], $timelineMessage->getExtraData()->getMentions());
        self::assertSame('invoice', $timelineMessage->getExtraData()->getLinks()[0]->getResourceType());
        self::assertSame('invoice-1', $timelineMessage->getExtraData()->getLinks()[0]->getResourceId());
        self::assertSame('Invoice', $timelineMessage->getExtraData()->getLinks()[0]->getPlaceholder());
        self::assertSame('two-columns', $timelineMessage->getExtraData()->getTables()[0]->getType());
        self::assertSame('Title', $timelineMessage->getExtraData()->getTables()[0]->getTitle());
        self::assertSame('Footer', $timelineMessage->getExtraData()->getTables()[0]->getFooter());
        self::assertSame(
            [
                [
                    'attribute' => 'test-attribute',
                    'value' => 'test-value',
                ],
            ],
            $timelineMessage->getExtraData()->getTables()[0]->getData()
        );
    }

    public function testEntity()
    {
        $timelineMessage = new CustomerTimelineMessage();
        $timelineMessage->setCustomData(['foo' => 'bar']);
        $timelineMessage->setCustomEventType('test');
        $timelineMessage->setMessage('test message');
        $timelineMessage->setType('custom-event');

        self::assertSame('test', $timelineMessage->getCustomEventType());
        self::assertSame('test message', $timelineMessage->getMessage());
        self::assertSame('custom-event', $timelineMessage->getType());
    }
}
