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
     * @return EmailTemplate[]|array
     */
    public function getTemplates(): array
    {
        return $this->getAttribute('templates');
    }

    /**
     * @param EmailTemplate[]|array $value
     *
     * @return $this
     */
    public function setTemplates(array $value): self
    {
        return $this->setAttribute('templates', $value);
    }

    /**
     * @param EmailTemplate[]|array $value
     *
     * @return EmailTemplate[]|array
     */
    public function createTemplates(array $value): array
    {
        return array_map(function ($data) {
            if ($data instanceof EmailTemplate) {
                return $data;
            }

            return new EmailTemplate((array) $data);
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
