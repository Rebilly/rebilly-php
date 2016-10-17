<?php

namespace Rebilly\Entities;

use Rebilly\Rest\Resource;

/**
 * Class Gateway.
 */
final class Gateway extends Resource
{
    /**
     * @return null|GatewayResponse
     */
    public function getResponse()
    {
        return $this->getAttribute('response');
    }

    /**
     * @return null|AvsResponse
     */
    public function getAvsResponse()
    {
        return $this->getAttribute('avsResponse');
    }

    /**
     * @return null|CvvResponse
     */
    public function getCvvResponse()
    {
        return $this->getAttribute('cvvResponse');
    }

    /**
     * @param array $data
     *
     * @return GatewayResponse
     */
    public function createResponse(array $data)
    {
        return new GatewayResponse($data);
    }

    /**
     * @param array $data
     *
     * @return AvsResponse
     */
    public function createAvsResponse(array $data)
    {
        return new AvsResponse($data);
    }

    /**
     * @param array $data
     *
     * @return CvvResponse
     */
    public function createCvvResponse(array $data)
    {
        return new CvvResponse($data);
    }
}
