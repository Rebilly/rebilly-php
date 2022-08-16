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

abstract class Discount implements JsonSerializable
{
    public const TYPE_FIXED = 'fixed';

    public const TYPE_PERCENT = 'percent';

    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('context', $data)) {
            $this->setContext($data['context']);
        }
    }

    public static function from(array $data = []): self
    {
        switch ($data['type']) {
            case 'percent':
                return new Percent($data);
            case 'fixed':
                return new Fixed($data);
        }

        throw new InvalidArgumentException("Unsupported type value: '{$data['type']}'");
    }

    /**
     * @psalm-return self::TYPE_*|null $type
     */
    public function getType(): ?string
    {
        return $this->fields['type'] ?? null;
    }

    public function getContext(): ?DiscountContext
    {
        return $this->fields['context'] ?? null;
    }

    public function setContext(null|DiscountContext|string $context): self
    {
        if ($context !== null && !($context instanceof DiscountContext)) {
            $context = DiscountContext::from($context);
        }

        $this->fields['context'] = $context;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('context', $this->fields)) {
            $data['context'] = $this->fields['context']?->value;
        }

        return $data;
    }

    /**
     * @psalm-param self::TYPE_*|null $type
     */
    private function setType(null|string $type): self
    {
        $this->fields['type'] = $type;

        return $this;
    }
}
