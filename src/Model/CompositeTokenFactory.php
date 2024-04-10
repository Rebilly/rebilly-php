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

class CompositeTokenFactory
{
    public static function from(array $data = []): CompositeToken
    {
        return match ($data['method']) {
            'AdvCash' => AlternativePaymentToken::from($data),
            'Alfa-click' => AlternativePaymentToken::from($data),
            'Alipay' => AlternativePaymentToken::from($data),
            'AstroPay Card' => AlternativePaymentToken::from($data),
            'AstroPay-GO' => AlternativePaymentToken::from($data),
            'Baloto' => AlternativePaymentToken::from($data),
            'Bancontact' => AlternativePaymentToken::from($data),
            'Bancontact-mobile' => AlternativePaymentToken::from($data),
            'BankReferenced' => AlternativePaymentToken::from($data),
            'Beeline' => AlternativePaymentToken::from($data),
            'Belfius-direct-net' => AlternativePaymentToken::from($data),
            'Bizum' => AlternativePaymentToken::from($data),
            'Boleto' => AlternativePaymentToken::from($data),
            'CASHlib' => AlternativePaymentToken::from($data),
            'CODVoucher' => AlternativePaymentToken::from($data),
            'CashToCode' => AlternativePaymentToken::from($data),
            'China UnionPay' => AlternativePaymentToken::from($data),
            'Cleo' => AlternativePaymentToken::from($data),
            'Conekta-oxxo' => AlternativePaymentToken::from($data),
            'Cupon-de-pagos' => AlternativePaymentToken::from($data),
            'EPS' => AlternativePaymentToken::from($data),
            'Efecty' => AlternativePaymentToken::from($data),
            'FasterPay' => AlternativePaymentToken::from($data),
            'Flexepin' => AlternativePaymentToken::from($data),
            'Giropay' => AlternativePaymentToken::from($data),
            'Google Pay' => AlternativePaymentToken::from($data),
            'Gpaysafe' => AlternativePaymentToken::from($data),
            'ING-homepay' => AlternativePaymentToken::from($data),
            'INOVAPAY-pin' => AlternativePaymentToken::from($data),
            'INOVAPAY-wallet' => AlternativePaymentToken::from($data),
            'InstaDebit' => AlternativePaymentToken::from($data),
            'InstantPayments' => AlternativePaymentToken::from($data),
            'Interac' => AlternativePaymentToken::from($data),
            'Interac-eTransfer' => AlternativePaymentToken::from($data),
            'Interac-online' => AlternativePaymentToken::from($data),
            'Jeton' => AlternativePaymentToken::from($data),
            'KNOT' => AlternativePaymentToken::from($data),
            'MTS' => AlternativePaymentToken::from($data),
            'Matrix' => AlternativePaymentToken::from($data),
            'MaxiCash' => AlternativePaymentToken::from($data),
            'Megafon' => AlternativePaymentToken::from($data),
            'MiFinity-eWallet' => AlternativePaymentToken::from($data),
            'MuchBetter' => AlternativePaymentToken::from($data),
            'Multibanco' => AlternativePaymentToken::from($data),
            'Neosurf' => AlternativePaymentToken::from($data),
            'Netbanking' => AlternativePaymentToken::from($data),
            'Neteller' => AlternativePaymentToken::from($data),
            'Nordea-Solo' => AlternativePaymentToken::from($data),
            'OXXO' => AlternativePaymentToken::from($data),
            'OchaPay' => AlternativePaymentToken::from($data),
            'Onlineueberweisen' => AlternativePaymentToken::from($data),
            'P24' => AlternativePaymentToken::from($data),
            'POLi' => AlternativePaymentToken::from($data),
            'Pagadito' => AlternativePaymentToken::from($data),
            'PagoEffectivo' => AlternativePaymentToken::from($data),
            'Pagsmile-deposit-express' => AlternativePaymentToken::from($data),
            'Pagsmile-lottery' => AlternativePaymentToken::from($data),
            'Pay4Fun' => AlternativePaymentToken::from($data),
            'PayCash' => AlternativePaymentToken::from($data),
            'PayTabs' => AlternativePaymentToken::from($data),
            'Payeer' => AlternativePaymentToken::from($data),
            'PaymentAsia-crypto' => AlternativePaymentToken::from($data),
            'Paymero' => AlternativePaymentToken::from($data),
            'Paynote' => AlternativePaymentToken::from($data),
            'Paysafecard' => AlternativePaymentToken::from($data),
            'Paysafecash' => AlternativePaymentToken::from($data),
            'Perfect-money' => AlternativePaymentToken::from($data),
            'PhonePe' => AlternativePaymentToken::from($data),
            'Piastrix' => AlternativePaymentToken::from($data),
            'PinPay' => AlternativePaymentToken::from($data),
            'PostFinance-card' => AlternativePaymentToken::from($data),
            'PostFinance-e-finance' => AlternativePaymentToken::from($data),
            'QIWI' => AlternativePaymentToken::from($data),
            'QPay' => AlternativePaymentToken::from($data),
            'QQPay' => AlternativePaymentToken::from($data),
            'Resurs' => AlternativePaymentToken::from($data),
            'SEPA' => AlternativePaymentToken::from($data),
            'SMSVoucher' => AlternativePaymentToken::from($data),
            'SafetyPay' => AlternativePaymentToken::from($data),
            'Skrill' => AlternativePaymentToken::from($data),
            'Skrill Rapid Transfer' => AlternativePaymentToken::from($data),
            'Sofort' => AlternativePaymentToken::from($data),
            'SparkPay' => AlternativePaymentToken::from($data),
            'Tele2' => AlternativePaymentToken::from($data),
            'Terminaly-RF' => AlternativePaymentToken::from($data),
            'ToditoCash-card' => AlternativePaymentToken::from($data),
            'Trustly' => AlternativePaymentToken::from($data),
            'UPI' => AlternativePaymentToken::from($data),
            'UPayCard' => AlternativePaymentToken::from($data),
            'USD-coin' => AlternativePaymentToken::from($data),
            'VCreditos' => AlternativePaymentToken::from($data),
            'VenusPoint' => AlternativePaymentToken::from($data),
            'WeChat Pay' => AlternativePaymentToken::from($data),
            'Webmoney' => AlternativePaymentToken::from($data),
            'Webpay' => AlternativePaymentToken::from($data),
            'Webpay Card' => AlternativePaymentToken::from($data),
            'Webpay-2' => AlternativePaymentToken::from($data),
            'XPay-P2P' => AlternativePaymentToken::from($data),
            'XPay-QR' => AlternativePaymentToken::from($data),
            'Yandex-money' => AlternativePaymentToken::from($data),
            'Zimpler' => AlternativePaymentToken::from($data),
            'Zotapay' => AlternativePaymentToken::from($data),
            'bank-transfer' => AlternativePaymentToken::from($data),
            'bank-transfer-2' => AlternativePaymentToken::from($data),
            'bank-transfer-3' => AlternativePaymentToken::from($data),
            'bank-transfer-4' => AlternativePaymentToken::from($data),
            'bank-transfer-5' => AlternativePaymentToken::from($data),
            'bank-transfer-6' => AlternativePaymentToken::from($data),
            'bank-transfer-7' => AlternativePaymentToken::from($data),
            'bank-transfer-8' => AlternativePaymentToken::from($data),
            'bank-transfer-9' => AlternativePaymentToken::from($data),
            'bitcoin' => AlternativePaymentToken::from($data),
            'cash' => AlternativePaymentToken::from($data),
            'cash-deposit' => AlternativePaymentToken::from($data),
            'check' => AlternativePaymentToken::from($data),
            'cryptocurrency' => AlternativePaymentToken::from($data),
            'domestic-cards' => AlternativePaymentToken::from($data),
            'ePay.bg' => AlternativePaymentToken::from($data),
            'eZeeWallet' => AlternativePaymentToken::from($data),
            'ecoPayz' => AlternativePaymentToken::from($data),
            'ecoVoucher' => AlternativePaymentToken::from($data),
            'iDEAL' => AlternativePaymentToken::from($data),
            'iDebit' => AlternativePaymentToken::from($data),
            'iWallet' => AlternativePaymentToken::from($data),
            'instant-bank-transfer' => AlternativePaymentToken::from($data),
            'invoice' => AlternativePaymentToken::from($data),
            'jpay' => AlternativePaymentToken::from($data),
            'loonie' => AlternativePaymentToken::from($data),
            'miscellaneous' => AlternativePaymentToken::from($data),
            'online-bank-transfer' => AlternativePaymentToken::from($data),
            'oriental-wallet' => AlternativePaymentToken::from($data),
            'phone' => AlternativePaymentToken::from($data),
            'rapyd-checkout' => AlternativePaymentToken::from($data),
            'swift-dbt' => AlternativePaymentToken::from($data),
            'voucher' => AlternativePaymentToken::from($data),
            'voucher-2' => AlternativePaymentToken::from($data),
            'voucher-3' => AlternativePaymentToken::from($data),
            'voucher-4' => AlternativePaymentToken::from($data),
            'ach' => BankAccountToken::from($data),
            'echeck' => BankAccountToken::from($data),
            'digital-wallet' => DigitalWalletToken::from($data),
            'Khelocard' => KhelocardCardToken::from($data),
            'Klarna' => KlarnaToken::from($data),
            'payment-card' => PaymentCardToken::from($data),
            'paypal' => PayPalToken::from($data),
            'plaid-account' => PlaidAccountToken::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
