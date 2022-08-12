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

class CreateIntuitQuickbooksInvoice extends UpdateIntuitQuickbooksInvoice
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct($data);

        if (array_key_exists('customerDisplayName', $data)) {
            $this->setCustomerDisplayName($data['customerDisplayName']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCustomerDisplayName(): string
    {
        return $this->fields['customerDisplayName'];
    }

    public function setCustomerDisplayName(string $customerDisplayName): self
    {
        $this->fields['customerDisplayName'] = $customerDisplayName;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('customerDisplayName', $this->fields)) {
            $data['customerDisplayName'] = $this->fields['customerDisplayName'];
        }

        return parent::jsonSerialize() + $data;
    }
}
