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

declare(strict_types=1);

namespace Rebilly\Sdk\Api;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Utils;
use Rebilly\Sdk\Model\RiskScoreBlocklist;
use Rebilly\Sdk\Model\RiskScoreRules;

class RiskScoreRulesApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    public function getAll(): RiskScoreRules
    {
        $uri = '/risk-score-rules';

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return RiskScoreRules::from($data);
    }

    public function getAllBlocklistRules(): RiskScoreBlocklist
    {
        $uri = '/risk-score-rules/blocklists';

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return RiskScoreBlocklist::from($data);
    }

    public function updateRiskScoreBlocklistRules(
        RiskScoreBlocklist $riskScoreBlocklist,
    ): RiskScoreBlocklist {
        $uri = '/risk-score-rules/blocklists';

        $request = new Request('PUT', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($riskScoreBlocklist));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return RiskScoreBlocklist::from($data);
    }

    public function updateRiskScoreRules(
        RiskScoreRules $riskScoreRules,
    ): RiskScoreRules {
        $uri = '/risk-score-rules';

        $request = new Request('PUT', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($riskScoreRules));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return RiskScoreRules::from($data);
    }
}
