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

namespace Rebilly\Entities\RulesEngine\Actions;

use DomainException;
use Rebilly\Entities\RulesEngine\RuleAction;

/**
 * Class TriggerWebhook.
 */
final class TriggerWebhook extends RuleAction
{
    public const UNEXPECTED_METHOD = 'Unexpected method. Only %s methods are supported';

    public const METHOD_GET = 'GET';

    public const METHOD_POST = 'POST';

    public const METHOD_PUT = 'PUT';

    public const METHOD_PATCH = 'PATCH';

    public const METHOD_DELETE = 'DELETE';

    /**
     * @return string[]|array
     */
    public static function methods(): array
    {
        return [
            self::METHOD_GET,
            self::METHOD_POST,
            self::METHOD_PUT,
            self::METHOD_PATCH,
            self::METHOD_DELETE,
        ];
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->getAttribute('method');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setMethod($value): self
    {
        if (!in_array($value, self::methods(), true)) {
            throw new DomainException(sprintf(self::UNEXPECTED_METHOD, implode(', ', self::methods())));
        }

        return $this->setAttribute('method', $value);
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->getAttribute('url');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setUrl($value): self
    {
        return $this->setAttribute('url', $value);
    }

    /**
     * @return array
     */
    public function getQuery(): array
    {
        return $this->getAttribute('query');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setQuery(array $value): self
    {
        return $this->setAttribute('query', $value);
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->getAttribute('body');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setBody($value): self
    {
        return $this->setAttribute('body', $value);
    }

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
     * TODO create WebhookHeader Resource class
     *
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->getAttribute('headers');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setHeaders(array $value): self
    {
        return $this->setAttribute('headers', $value);
    }

    /**
     * @inheritdoc
     */
    public function actionName(): string
    {
        return self::NAME_TRIGGER_WEBHOOK;
    }
}
