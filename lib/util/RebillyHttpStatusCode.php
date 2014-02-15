<?php
/**
 * Class RebillyHttpStatusCode
 * Helper class pre-defined Http response code
 */

class RebillyHttpStatusCode
{
    /**
     * Http response code
     */
    const STATUS_OK                 = 200;
    const ERROR_BAD_REQUEST         = 400;
    const ERROR_UNAUTHORIZED        = 401;
    const ERROR_REQUEST_FAILED      = 402;
    const ERROR_FORBIDDEN           = 403;
    const ERROR_NOT_FOUND           = 404;
    const ERROR_INVALID_REQUEST     = 405;
    const ERROR_REQUEST_TIMEOUT     = 408;
    const ERROR_PRECONDITION_FAILED = 412;
    const ERROR_INTERNAL_500        = 500;
    const ERROR_INTERNAL_502        = 502;
    const ERROR_INTERNAL_503        = 503;
    const ERROR_INTERNAL_504        = 504;
}
