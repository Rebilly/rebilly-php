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
use TypeError;

class InitialInvoiceLink implements JsonSerializable
{
    public const REL_INITIAL_INVOICE = 'initialInvoice';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('rel', $data)) {
            $this->setRel($data['rel']);
        }
        if (array_key_exists('href', $data)) {
            $this->setHref($data['href']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /** @return null|array<0: self, 1: int> **/
    public static function tryFrom(array $data = []): ?array
    {
        try {
            $instance = self::from($data);

            return [$instance, count(array_intersect_key($data, $instance->jsonSerialize()))];
        } catch (InvalidArgumentException|TypeError) {
        }

        return null;
    }

    /**
     * @psalm-return self::REL_* $rel
     */
    public function getRel(): string
    {
        return $this->fields['rel'];
    }

    /**
     * @psalm-param self::REL_* $rel
     */
    public function setRel(string $rel): static
    {
        $this->fields['rel'] = $rel;

        return $this;
    }

    public function getHref(): string
    {
        return $this->fields['href'];
    }

    public function setHref(string $href): static
    {
        $this->fields['href'] = $href;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('rel', $this->fields)) {
            $data['rel'] = $this->fields['rel'];
        }
        if (array_key_exists('href', $this->fields)) {
            $data['href'] = $this->fields['href'];
        }

        return $data;
    }
}
