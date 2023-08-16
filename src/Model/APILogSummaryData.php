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

class APILogSummaryData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('route', $data)) {
            $this->setRoute($data['route']);
        }
        if (array_key_exists('total', $data)) {
            $this->setTotal($data['total']);
        }
        if (array_key_exists('get', $data)) {
            $this->setGet($data['get']);
        }
        if (array_key_exists('post', $data)) {
            $this->setPost($data['post']);
        }
        if (array_key_exists('put', $data)) {
            $this->setPut($data['put']);
        }
        if (array_key_exists('patch', $data)) {
            $this->setPatch($data['patch']);
        }
        if (array_key_exists('delete', $data)) {
            $this->setDelete($data['delete']);
        }
        if (array_key_exists('head', $data)) {
            $this->setHead($data['head']);
        }
        if (array_key_exists('options', $data)) {
            $this->setOptions($data['options']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getRoute(): ?string
    {
        return $this->fields['route'] ?? null;
    }

    public function setRoute(null|string $route): static
    {
        $this->fields['route'] = $route;

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->fields['total'] ?? null;
    }

    public function setTotal(null|int $total): static
    {
        $this->fields['total'] = $total;

        return $this;
    }

    public function getGet(): ?int
    {
        return $this->fields['get'] ?? null;
    }

    public function setGet(null|int $get): static
    {
        $this->fields['get'] = $get;

        return $this;
    }

    public function getPost(): ?int
    {
        return $this->fields['post'] ?? null;
    }

    public function setPost(null|int $post): static
    {
        $this->fields['post'] = $post;

        return $this;
    }

    public function getPut(): ?int
    {
        return $this->fields['put'] ?? null;
    }

    public function setPut(null|int $put): static
    {
        $this->fields['put'] = $put;

        return $this;
    }

    public function getPatch(): ?int
    {
        return $this->fields['patch'] ?? null;
    }

    public function setPatch(null|int $patch): static
    {
        $this->fields['patch'] = $patch;

        return $this;
    }

    public function getDelete(): ?int
    {
        return $this->fields['delete'] ?? null;
    }

    public function setDelete(null|int $delete): static
    {
        $this->fields['delete'] = $delete;

        return $this;
    }

    public function getHead(): ?int
    {
        return $this->fields['head'] ?? null;
    }

    public function setHead(null|int $head): static
    {
        $this->fields['head'] = $head;

        return $this;
    }

    public function getOptions(): ?int
    {
        return $this->fields['options'] ?? null;
    }

    public function setOptions(null|int $options): static
    {
        $this->fields['options'] = $options;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('route', $this->fields)) {
            $data['route'] = $this->fields['route'];
        }
        if (array_key_exists('total', $this->fields)) {
            $data['total'] = $this->fields['total'];
        }
        if (array_key_exists('get', $this->fields)) {
            $data['get'] = $this->fields['get'];
        }
        if (array_key_exists('post', $this->fields)) {
            $data['post'] = $this->fields['post'];
        }
        if (array_key_exists('put', $this->fields)) {
            $data['put'] = $this->fields['put'];
        }
        if (array_key_exists('patch', $this->fields)) {
            $data['patch'] = $this->fields['patch'];
        }
        if (array_key_exists('delete', $this->fields)) {
            $data['delete'] = $this->fields['delete'];
        }
        if (array_key_exists('head', $this->fields)) {
            $data['head'] = $this->fields['head'];
        }
        if (array_key_exists('options', $this->fields)) {
            $data['options'] = $this->fields['options'];
        }

        return $data;
    }
}
