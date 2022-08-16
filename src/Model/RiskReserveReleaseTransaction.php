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

class RiskReserveReleaseTransaction extends BalanceTransaction
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'type' => 'risk-reserve-release',
        ] + $data);

        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
        if (array_key_exists('_embedded', $data)) {
            $this->setEmbedded($data['_embedded']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return null|array<ParentLink|SelfLink|TransactionLink>
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    /**
     * @return null|array{transaction:BalanceTransaction,transaction:Transaction}
     */
    public function getEmbedded(): ?array
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded'];
        }

        return parent::jsonSerialize() + $data;
    }

    /**
     * @param null|array<ParentLink|SelfLink|TransactionLink> $links
     */
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value ?? null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }

    /**
     * @param null|array{transaction:BalanceTransaction,transaction:Transaction} $embedded
     */
    private function setEmbedded(null|array $embedded): self
    {
        $embedded['transaction'] = isset($embedded['transaction']) ? ($embedded['transaction'] instanceof BalanceTransaction ? $embedded['transaction'] : BalanceTransaction::from($embedded['transaction'])) : null;
        $embedded['transaction'] = isset($embedded['transaction']) ? ($embedded['transaction'] instanceof Transaction ? $embedded['transaction'] : Transaction::from($embedded['transaction'])) : null;

        $this->fields['_embedded'] = $embedded;

        return $this;
    }
}
