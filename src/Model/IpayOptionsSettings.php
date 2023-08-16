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

class IpayOptionsSettings implements JsonSerializable
{
    public const SUBDOMAIN_MIGLITE = 'miglite';

    public const SUBDOMAIN_W88ASIAPAY = 'w88asiapay';

    public const PLATFORM_SOAP = 'SOAP';

    public const PLATFORM_TX_HANDLER = 'TxHandler';

    public const PLATFORM_SECURE_HOSTED = 'SecureHosted';

    public const CARD_TYPE_IDEAL = 'ideal';

    public const CARD_TYPE_IDEALQR = 'idealqr';

    public const CARD_TYPE_SOFORT = 'sofort';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('extraStep', $data)) {
            $this->setExtraStep($data['extraStep']);
        }
        if (array_key_exists('subdomain', $data)) {
            $this->setSubdomain($data['subdomain']);
        }
        if (array_key_exists('platform', $data)) {
            $this->setPlatform($data['platform']);
        }
        if (array_key_exists('cardType', $data)) {
            $this->setCardType($data['cardType']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getExtraStep(): ?bool
    {
        return $this->fields['extraStep'] ?? null;
    }

    public function setExtraStep(null|bool $extraStep): static
    {
        $this->fields['extraStep'] = $extraStep;

        return $this;
    }

    /**
     * @psalm-return self::SUBDOMAIN_*|null $subdomain
     */
    public function getSubdomain(): ?string
    {
        return $this->fields['subdomain'] ?? null;
    }

    /**
     * @psalm-param self::SUBDOMAIN_*|null $subdomain
     */
    public function setSubdomain(null|string $subdomain): static
    {
        $this->fields['subdomain'] = $subdomain;

        return $this;
    }

    /**
     * @psalm-return self::PLATFORM_*|null $platform
     */
    public function getPlatform(): ?string
    {
        return $this->fields['platform'] ?? null;
    }

    /**
     * @psalm-param self::PLATFORM_*|null $platform
     */
    public function setPlatform(null|string $platform): static
    {
        $this->fields['platform'] = $platform;

        return $this;
    }

    /**
     * @psalm-return self::CARD_TYPE_*|null $cardType
     */
    public function getCardType(): ?string
    {
        return $this->fields['cardType'] ?? null;
    }

    /**
     * @psalm-param self::CARD_TYPE_*|null $cardType
     */
    public function setCardType(null|string $cardType): static
    {
        $this->fields['cardType'] = $cardType;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('extraStep', $this->fields)) {
            $data['extraStep'] = $this->fields['extraStep'];
        }
        if (array_key_exists('subdomain', $this->fields)) {
            $data['subdomain'] = $this->fields['subdomain'];
        }
        if (array_key_exists('platform', $this->fields)) {
            $data['platform'] = $this->fields['platform'];
        }
        if (array_key_exists('cardType', $this->fields)) {
            $data['cardType'] = $this->fields['cardType'];
        }

        return $data;
    }
}
