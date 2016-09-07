<?php

namespace Rebilly\Entities;

use Rebilly\Rest\Entity;

/**
 * Class Gateway.
 */
final class Gateway extends Entity
{
    private $response;
    private $avsResponse;
    private $cvvResponse;

    /**
     * Gateway constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data['response'])) {
            $this->response = new GatewayResponse($data['response']);
            $data['response'] = $this->response->jsonSerialize();
        }

        if (isset($data['cvvResponse'])) {
            $this->cvvResponse = new CvvResponse($data['cvvResponse']);
            $data['cvvResponse'] = $this->cvvResponse->jsonSerialize();
        }

        if (isset($data['avsResponse'])) {
            $this->avsResponse = new AvsResponse($data['avsResponse']);
            $data['avsResponse'] = $this->avsResponse->jsonSerialize();
        }

        parent::__construct($data);
    }

    /**
     * @return null|GatewayResponse
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return null|AvsResponse
     */
    public function getAvsResponse()
    {
        return $this->avsResponse;
    }

    /**
     * @return null|CvvResponse
     */
    public function getCvvResponse()
    {
        return $this->cvvResponse;
    }
}
