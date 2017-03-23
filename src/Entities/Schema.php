<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities;

use ArrayIterator;
use ArrayAccess;
use InvalidArgumentException;
use IteratorAggregate;
use Rebilly\Entities\Coupons\Coupon;
use Rebilly\Entities\Coupons\Redemption;
use Rebilly\Entities\Shipping\ShippingZone;
use Rebilly\Rest\Collection;

/**
 * Class Schema.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
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
            'contacts' => function (array $content) {
                return new Collection(new Contact(), $content);
            },
            'contacts/{contactId}' => function (array $content) {
                return new Contact($content);
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
            'layouts' => function (array $content) {
                return new Collection(new Layout(), $content);
            },
            'layouts/{layoutId}' => function (array $content) {
                return new Layout($content);
            },
            'subscriptions' => function (array $content) {
                return new Collection(new Subscription(), $content);
            },
            'subscriptions/{subscriptionId}' => function (array $content) {
                return new Subscription($content);
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
                return new Collection(new PaymentCardToken(), $content);
            },
            'tokens/{tokenId}' => function (array $content) {
                return new PaymentCardToken($content);
            },
            'payments' => function (array $content) {
                return new Collection(new Payment(), $content);
            },
            'payments/{id}' => function (array $content) {
                return new Payment($content);
            },
            'payments/{id}/lead-source' => function (array $content) {
                return new LeadSource($content);
            },
            'transactions' => function (array $content) {
                return new Collection(new Transaction(), $content);
            },
            'transactions/{transactionId}' => function (array $content) {
                return new Transaction($content);
            },
            'queue/payments' => function (array $content) {
                return new Collection(new ScheduledPayment(), $content);
            },
            'queue/payments/{paymentId}' => function (array $content) {
                return new ScheduledPayment($content);
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
            'notes' => function (array $content) {
                return new Collection(new Note(), $content);
            },
            'notes/{noteId}' => function (array $content) {
                return new Note($content);
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
            'sessions' => function (array $content) {
                return new Collection(new Session(), $content);
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
            'tracking/website-webhooks' => function (array $content) {
                return new Collection(new WebsiteWebhookTracking(), $content);
            },
            'tracking/website-webhooks/{trackId}' => function (array $content) {
                return new WebsiteWebhookTracking($content);
            },
            'api-keys' => function (array $content) {
                return new Collection(new ApiKey(), $content);
            },
            'api-keys/{apiKeyId}' => function (array $content) {
                return new ApiKey($content);
            },
            'checkout-pages' => function (array $content) {
                return new Collection(new CheckoutPage(), $content);
            },
            'checkout-pages/{checkoutPageId}' => function (array $content) {
                return new CheckoutPage($content);
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
            'payment-cards-migrations/migrate' => function (array $content) {
                return new PaymentCardMigrationsResponse($content);
            },
            'payment-cards-migrations' => function (array $content) {
                return new Collection(new PaymentCard(), $content);
            },
            'coupons' => function (array $content) {
                return new Collection(new Coupon(), $content);
            },
            'coupons/{redemptionCode}' => function (array $content) {
                return new Coupon($content);
            },
            'coupons-redemptions' => function (array $content) {
                return new Collection(new Redemption(), $content);
            },
            'coupons-redemptions/{redemptionId}' => function (array $content) {
                return new Redemption($content);
            },
            'websites/{websiteId}/webhook' => function (array $content) {
                return new WebsiteWebhook($content);
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
