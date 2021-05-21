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

namespace Rebilly\Entities;

use ArrayAccess;
use ArrayIterator;
use InvalidArgumentException;
use IteratorAggregate;
use Rebilly\Entities\Coupons\Coupon;
use Rebilly\Entities\Coupons\Redemption;
use Rebilly\Entities\KycDocuments\KycDocument;
use Rebilly\Entities\RulesEngine\EventRules;
use Rebilly\Entities\Shipping\ShippingZone;
use Rebilly\Rest\Collection;

/**
 * Class Schema.
 */
final class Schema implements IteratorAggregate, ArrayAccess
{
    /** @var callable[]|array */
    private $builders = [];

    public function __construct()
    {
        $this->builders = [
            'bank-accounts' => function (array $content) {
                return new Collection(new BankAccount(), $content);
            },
            'bank-accounts/{bankAccountId}' => function (array $content) {
                return new BankAccount($content);
            },
            'blacklists' => function (array $content) {
                return new Collection(new Blacklist(), $content);
            },
            'blacklists/{blacklistId}' => function (array $content) {
                return new Blacklist($content);
            },
            'blocklists' => function (array $content) {
                return new Collection(new Blocklist(), $content);
            },
            'blocklists/{blocklistId}' => function (array $content) {
                return new Blocklist($content);
            },
            'websites' => function (array $content) {
                return new Collection(new Website(), $content);
            },
            'websites/{websiteId}' => function (array $content) {
                return new Website($content);
            },
            'files' => function (array $content) {
                return new Collection(new File(), $content);
            },
            'files/{fileId}' => function (array $content) {
                return new File($content);
            },
            'attachments' => function (array $content) {
                return new Collection(new Attachment(), $content);
            },
            'attachments/{attachmentId}' => function (array $content) {
                return new Attachment($content);
            },
            'shipping-zones' => function (array $content) {
                return new Collection(new ShippingZone(), $content);
            },
            'shipping-zones/{shippingZoneId}' => function (array $content) {
                return new ShippingZone($content);
            },
            'products' => function (array $content) {
                return new Collection(new Product(), $content);
            },
            'products/{productId}' => function (array $content) {
                return new Product($content);
            },
            'customers' => function (array $content) {
                return new Collection(new Customer(), $content);
            },
            'customers/{customerId}' => function (array $content) {
                return new Customer($content);
            },
            'customers/{customerId}/lead-source' => function (array $content) {
                return new LeadSource($content);
            },
            'lead-sources' => function (array $content) {
                return new Collection(new LeadSource(), $content);
            },
            'lead-sources/{leadSourceId}' => function (array $content) {
                return new LeadSource($content);
            },
            'invoices' => function (array $content) {
                return new Collection(new Invoice(), $content);
            },
            'invoices/{invoiceId}' => function (array $content) {
                return new Invoice($content);
            },
            'invoices/{invoiceId}/items' => function (array $content) {
                return new Collection(new InvoiceItem(), $content);
            },
            'invoices/{invoiceId}/items/{invoiceItemId}' => function (array $content) {
                return new InvoiceItem($content);
            },
            'invoices/{invoiceId}/lead-source' => function (array $content) {
                return new LeadSource($content);
            },
            'plans' => function (array $content) {
                return new Collection(new Plan(), $content);
            },
            'plans/{planId}' => function (array $content) {
                return new Plan($content);
            },
            'subscriptions' => function (array $content) {
                return new Collection(new Subscription(), $content);
            },
            'subscriptions/{subscriptionId}' => function (array $content) {
                return new Subscription($content);
            },
            'subscriptions/{subscriptionId}/change-plan' => function (array $content) {
                return new Subscription($content);
            },
            'subscriptions/{subscriptionId}/interim-invoice' => function (array $content) {
                return new Invoice($content);
            },
            'subscriptions/{subscriptionId}/upcoming-invoices' => function (array $content) {
                return new Collection(new Invoice(), $content);
            },
            'subscriptions/{subscriptionId}/lead-source' => function (array $content) {
                return new LeadSource($content);
            },
            'payment-cards' => function (array $content) {
                return new Collection(new PaymentCard(), $content);
            },
            'payment-cards/{cardId}' => function (array $content) {
                return new PaymentCard($content);
            },
            'paypal-accounts' => function (array $content) {
                return new Collection(new PayPalAccount(), $content);
            },
            'paypal-accounts/{paypalAccountId}' => function (array $content) {
                return new PayPalAccount($content);
            },
            'tokens' => function (array $content) {
                return new Collection(new PaymentToken(), $content);
            },
            'tokens/{tokenId}' => function (array $content) {
                return new PaymentToken($content);
            },
            'transactions' => function (array $content) {
                return new Collection(new Transaction(), $content);
            },
            'transactions/{transactionId}' => function (array $content) {
                return new Transaction($content);
            },
            'authentication-options' => function (array $content) {
                return new AuthenticationOptions($content);
            },
            'credentials' => function (array $content) {
                return new Collection(new CustomerCredential(), $content);
            },
            'credentials/{credentialId}' => function (array $content) {
                return new CustomerCredential($content);
            },
            'password-tokens' => function (array $content) {
                return new Collection(new ResetPasswordToken(), $content);
            },
            'password-tokens/{token}' => function (array $content) {
                return new ResetPasswordToken($content);
            },
            'authentication-tokens' => function (array $content) {
                return new Collection(new AuthenticationToken(), $content);
            },
            'authentication-tokens/{token}' => function (array $content) {
                return new AuthenticationToken($content);
            },
            'authentication-tokens/{token}/exchange' => function (array $content) {
                return new Session($content);
            },
            'organizations' => function (array $content) {
                return new Collection(new Organization(), $content);
            },
            'organizations/{organizationId}' => function (array $content) {
                return new Organization($content);
            },
            'custom-fields/{resourceType}' => function (array $content) {
                return new Collection(new CustomField(), $content);
            },
            'custom-fields/{resourceType}/{name}' => function (array $content) {
                return new CustomField($content);
            },
            'gateway-accounts' => function (array $content) {
                return new Collection(new GatewayAccount(), $content);
            },
            'gateway-accounts/{gatewayAccountId}' => function (array $content) {
                return new GatewayAccount($content);
            },
            'sessions/{sessionId}' => function (array $content) {
                return new Session($content);
            },
            'users' => function (array $content) {
                return new Collection(new User(), $content);
            },
            'users/{userId}' => function (array $content) {
                return new User($content);
            },
            '3dsecure' => function (array $content) {
                return new Collection(new ThreeDSecure(), $content);
            },
            '3dsecure/{3dsecureId}' => function (array $content) {
                return new ThreeDSecure($content);
            },
            'api-keys' => function (array $content) {
                return new Collection(new ApiKey(), $content);
            },
            'api-keys/{apiKeyId}' => function (array $content) {
                return new ApiKey($content);
            },
            'tracking/api' => function (array $content) {
                return new Collection(new ApiTracking(), $content);
            },
            'tracking/api/{logId}' => function (array $content) {
                return new ApiTracking($content);
            },
            'tracking/subscriptions' => function (array $content) {
                return new Collection(new SubscriptionTracking(), $content);
            },
            'tracking/subscriptions/{logId}' => function (array $content) {
                return new SubscriptionTracking($content);
            },
            'disputes' => function (array $content) {
                return new Collection(new Dispute(), $content);
            },
            'disputes/{disputeId}' => function (array $content) {
                return new Dispute($content);
            },
            'coupons' => function (array $content) {
                return new Collection(new Coupon(), $content);
            },
            'coupons/{couponId}' => function (array $content) {
                return new Coupon($content);
            },
            'coupons-redemptions' => function (array $content) {
                return new Collection(new Redemption(), $content);
            },
            'coupons-redemptions/{redemptionId}' => function (array $content) {
                return new Redemption($content);
            },
            'lists' => function (array $content) {
                return new Collection(new ValuesList(), $content);
            },
            'lists/{listId}' => function (array $content) {
                return new ValuesList($content);
            },
            'lists/{listId}/{version}' => function (array $content) {
                return new ValuesList($content);
            },
            'tracking/lists' => function (array $content) {
                return new Collection(new ValuesList(), $content);
            },
            'webhooks' => function (array $content) {
                return new Collection(new Webhook(), $content);
            },
            'webhooks/{webhookId}' => function (array $content) {
                return new Webhook($content);
            },
            'previews/webhooks' => function (array $content) {
                return new Webhook($content);
            },
            'credential-hashes/webhooks/{hash}' => function (array $content) {
                return new WebhookCredential($content);
            },
            'tracking/webhooks' => function (array $content) {
                return new Collection(new WebhookTracking(), $content);
            },
            'tracking/webhooks/{webhookId}' => function (array $content) {
                return new WebhookTracking($content);
            },
            'gateway-accounts/{gatewayAccountId}/downtime-schedules' => function (array $content) {
                return new Collection(new GatewayAccountDowntime(), $content);
            },
            'gateway-accounts/{gatewayAccountId}/downtime-schedules/{downtimeId}' => function (array $content) {
                return new GatewayAccountDowntime($content);
            },
            'gateway-accounts/{gatewayAccountId}/limits' => function (array $content) {
                return new Collection(new GatewayAccountLimit(), $content);
            },
            'gateway-accounts/{gatewayAccountId}/limits/{limitId}' => function (array $content) {
                return new GatewayAccountLimit($content);
            },
            'subscription-cancellations' => function (array $content) {
                return new Collection(new SubscriptionCancellation(), $content);
            },
            'subscription-cancellations/{cancellationId}' => function (array $content) {
                return new SubscriptionCancellation($content);
            },
            'subscription-reactivations' => function (array $content) {
                return new Collection(new SubscriptionReactivation(), $content);
            },
            'subscription-reactivations/{reactivationId}' => function (array $content) {
                return new SubscriptionReactivation($content);
            },
            'kyc-documents' => function (array $content) {
                return new Collection(new KycDocument(), $content);
            },
            'kyc-documents/{id}' => function (array $content) {
                return new KycDocument($content);
            },
            'events/{eventType}/rules' => function (array $content) {
                return new EventRules($content);
            },
            'customers/{customerId}/timeline' => function (array $content) {
                return new Collection(new CustomerTimelineMessage(), $content);
            },
            'customers/{customerId}/timeline/{messageId}' => function (array $content) {
                return new CustomerTimelineMessage($content);
            },
            'aml' => function (array $content) {
                return new Collection(new AmlEntry(), $content);
            },
            'credential-hashes/plaid/{hash}' => function (array $content) {
                return new PlaidCredential($content);
            },
            'payment-instruments' => function (array $content) {
                return new Collection(new CommonPaymentInstrument(), $content);
            },
            'payment-instruments/{paymentInstrumentId}' => function (array $content) {
                return new CommonPaymentInstrument($content);
            },
            'credential-hashes/experian' => function (array $content) {
                return new Collection(new ExperianCredential(), $content);
            },
            'credential-hashes/experian/{hash}' => function (array $content) {
                return new ExperianCredential($content);
            },
            'tags' => function (array $content) {
                return new Collection(new Tag(), $content);
            },
            'tags/{tag}' => function (array $content) {
                return new Tag($content);
            },
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return new ArrayIterator($this->builders);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetExists($offset)
    {
        return isset($this->builders[$offset]);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($offset)
    {
        return $this->builders[$offset];
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($offset, $value)
    {
        if (!is_callable($value)) {
            throw new InvalidArgumentException();
        }

        $this->builders[$offset] = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($offset)
    {
        unset($this->builders[$offset]);
    }
}
