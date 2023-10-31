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

use Rebilly\Sdk\Exception\UnknownDiscriminatorValueException;

class DataExportFactory
{
    public static function from(array $data = []): DataExport
    {
        return match ($data['resource']) {
            'amlChecks' => AmlChecksDataExport::from($data),
            'customers' => CustomersDataExport::from($data),
            'invoiceItems' => InvoiceItemsDataExport::from($data),
            'invoices' => InvoicesDataExport::from($data),
            'revenueAudit' => RevenueAuditDataExport::from($data),
            'subscriptions' => SubscriptionsDataExport::from($data),
            'transactions' => TransactionsDataExport::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
