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

use InvalidArgumentException;
use JsonSerializable;

abstract class AdjustPaymentMethod implements JsonSerializable
{
    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('paymentMethod', $data)) {
            $this->setPaymentMethod($data['paymentMethod']);
        }
        if (array_key_exists('feature', $data)) {
            $this->setFeature($data['feature']);
        }
    }

    public static function from(array $data = []): self
    {
        switch ($data['paymentMethod']) {
            case 'AdvCash':
                return new AdjustReadyToPayGeneric($data);
            case 'Alfa-click':
                return new AdjustReadyToPayGeneric($data);
            case 'Alipay':
                return new AdjustReadyToPayGeneric($data);
            case 'AstroPay Card':
                return new AdjustReadyToPayGeneric($data);
            case 'AstroPay-GO':
                return new AdjustReadyToPayGeneric($data);
            case 'Baloto':
                return new AdjustReadyToPayGeneric($data);
            case 'Bancontact':
                return new AdjustReadyToPayGeneric($data);
            case 'Bancontact-mobile':
                return new AdjustReadyToPayGeneric($data);
            case 'BankReferenced':
                return new AdjustReadyToPayGeneric($data);
            case 'Beeline':
                return new AdjustReadyToPayGeneric($data);
            case 'Belfius-direct-net':
                return new AdjustReadyToPayGeneric($data);
            case 'Bizum':
                return new AdjustReadyToPayGeneric($data);
            case 'Boleto':
                return new AdjustReadyToPayGeneric($data);
            case 'CASHlib':
                return new AdjustReadyToPayGeneric($data);
            case 'CODVoucher':
                return new AdjustReadyToPayGeneric($data);
            case 'CashToCode':
                return new AdjustReadyToPayGeneric($data);
            case 'China UnionPay':
                return new AdjustReadyToPayGeneric($data);
            case 'Conekta-oxxo':
                return new AdjustReadyToPayGeneric($data);
            case 'Cupon-de-pagos':
                return new AdjustReadyToPayGeneric($data);
            case 'EPS':
                return new AdjustReadyToPayGeneric($data);
            case 'Efecty':
                return new AdjustReadyToPayGeneric($data);
            case 'FasterPay':
                return new AdjustReadyToPayGeneric($data);
            case 'Flexepin':
                return new AdjustReadyToPayGeneric($data);
            case 'Giropay':
                return new AdjustReadyToPayGeneric($data);
            case 'Google Pay':
                return new AdjustReadyToPayGeneric($data);
            case 'Gpaysafe':
                return new AdjustReadyToPayGeneric($data);
            case 'ING-homepay':
                return new AdjustReadyToPayGeneric($data);
            case 'INOVAPAY-pin':
                return new AdjustReadyToPayGeneric($data);
            case 'INOVAPAY-wallet':
                return new AdjustReadyToPayGeneric($data);
            case 'InstaDebit':
                return new AdjustReadyToPayGeneric($data);
            case 'Interac':
                return new AdjustReadyToPayGeneric($data);
            case 'Interac-eTransfer':
                return new AdjustReadyToPayGeneric($data);
            case 'Interac-online':
                return new AdjustReadyToPayGeneric($data);
            case 'Jeton':
                return new AdjustReadyToPayGeneric($data);
            case 'KNOT':
                return new AdjustReadyToPayGeneric($data);
            case 'Khelocard':
                return new AdjustReadyToPayGeneric($data);
            case 'Klarna':
                return new AdjustReadyToPayGeneric($data);
            case 'MTS':
                return new AdjustReadyToPayGeneric($data);
            case 'Matrix':
                return new AdjustReadyToPayGeneric($data);
            case 'MaxiCash':
                return new AdjustReadyToPayGeneric($data);
            case 'Megafon':
                return new AdjustReadyToPayGeneric($data);
            case 'MiFinity-eWallet':
                return new AdjustReadyToPayGeneric($data);
            case 'MuchBetter':
                return new AdjustReadyToPayGeneric($data);
            case 'Multibanco':
                return new AdjustReadyToPayGeneric($data);
            case 'Neosurf':
                return new AdjustReadyToPayGeneric($data);
            case 'Netbanking':
                return new AdjustReadyToPayGeneric($data);
            case 'Neteller':
                return new AdjustReadyToPayGeneric($data);
            case 'Nordea-Solo':
                return new AdjustReadyToPayGeneric($data);
            case 'OXXO':
                return new AdjustReadyToPayGeneric($data);
            case 'OchaPay':
                return new AdjustReadyToPayGeneric($data);
            case 'Onlineueberweisen':
                return new AdjustReadyToPayGeneric($data);
            case 'P24':
                return new AdjustReadyToPayGeneric($data);
            case 'POLi':
                return new AdjustReadyToPayGeneric($data);
            case 'Pagadito':
                return new AdjustReadyToPayGeneric($data);
            case 'PagoEffectivo':
                return new AdjustReadyToPayGeneric($data);
            case 'Pagsmile-deposit-express':
                return new AdjustReadyToPayGeneric($data);
            case 'Pagsmile-lottery':
                return new AdjustReadyToPayGeneric($data);
            case 'Pay4Fun':
                return new AdjustReadyToPayGeneric($data);
            case 'PayCash':
                return new AdjustReadyToPayGeneric($data);
            case 'PayTabs':
                return new AdjustReadyToPayGeneric($data);
            case 'Payeer':
                return new AdjustReadyToPayGeneric($data);
            case 'PaymentAsia-crypto':
                return new AdjustReadyToPayGeneric($data);
            case 'Paymero':
                return new AdjustReadyToPayGeneric($data);
            case 'Paynote':
                return new AdjustReadyToPayGeneric($data);
            case 'Paysafecard':
                return new AdjustReadyToPayGeneric($data);
            case 'Paysafecash':
                return new AdjustReadyToPayGeneric($data);
            case 'Perfect-money':
                return new AdjustReadyToPayGeneric($data);
            case 'PhonePe':
                return new AdjustReadyToPayGeneric($data);
            case 'Piastrix':
                return new AdjustReadyToPayGeneric($data);
            case 'PinPay':
                return new AdjustReadyToPayGeneric($data);
            case 'PostFinance-card':
                return new AdjustReadyToPayGeneric($data);
            case 'PostFinance-e-finance':
                return new AdjustReadyToPayGeneric($data);
            case 'QIWI':
                return new AdjustReadyToPayGeneric($data);
            case 'QPay':
                return new AdjustReadyToPayGeneric($data);
            case 'QQPay':
                return new AdjustReadyToPayGeneric($data);
            case 'Resurs':
                return new AdjustReadyToPayGeneric($data);
            case 'SEPA':
                return new AdjustReadyToPayGeneric($data);
            case 'SMSVoucher':
                return new AdjustReadyToPayGeneric($data);
            case 'Skrill':
                return new AdjustReadyToPayGeneric($data);
            case 'Skrill Rapid Transfer':
                return new AdjustReadyToPayGeneric($data);
            case 'Sofort':
                return new AdjustReadyToPayGeneric($data);
            case 'SparkPay':
                return new AdjustReadyToPayGeneric($data);
            case 'Tele2':
                return new AdjustReadyToPayGeneric($data);
            case 'Terminaly-RF':
                return new AdjustReadyToPayGeneric($data);
            case 'ToditoCash-card':
                return new AdjustReadyToPayGeneric($data);
            case 'Trustly':
                return new AdjustReadyToPayGeneric($data);
            case 'UPI':
                return new AdjustReadyToPayGeneric($data);
            case 'UPayCard':
                return new AdjustReadyToPayGeneric($data);
            case 'USD-coin':
                return new AdjustReadyToPayGeneric($data);
            case 'VCreditos':
                return new AdjustReadyToPayGeneric($data);
            case 'VenusPoint':
                return new AdjustReadyToPayGeneric($data);
            case 'WeChat Pay':
                return new AdjustReadyToPayGeneric($data);
            case 'Webmoney':
                return new AdjustReadyToPayGeneric($data);
            case 'Webpay':
                return new AdjustReadyToPayGeneric($data);
            case 'Webpay Card':
                return new AdjustReadyToPayGeneric($data);
            case 'Webpay-2':
                return new AdjustReadyToPayGeneric($data);
            case 'XPay-P2P':
                return new AdjustReadyToPayGeneric($data);
            case 'XPay-QR':
                return new AdjustReadyToPayGeneric($data);
            case 'Yandex-money':
                return new AdjustReadyToPayGeneric($data);
            case 'Zimpler':
                return new AdjustReadyToPayGeneric($data);
            case 'Zotapay':
                return new AdjustReadyToPayGeneric($data);
            case 'ach':
                return new AdjustReadyToPayAch($data);
            case 'bank-transfer':
                return new AdjustReadyToPayGeneric($data);
            case 'bank-transfer-2':
                return new AdjustReadyToPayGeneric($data);
            case 'bank-transfer-3':
                return new AdjustReadyToPayGeneric($data);
            case 'bank-transfer-4':
                return new AdjustReadyToPayGeneric($data);
            case 'bank-transfer-5':
                return new AdjustReadyToPayGeneric($data);
            case 'bank-transfer-6':
                return new AdjustReadyToPayGeneric($data);
            case 'bank-transfer-7':
                return new AdjustReadyToPayGeneric($data);
            case 'bank-transfer-8':
                return new AdjustReadyToPayGeneric($data);
            case 'bank-transfer-9':
                return new AdjustReadyToPayGeneric($data);
            case 'bitcoin':
                return new AdjustReadyToPayGeneric($data);
            case 'cash':
                return new AdjustReadyToPayGeneric($data);
            case 'cash-deposit':
                return new AdjustReadyToPayGeneric($data);
            case 'check':
                return new AdjustReadyToPayGeneric($data);
            case 'cryptocurrency':
                return new AdjustReadyToPayGeneric($data);
            case 'domestic-cards':
                return new AdjustReadyToPayGeneric($data);
            case 'ePay.bg':
                return new AdjustReadyToPayGeneric($data);
            case 'eZeeWallet':
                return new AdjustReadyToPayGeneric($data);
            case 'echeck':
                return new AdjustReadyToPayGeneric($data);
            case 'ecoPayz':
                return new AdjustReadyToPayGeneric($data);
            case 'ecoVoucher':
                return new AdjustReadyToPayGeneric($data);
            case 'iDEAL':
                return new AdjustReadyToPayGeneric($data);
            case 'iDebit':
                return new AdjustReadyToPayGeneric($data);
            case 'iWallet':
                return new AdjustReadyToPayGeneric($data);
            case 'instant-bank-transfer':
                return new AdjustReadyToPayGeneric($data);
            case 'invoice':
                return new AdjustReadyToPayGeneric($data);
            case 'jpay':
                return new AdjustReadyToPayGeneric($data);
            case 'loonie':
                return new AdjustReadyToPayGeneric($data);
            case 'miscellaneous':
                return new AdjustReadyToPayGeneric($data);
            case 'online-bank-transfer':
                return new AdjustReadyToPayGeneric($data);
            case 'oriental-wallet':
                return new AdjustReadyToPayGeneric($data);
            case 'payment-card':
                return new AdjustReadyToPayPaymentCard($data);
            case 'paypal':
                return new AdjustReadyToPayPaypal($data);
            case 'phone':
                return new AdjustReadyToPayGeneric($data);
            case 'plaid-account':
                return new AdjustReadyToPayGeneric($data);
            case 'rapyd-checkout':
                return new AdjustReadyToPayGeneric($data);
            case 'swift-dbt':
                return new AdjustReadyToPayGeneric($data);
            case 'voucher':
                return new AdjustReadyToPayGeneric($data);
            case 'voucher-2':
                return new AdjustReadyToPayGeneric($data);
            case 'voucher-3':
                return new AdjustReadyToPayGeneric($data);
            case 'voucher-4':
                return new AdjustReadyToPayGeneric($data);
        }

        throw new InvalidArgumentException("Unsupported paymentMethod value: '{$data['paymentMethod']}'");
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('paymentMethod', $this->fields)) {
            $data['paymentMethod'] = $this->fields['paymentMethod'];
        }
        if (array_key_exists('feature', $this->fields)) {
            $data['feature'] = $this->fields['feature'];
        }

        return $data;
    }
}
