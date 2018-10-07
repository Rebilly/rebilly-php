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

use Rebilly\Entities\LeadSource;
use Rebilly\Tests\TestCase as BaseTestCase;

class LeadSourceTest extends BaseTestCase
{
    /**
     * @test
     */
    public function leadSourceWithSetters()
    {
        $leadSource = new LeadSource();
        $leadSource->setSource('source');
        $leadSource->setCurrency('USD');
        $leadSource->setAmount(10.5);
        $leadSource->setAffiliate('affiliate');
        $leadSource->setCampaign('campaign');
        $leadSource->setClickId('123');
        $leadSource->setContent('content');
        $leadSource->setMedium('medium');
        $leadSource->setPath('path');
        $leadSource->setSalesAgent('agent');
        $leadSource->setTerm('term');
        $leadSource->setSubAffiliate('subaffiliate');

        self::assertSame('source', $leadSource->getSource());
        self::assertSame('USD', $leadSource->getCurrency());
        self::assertSame(10.5, $leadSource->getAmount());
        self::assertSame('affiliate', $leadSource->getAffiliate());
        self::assertSame('campaign', $leadSource->getCampaign());
        self::assertSame('123', $leadSource->getClickId());
        self::assertSame('content', $leadSource->getContent());
        self::assertSame('medium', $leadSource->getMedium());
        self::assertSame('path', $leadSource->getPath());
        self::assertSame('agent', $leadSource->getSalesAgent());
        self::assertSame('term', $leadSource->getTerm());
        self::assertSame('subaffiliate', $leadSource->getSubAffiliate());
        self::assertSame(null, $leadSource->getOriginal()->getSource());
        self::assertSame(null, $leadSource->getOriginal()->getCurrency());
        self::assertSame(null, $leadSource->getOriginal()->getAmount());
        self::assertSame(null, $leadSource->getOriginal()->getAffiliate());
        self::assertSame(null, $leadSource->getOriginal()->getCampaign());
        self::assertSame(null, $leadSource->getOriginal()->getClickId());
        self::assertSame(null, $leadSource->getOriginal()->getContent());
        self::assertSame(null, $leadSource->getOriginal()->getMedium());
        self::assertSame(null, $leadSource->getOriginal()->getPath());
        self::assertSame(null, $leadSource->getOriginal()->getSalesAgent());
        self::assertSame(null, $leadSource->getOriginal()->getTerm());
    }

    /**
     * @test
     */
    public function leadSourceWithData()
    {
        $leadSource = new LeadSource([
            'source' => 'source',
            'currency' => 'USD',
            'amount' => 10.5,
            'affiliate' => 'affiliate',
            'campaign' => 'campaign',
            'clickId' => '123',
            'content' => 'content',
            'medium' => 'medium',
            'path' => 'path',
            'salesAgent' => 'agent',
            'term' => 'term',
            'subAffiliate' => 'subaffiliate',
            'original' => [
                'source' => 'original-source',
                'currency' => 'EUR',
                'amount' => 12.5,
                'affiliate' => 'original-affiliate',
                'campaign' => 'original-campaign',
                'clickId' => 'original-123',
                'content' => 'original-content',
                'medium' => 'original-medium',
                'path' => 'original-path',
                'salesAgent' => 'original-agent',
                'term' => 'original-term',
                'subAffiliate' => 'original-subaffiliate',
            ],
        ]);

        self::assertSame('source', $leadSource->getSource());
        self::assertSame('USD', $leadSource->getCurrency());
        self::assertSame(10.5, $leadSource->getAmount());
        self::assertSame('affiliate', $leadSource->getAffiliate());
        self::assertSame('campaign', $leadSource->getCampaign());
        self::assertSame('123', $leadSource->getClickId());
        self::assertSame('content', $leadSource->getContent());
        self::assertSame('medium', $leadSource->getMedium());
        self::assertSame('path', $leadSource->getPath());
        self::assertSame('agent', $leadSource->getSalesAgent());
        self::assertSame('term', $leadSource->getTerm());
        self::assertSame('subaffiliate', $leadSource->getSubAffiliate());

        self::assertSame('original-source', $leadSource->getOriginal()->getSource());
        self::assertSame('EUR', $leadSource->getOriginal()->getCurrency());
        self::assertSame(12.5, $leadSource->getOriginal()->getAmount());
        self::assertSame('original-affiliate', $leadSource->getOriginal()->getAffiliate());
        self::assertSame('original-campaign', $leadSource->getOriginal()->getCampaign());
        self::assertSame('original-123', $leadSource->getOriginal()->getClickId());
        self::assertSame('original-content', $leadSource->getOriginal()->getContent());
        self::assertSame('original-medium', $leadSource->getOriginal()->getMedium());
        self::assertSame('original-path', $leadSource->getOriginal()->getPath());
        self::assertSame('original-agent', $leadSource->getOriginal()->getSalesAgent());
        self::assertSame('original-term', $leadSource->getOriginal()->getTerm());
        self::assertSame('original-subaffiliate', $leadSource->getOriginal()->getSubAffiliate());
    }
}
