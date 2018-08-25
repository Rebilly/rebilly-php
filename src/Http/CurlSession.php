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

namespace Rebilly\Http;

/**
 * Class CurlSession.
 *
 * @codeCoverageIgnore
 *
 */
class CurlSession
{
    private $handle;

    /**
     * @param string|null $url
     *
     * @return resource
     */
    public function open($url = null)
    {
        $this->handle = curl_init($url);

        return $this->handle !== false;
    }

    /**
     * @param array $options
     */
    public function setOptions(array $options)
    {
        curl_setopt_array($this->handle, $options);
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function setOption($name, $value)
    {
        curl_setopt($this->handle, $name, $value);
    }

    /**
     * @return mixed
     */
    public function execute()
    {
        ob_start();
        $result = curl_exec($this->handle);
        ob_end_clean();

        return $result;
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function getInfo($name)
    {
        return curl_getinfo($this->handle, $name);
    }

    /**
     * @see http://curl.haxx.se/libcurl/c/libcurl-errors.html
     *
     * @return string
     */
    public function getErrorMessage()
    {
        return curl_error($this->handle);
    }

    /**
     * @return int
     */
    public function getErrorCode()
    {
        return curl_errno($this->handle);
    }

    /**
     * Close session.
     */
    public function close()
    {
        if (is_resource($this->handle)) {
            curl_close($this->handle);
        }
    }
}
