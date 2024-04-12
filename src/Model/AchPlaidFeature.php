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

use DateTimeImmutable;
use DateTimeInterface;

class AchPlaidFeature implements ReadyToPayAchMethodFeature
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('linkToken', $data)) {
            $this->setLinkToken($data['linkToken']);
        }
        if (array_key_exists('expirationTime', $data)) {
            $this->setExpirationTime($data['expirationTime']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getName(): string
    {
        return 'Plaid';
    }

    public function getLinkToken(): string
    {
        return $this->fields['linkToken'];
    }

    public function setLinkToken(string $linkToken): static
    {
        $this->fields['linkToken'] = $linkToken;

        return $this;
    }

    public function getExpirationTime(): DateTimeImmutable
    {
        return $this->fields['expirationTime'];
    }

    public function setExpirationTime(DateTimeImmutable|string $expirationTime): static
    {
        if (!($expirationTime instanceof DateTimeImmutable)) {
            $expirationTime = new DateTimeImmutable($expirationTime);
        }

        $this->fields['expirationTime'] = $expirationTime;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'name' => 'Plaid',
        ];
        if (array_key_exists('linkToken', $this->fields)) {
            $data['linkToken'] = $this->fields['linkToken'];
        }
        if (array_key_exists('expirationTime', $this->fields)) {
            $data['expirationTime'] = $this->fields['expirationTime']->format(DateTimeInterface::RFC3339);
        }

        return $data;
    }
}
