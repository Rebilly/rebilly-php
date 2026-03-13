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
use Rebilly\Sdk\Trait\HasMetadata;

class JetonSettings implements JsonSerializable
{
    use HasMetadata;

    public const METHOD_CHECKOUT = 'CHECKOUT';

    public const METHOD_DIRECT = 'DIRECT';

    public const METHOD_QR = 'QR';

    public const METHOD_JETGO = 'JETGO';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getMethod(): string
    {
        return $this->fields['method'];
    }

    public function setMethod(string $method): static
    {
        $this->fields['method'] = $method;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method'];
        }

        return $data;
    }
}
