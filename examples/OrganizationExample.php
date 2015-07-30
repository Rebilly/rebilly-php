<?php

namespace Rebilly\examples;
use Rebilly\v2_1\Organization;
use RebillyRequest;

class OrganizationExample
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
     * Get an organization
     * @throws \Exception
     */
    public function getOrganization()
    {
        $organization = new Organization('organizationId');
        $organization->setApiUrl(RebillyRequest::ENV_SANDBOX);
        $organization->setApiKey($this->sandboxAPIKey);

        $response = $organization->retrieve();
        print_r($response->getRawResponse());

    }

    /**
     * List all organizations
     */
    public function listAllOrganizations()
    {
        $organization = new Organization();
        $organization->setApiUrl(RebillyRequest::ENV_SANDBOX);
        $organization->setApiKey($this->sandboxAPIKey);

        $response = $organization->listAll();
        print_r($response->getRawResponse());
    }

    /**
     * create new organization
     */
    public function createNew()
    {
        $organization = new Organization();
        $organization->setApiUrl(RebillyRequest::ENV_SANDBOX);
        $organization->setApiKey($this->sandboxAPIKey);
        $organization->name = 'My new organization';
        $organization->address = '123 main street';
        $organization->region = 'New York';
        $organization->country = 'US';
        $organization->postalCode = '12345';

        $response = $organization->create();
        print_r($response->getRawResponse());
    }

    /**
     * create organization with specific ID
     * @param $organizationId
     * @throws \Exception
     */
    public function createWithId($organizationId)
    {
        $organization = new Organization($organizationId);
        $organization->setApiUrl(RebillyRequest::ENV_SANDBOX);
        $organization->setApiKey($this->sandboxAPIKey);
        $organization->name = 'My new organization';
        $organization->address = '123 main street';
        $organization->region = 'New York';
        $organization->country = 'US';
        $organization->postalCode = '12345';

        $response = $organization->update();
        print_r($response->getRawResponse());
    }

    /**
     * Delete an organization
     * @throws \Exception
     */
    public function delete()
    {
        $organization = new Organization('organizationId');
        $organization->setApiUrl(RebillyRequest::ENV_SANDBOX);
        $organization->setApiKey($this->sandboxAPIKey);

        $response = $organization->delete();
        if ($response->statusCode === 204) {
            echo 'successfully deleted organization: '  ;
        }
    }
} 
