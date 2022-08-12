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

class ACISettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('url', $data)) {
            $this->setUrl($data['url']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getUrl(): ?string
    {
        return $this->fields['url'] ?? null;
    }

    public function setUrl(null|string $url): self
    {
        $this->fields['url'] = $url;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('url', $this->fields)) {
            $data['url'] = $this->fields['url'];
        }

        return $data;
    }
}
