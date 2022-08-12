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

class AddBlocklist extends RuleAction
{
    public const TYPE_CUSTOMER_ID = 'customer-id';

    public const TYPE_EMAIL = 'email';

    public const TYPE_FINGERPRINT = 'fingerprint';

    public const TYPE_IP_ADDRESS = 'ip-address';

    public const TYPE_PAYMENT_CARD = 'payment-card';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'name' => 'blocklist',
        ] + $data);

        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('ttl', $data)) {
            $this->setTtl($data['ttl']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @psalm-return self::TYPE_* $type
     */
    public function getType(): string
    {
        return $this->fields['type'];
    }

    /**
     * @psalm-param self::TYPE_* $type
     */
    public function setType(string $type): self
    {
        $this->fields['type'] = $type;

        return $this;
    }

    public function getTtl(): ?int
    {
        return $this->fields['ttl'] ?? null;
    }

    public function setTtl(null|int $ttl): self
    {
        $this->fields['ttl'] = $ttl;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('ttl', $this->fields)) {
            $data['ttl'] = $this->fields['ttl'];
        }

        return parent::jsonSerialize() + $data;
    }
}
