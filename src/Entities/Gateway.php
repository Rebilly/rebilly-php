<?php

namespace Rebilly\Entities;

use Rebilly\Rest\Entity;

/**
 * Class Gateway
 */
final class Gateway extends Entity
{
    private $response;
    private $avsResponse;
    private $cvvResponse;

    public function __construct(array $data)
    {
        if (isset($data['response'])) {
            $this->response = new GatewayResponse($data['response']);
            $data['response'] = $this->response->jsonSerialize();
        }
        if (isset($data['cvvResponse'])) {
            $this->cvvResponse = new GatewayResponse($data['cvvResponse']);
            $data['cvvResponse'] = $this->cvvResponse->jsonSerialize();
        }
        if (isset($data['avsResponse'])) {
            $this->avsResponse = new GatewayResponse($data['avsResponse']);
            $data['avsResponse'] = $this->avsResponse->jsonSerialize();
        }
        parent::__construct($data);
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function getAvsResponse()
    {
        return $this->avsResponse;
    }

    public function getCvvResponse()
    {
        return $this->cvvResponse;
    }
}
