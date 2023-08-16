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

declare(strict_types=1);

namespace Rebilly\Sdk\Model;

use JsonSerializable;

class Webhook implements JsonSerializable
{
    public const METHOD_GET = 'GET';

    public const METHOD_POST = 'POST';

    public const METHOD_PUT = 'PUT';

    public const METHOD_PATCH = 'PATCH';

    public const METHOD_DELETE = 'DELETE';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
        if (array_key_exists('url', $data)) {
            $this->setUrl($data['url']);
        }
        if (array_key_exists('query', $data)) {
            $this->setQuery($data['query']);
        }
        if (array_key_exists('body', $data)) {
            $this->setBody($data['body']);
        }
        if (array_key_exists('credentialHash', $data)) {
            $this->setCredentialHash($data['credentialHash']);
        }
        if (array_key_exists('headers', $data)) {
            $this->setHeaders($data['headers']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @psalm-return self::METHOD_* $method
     */
    public function getMethod(): string
    {
        return $this->fields['method'];
    }

    /**
     * @psalm-param self::METHOD_* $method
     */
    public function setMethod(string $method): static
    {
        $this->fields['method'] = $method;

        return $this;
    }

    public function getUrl(): string
    {
        return $this->fields['url'];
    }

    public function setUrl(string $url): static
    {
        $this->fields['url'] = $url;

        return $this;
    }

    /**
     * @return null|array<string,string>
     */
    public function getQuery(): ?array
    {
        return $this->fields['query'] ?? null;
    }

    /**
     * @param null|array<string,string> $query
     */
    public function setQuery(null|array $query): static
    {
        $this->fields['query'] = $query;

        return $this;
    }

    public function getBody(): ?string
    {
        return $this->fields['body'] ?? null;
    }

    public function setBody(null|string $body): static
    {
        $this->fields['body'] = $body;

        return $this;
    }

    public function getCredentialHash(): ?string
    {
        return $this->fields['credentialHash'] ?? null;
    }

    public function setCredentialHash(null|string $credentialHash): static
    {
        $this->fields['credentialHash'] = $credentialHash;

        return $this;
    }

    /**
     * @return null|WebhookHeader[]
     */
    public function getHeaders(): ?array
    {
        return $this->fields['headers'] ?? null;
    }

    /**
     * @param null|WebhookHeader[] $headers
     */
    public function setHeaders(null|array $headers): static
    {
        $headers = $headers !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof WebhookHeader ? $value : WebhookHeader::from($value)) : null, $headers) : null;

        $this->fields['headers'] = $headers;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method'];
        }
        if (array_key_exists('url', $this->fields)) {
            $data['url'] = $this->fields['url'];
        }
        if (array_key_exists('query', $this->fields)) {
            $data['query'] = $this->fields['query'];
        }
        if (array_key_exists('body', $this->fields)) {
            $data['body'] = $this->fields['body'];
        }
        if (array_key_exists('credentialHash', $this->fields)) {
            $data['credentialHash'] = $this->fields['credentialHash'];
        }
        if (array_key_exists('headers', $this->fields)) {
            $data['headers'] = $this->fields['headers'];
        }

        return $data;
    }
}
