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
    public static function from(array $data = [], array $metadata = []): DataExport
    {
        return match ($data['resource']) {
            'amlChecks' => AmlChecksDataExport::from($data, $metadata),
            'customers' => CustomersDataExport::from($data, $metadata),
            'disputes' => DisputesDataExport::from($data, $metadata),
            'invoiceItems' => InvoiceItemsDataExport::from($data, $metadata),
            'invoices' => InvoicesDataExport::from($data, $metadata),
            'journalRecords' => JournalRecordsDataExport::from($data, $metadata),
            'payoutRequestAllocations' => PayoutRequestAllocationsDataExport::from($data, $metadata),
            'payoutRequests' => PayoutRequestsDataExport::from($data, $metadata),
            'subscriptions' => SubscriptionsDataExport::from($data, $metadata),
            'transactions' => TransactionsDataExport::from($data, $metadata),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
