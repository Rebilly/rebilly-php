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

class Stripe3dsServer extends Stripe3dsServers
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'name' => 'Stripe3dsServer',
        ] + $data);

        if (array_key_exists('enforceThreeDSecure', $data)) {
            $this->setEnforceThreeDSecure($data['enforceThreeDSecure']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getEnforceThreeDSecure(): ?bool
    {
        return $this->fields['enforceThreeDSecure'] ?? null;
    }

    public function setEnforceThreeDSecure(null|bool $enforceThreeDSecure): self
    {
        $this->fields['enforceThreeDSecure'] = $enforceThreeDSecure;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('enforceThreeDSecure', $this->fields)) {
            $data['enforceThreeDSecure'] = $this->fields['enforceThreeDSecure'];
        }

        return parent::jsonSerialize() + $data;
    }
}
