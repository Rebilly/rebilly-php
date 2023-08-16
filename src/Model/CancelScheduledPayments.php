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

class CancelScheduledPayments extends RuleAction
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'name' => 'cancel-scheduled-payments',
        ] + $data);

        if (array_key_exists('skipStartedServicePeriod', $data)) {
            $this->setSkipStartedServicePeriod($data['skipStartedServicePeriod']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getSkipStartedServicePeriod(): ?bool
    {
        return $this->fields['skipStartedServicePeriod'] ?? null;
    }

    public function setSkipStartedServicePeriod(null|bool $skipStartedServicePeriod): static
    {
        $this->fields['skipStartedServicePeriod'] = $skipStartedServicePeriod;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('skipStartedServicePeriod', $this->fields)) {
            $data['skipStartedServicePeriod'] = $this->fields['skipStartedServicePeriod'];
        }

        return parent::jsonSerialize() + $data;
    }
}
