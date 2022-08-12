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

class BuyFeeTransaction extends BalanceTransaction
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'type' => 'buy-fee',
        ] + $data);

        if (array_key_exists('feeDetails', $data)) {
            $this->setFeeDetails($data['feeDetails']);
        }
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

    public function getFeeDetails(): ?FeeDetails
    {
        return $this->fields['feeDetails'] ?? null;
    }

    public function setFeeDetails(null|FeeDetails|array $feeDetails): self
    {
        if ($feeDetails !== null && !($feeDetails instanceof \Rebilly\Sdk\Model\FeeDetails)) {
            $feeDetails = \Rebilly\Sdk\Model\FeeDetails::from($feeDetails);
        }

        $this->fields['feeDetails'] = $feeDetails;

        return $this;
    }

    /**
     * @return null|array<\Rebilly\Sdk\Model\ParentLink|\Rebilly\Sdk\Model\SelfLink|\Rebilly\Sdk\Model\TransactionLink>
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    /**
     * @return null|array{transaction:\Rebilly\Sdk\Model\BalanceTransaction,transaction:\Rebilly\Sdk\Model\Transaction}
     */
    public function getEmbedded(): ?array
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('feeDetails', $this->fields)) {
            $data['feeDetails'] = $this->fields['feeDetails']?->jsonSerialize();
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded'];
        }

        return parent::jsonSerialize() + $data;
    }

    /**
     * @param null|array<\Rebilly\Sdk\Model\ParentLink|\Rebilly\Sdk\Model\SelfLink|\Rebilly\Sdk\Model\TransactionLink> $links
     */
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value ?? null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }

    /**
     * @param null|array{transaction:\Rebilly\Sdk\Model\BalanceTransaction,transaction:\Rebilly\Sdk\Model\Transaction} $embedded
     */
    private function setEmbedded(null|array $embedded): self
    {
        $embedded['transaction'] = isset($embedded['transaction']) ? ($embedded['transaction'] instanceof \Rebilly\Sdk\Model\BalanceTransaction ? $embedded['transaction'] : \Rebilly\Sdk\Model\BalanceTransaction::from($embedded['transaction'])) : null;
        $embedded['transaction'] = isset($embedded['transaction']) ? ($embedded['transaction'] instanceof \Rebilly\Sdk\Model\Transaction ? $embedded['transaction'] : \Rebilly\Sdk\Model\Transaction::from($embedded['transaction'])) : null;

        $this->fields['_embedded'] = $embedded;

        return $this;
    }
}
