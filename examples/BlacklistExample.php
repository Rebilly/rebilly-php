<?php

namespace Rebilly\examples;

use Rebilly\v2_1\Blacklist;
use RebillyHttpStatusCode;
use RebillyRequest;

class BlacklistExample
{
    /**
     * @var string Sandbox API key
     */
    private $sandboxAPIKey;

    /**
     * @param string $sandboxAPIKey Sandbox API key
     */
    public function __construct($sandboxAPIKey)
    {
        $this->sandboxAPIKey = $sandboxAPIKey;
    }

    /**
     * Get a blacklist
     * @param $blacklistId
     * @throws \Exception
     */
    public function getBlacklist($blacklistId)
    {
        $blacklist = new Blacklist($blacklistId);
        $blacklist->setApiUrl(RebillyRequest::ENV_SANDBOX);
        $blacklist->setApiKey($this->sandboxAPIKey);

        $response = $blacklist->retrieve();
        print_r($response->getRawResponse());
    }

    /**
     * List all the blacklists
     */
    public function listAllBlacklists()
    {
        $blacklist = new Blacklist();
        $blacklist->setApiUrl(RebillyRequest::ENV_SANDBOX);
        $blacklist->setApiKey($this->sandboxAPIKey);

        $response = $blacklist->listAll();
        print_r($response->getRawResponse());
    }

    /**
     * Create new blacklist
     * @param $type
     * @param $value
     * @param null $ttl
     */
    public function createNewBlacklist($type, $value, $ttl = null)
    {
        $blacklist = new Blacklist();
        $blacklist->setApiUrl(RebillyRequest::ENV_SANDBOX);
        $blacklist->setApiKey($this->sandboxAPIKey);
        $blacklist->type = $type;
        $blacklist->value = $value;
        $blacklist->ttl = $ttl;

        $response = $blacklist->create();
        print_r($response->getRawResponse());
    }

    /**
     * Delete a blacklist
     * @param $blacklistId
     * @throws \Exception
     */
    public function deleteBlacklist($blacklistId)
    {
        $blacklist = new Blacklist($blacklistId);
        $blacklist->setApiUrl(RebillyRequest::ENV_SANDBOX);
        $blacklist->setApiKey($this->sandboxAPIKey);

        $response = $blacklist->delete();
        if ($response->statusCode === RebillyHttpStatusCode::STATUS_NO_CONTENT) {
            echo 'Successfully deleted blacklist: ' . $blacklistId;
        }
    }


} 
