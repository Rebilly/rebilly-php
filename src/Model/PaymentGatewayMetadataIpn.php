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

class PaymentGatewayMetadataIpn implements JsonSerializable
{
    public const TYPE__STATIC = 'static';

    public const TYPE_DYNAMIC = 'dynamic';

    public const VERIFICATION_METHOD_QUERY = 'query';

    public const VERIFICATION_METHOD_SIGNATURE = 'signature';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('verificationMethod', $data)) {
            $this->setVerificationMethod($data['verificationMethod']);
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
    public function setType(string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    /**
     * @psalm-return self::VERIFICATION_METHOD_*|null $verificationMethod
     */
    public function getVerificationMethod(): ?string
    {
        return $this->fields['verificationMethod'] ?? null;
    }

    /**
     * @psalm-param self::VERIFICATION_METHOD_*|null $verificationMethod
     */
    public function setVerificationMethod(null|string $verificationMethod): static
    {
        $this->fields['verificationMethod'] = $verificationMethod;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('verificationMethod', $this->fields)) {
            $data['verificationMethod'] = $this->fields['verificationMethod'];
        }

        return $data;
    }
}
