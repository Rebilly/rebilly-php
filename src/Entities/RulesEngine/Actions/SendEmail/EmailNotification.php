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

namespace Rebilly\Entities\RulesEngine\Actions\SendEmail;

use Rebilly\Entities\ResourceAttachment;
use Rebilly\Rest\Resource;

/**
 * Class EmailNotification.
 */
final class EmailNotification extends Resource
{
    /**
     * @return string
     */
    public function getCredentialHash(): string
    {
        return $this->getAttribute('credentialHash');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCredentialHash($value): self
    {
        return $this->setAttribute('credentialHash', $value);
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->getAttribute('version');
    }

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->getAttribute('from');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setFrom($value): self
    {
        return $this->setAttribute('from', $value);
    }

    /**
     * @return string[]|array
     */
    public function getTo(): array
    {
        return $this->getAttribute('to');
    }

    /**
     * @param string[]|array $value
     *
     * @return $this
     */
    public function setTo($value): self
    {
        return $this->setAttribute('to', $value);
    }

    /**
     * @return string[]|array
     */
    public function getCc(): array
    {
        return $this->getAttribute('cc');
    }

    /**
     * @param string[]|array $value
     *
     * @return $this
     */
    public function setCc($value): self
    {
        return $this->setAttribute('cc', $value);
    }

    /**
     * @return string[]|array
     */
    public function getBcc(): array
    {
        return $this->getAttribute('bcc');
    }

    /**
     * @param string[]|array $value
     *
     * @return $this
     */
    public function setBcc($value): self
    {
        return $this->setAttribute('bcc', $value);
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->getAttribute('subject');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setSubject($value): self
    {
        return $this->setAttribute('subject', $value);
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->getAttribute('text');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setText($value): self
    {
        return $this->setAttribute('text', $value);
    }

    /**
     * @return string
     */
    public function getHtml(): string
    {
        return $this->getAttribute('html');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setHtml($value): self
    {
        return $this->setAttribute('html', $value);
    }

    /**
     * @return string
     */
    public function getEditor(): string
    {
        return $this->getAttribute('editor');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setEditor($value): self
    {
        return $this->setAttribute('editor', $value);
    }

    /**
     * @return ResourceAttachment[]|array
     */
    public function getAttachments(): array
    {
        return $this->getAttribute('attachments');
    }

    /**
     * @param ResourceAttachment[]|array $value
     *
     * @return $this
     */
    public function setAttachments(array $value): self
    {
        return $this->setAttribute('attachments', $value);
    }

    /**
     * @param ResourceAttachment[]|array $value
     *
     * @return ResourceAttachment[]|array
     */
    public function createAttachments(array $value): array
    {
        return array_map(function ($data) {
            if ($data instanceof ResourceAttachment) {
                return $data;
            }

            return new ResourceAttachment((array) $data);
        }, $value);
    }

    /**
     * @return int
     */
    public function getWeight(): int
    {
        return $this->getAttribute('weight');
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setWeight($value): self
    {
        return $this->setAttribute('weight', $value);
    }
}
