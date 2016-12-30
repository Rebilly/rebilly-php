<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities;

use Rebilly\Rest\Entity;

/**
 * Class WebsiteWebhook
 *
 * ```json
 * {
 *   "webHookUrl"
 *   "webHookUsername"
 *   "webHookPassword"
 * }
 * ```
 */
final class WebsiteWebhook extends Entity
{
    /**
     * @return string
     */
    public function getWebHookUrl()
    {
        return $this->getAttribute('webHookUrl');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setWebHookUrl($value)
    {
        return $this->setAttribute('webHookUrl', $value);
    }

    /**
     * @return string
     */
    public function getWebHookUsername()
    {
        return $this->getAttribute('webHookUsername');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setWebHookUsername($value)
    {
        return $this->setAttribute('webHookUsername', $value);
    }

    /**
     * @return string
     */
    public function getWebHookPassword()
    {
        return $this->getAttribute('webHookPassword');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setWebHookPassword($value)
    {
        return $this->setAttribute('webHookPassword', $value);
    }
}
