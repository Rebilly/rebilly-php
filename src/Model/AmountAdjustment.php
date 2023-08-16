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

use InvalidArgumentException;
use JsonSerializable;

abstract class AmountAdjustment implements JsonSerializable
{
    public const METHOD_NONE = 'none';

    public const METHOD_PARTIAL = 'partial';

    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
    }

    public static function from(array $data = []): self
    {
        switch ($data['method']) {
            case 'partial':
                return new Partial($data);
            case 'none':
                return new None($data);
        }

        throw new InvalidArgumentException("Unsupported method value: '{$data['method']}'");
    }

    /**
     * @psalm-return self::METHOD_* $method
     */
    public function getMethod(): string
    {
        return $this->fields['method'];
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method'];
        }

        return $data;
    }

    /**
     * @psalm-param self::METHOD_* $method
     */
    private function setMethod(string $method): static
    {
        $this->fields['method'] = $method;

        return $this;
    }
}
