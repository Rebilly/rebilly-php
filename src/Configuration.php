<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly;

use ArrayObject;

/**
 * Class Configuration
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class Configuration extends ArrayObject
{
    /**
     * {@inheritdoc}
     */
    public function __construct(array $options)
    {
        parent::__construct($options);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($index)
    {
        return $this->offsetExists($index) ? parent::offsetGet($index) : null;
    }

    /**
     * @param string $key
     *
     * @return $this
     */
    public function setApiKey($key)
    {
        $this->offsetSet('apiKey', (string) $key);

        return $this;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->offsetGet('apiKey');
    }

    /**
     * @param string $url
     *
     * @return $this
     */
    public function setBaseUrl($url)
    {
        $this->offsetSet('baseUrl', rtrim($url, '/'));

        return $this;
    }

    /**
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->offsetGet('baseUrl');
    }

    /**
     * @param Http\HttpHandler $handler
     *
     * @return $this
     */
    public function setHttpHandler(Http\HttpHandler $handler)
    {
        $this->offsetSet('httpHandler', $handler);

        return $this;
    }

    /**
     * @return Http\HttpHandler
     */
    public function getHttpHandler()
    {
        return $this->offsetGet('httpHandler');
    }

    /**
     * @return Client
     */
    public function createClient()
    {
        return new Client($this);
    }
}
