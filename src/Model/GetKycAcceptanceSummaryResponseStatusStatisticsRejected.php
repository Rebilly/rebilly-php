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

class GetKycAcceptanceSummaryResponseStatusStatisticsRejected implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('total', $data)) {
            $this->setTotal($data['total']);
        }
        if (array_key_exists('automatically', $data)) {
            $this->setAutomatically($data['automatically']);
        }
        if (array_key_exists('manually', $data)) {
            $this->setManually($data['manually']);
        }
        if (array_key_exists('afterAutoAccepted', $data)) {
            $this->setAfterAutoAccepted($data['afterAutoAccepted']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getTotal(): ?int
    {
        return $this->fields['total'] ?? null;
    }

    public function setTotal(null|int $total): self
    {
        $this->fields['total'] = $total;

        return $this;
    }

    public function getAutomatically(): ?int
    {
        return $this->fields['automatically'] ?? null;
    }

    public function setAutomatically(null|int $automatically): self
    {
        $this->fields['automatically'] = $automatically;

        return $this;
    }

    public function getManually(): ?int
    {
        return $this->fields['manually'] ?? null;
    }

    public function setManually(null|int $manually): self
    {
        $this->fields['manually'] = $manually;

        return $this;
    }

    public function getAfterAutoAccepted(): ?int
    {
        return $this->fields['afterAutoAccepted'] ?? null;
    }

    public function setAfterAutoAccepted(null|int $afterAutoAccepted): self
    {
        $this->fields['afterAutoAccepted'] = $afterAutoAccepted;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('total', $this->fields)) {
            $data['total'] = $this->fields['total'];
        }
        if (array_key_exists('automatically', $this->fields)) {
            $data['automatically'] = $this->fields['automatically'];
        }
        if (array_key_exists('manually', $this->fields)) {
            $data['manually'] = $this->fields['manually'];
        }
        if (array_key_exists('afterAutoAccepted', $this->fields)) {
            $data['afterAutoAccepted'] = $this->fields['afterAutoAccepted'];
        }

        return $data;
    }
}
