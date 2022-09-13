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

abstract class ReadyToPayMethods implements JsonSerializable
{
    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
    }

    public static function from(array $data = []): self
    {
        switch ($data['method']) {
            case 'ach':
                return new ReadyToPayAchMethod($data);
            case 'Klarna':
                return new ReadyToPayKlarnaMethod($data);
            case 'paypal':
                return new ReadyToPayPayPalMethod($data);
            case 'payment-card':
                return new ReadyToPayPaymentCardMethod($data);
            case 'Pagsmile-deposit-express':
            case 'Bancontact':
            case 'ecoPayz':
            case 'Giropay':
            case 'Pagadito':
            case 'EPS':
            case 'Pay4Fun':
            case 'Paymero':
            case 'Zotapay':
            case 'UPI':
            case 'XPay-P2P':
            case 'plaid-account':
            case 'AstroPay-GO':
            case 'SparkPay':
            case 'Matrix':
            case 'ING-homepay':
            case 'Bizum':
            case 'iDebit':
            case 'Paysafecash':
            case 'cash':
            case 'Beeline':
            case 'MuchBetter':
            case 'Multibanco':
            case 'Paynote':
            case 'Interac':
            case 'Baloto':
            case 'phone':
            case 'Pagsmile-lottery':
            case 'Interac-online':
            case 'echeck':
            case 'INOVAPAY-pin':
            case 'miscellaneous':
            case 'Resurs':
            case 'VenusPoint':
            case 'Boleto':
            case 'PostFinance-e-finance':
            case 'CashToCode':
            case 'Netbanking':
            case 'Payeer':
            case 'PhonePe':
            case 'Jeton':
            case 'instant-bank-transfer':
            case 'Neosurf':
            case 'PostFinance-card':
            case 'Alipay':
            case 'Piastrix':
            case 'cash-deposit':
            case 'Bancontact-mobile':
            case 'SafetyPay':
            case 'Tele2':
            case 'Perfect-money':
            case 'Khelocard':
            case 'Onlineueberweisen':
            case 'Belfius-direct-net':
            case 'VCreditos':
            case 'Efecty':
            case 'PayTabs':
            case 'Yandex-money':
            case 'oriental-wallet':
            case 'Paysafecard':
            case 'Webpay-2':
            case 'Google Pay':
            case 'Flexepin':
            case 'Interac-eTransfer':
            case 'Trustly':
            case 'Megafon':
            case 'USD-coin':
            case 'OXXO':
            case 'voucher':
            case 'rapyd-checkout':
            case 'MTS':
            case 'PinPay':
            case 'Neteller':
            case 'CASHlib':
            case 'INOVAPAY-wallet':
            case 'P24':
            case 'bank-transfer':
            case 'FasterPay':
            case 'Skrill Rapid Transfer':
            case 'OchaPay':
            case 'PayCash':
            case 'Gpaysafe':
            case 'swift-dbt':
            case 'Conekta-oxxo':
            case 'loonie':
            case 'PaymentAsia-crypto':
            case 'Alfa-click':
            case 'Sofort':
            case 'ecoVoucher':
            case 'WeChat Pay':
            case 'KNOT':
            case 'check':
            case 'Cupon-de-pagos':
            case 'Nordea-Solo':
            case 'iWallet':
            case 'cryptocurrency':
            case 'CODVoucher':
            case 'QPay':
            case 'iDEAL':
            case 'China UnionPay':
            case 'InstaDebit':
            case 'ToditoCash-card':
            case 'online-bank-transfer':
            case 'UPayCard':
            case 'Webmoney':
            case 'Webpay':
            case 'QIWI':
            case 'jpay':
            case 'bank-transfer-3':
            case 'bank-transfer-4':
            case 'Cleo':
            case 'bank-transfer-2':
            case 'Skrill':
            case 'bank-transfer-7':
            case 'bank-transfer-8':
            case 'bank-transfer-5':
            case 'bank-transfer-6':
            case 'bank-transfer-9':
            case 'MaxiCash':
            case 'AdvCash':
            case 'Webpay Card':
            case 'SEPA':
            case 'BankReferenced':
            case 'XPay-QR':
            case 'voucher-4':
            case 'domestic-cards':
            case 'voucher-3':
            case 'AstroPay Card':
            case 'voucher-2':
            case 'Terminaly-RF':
            case 'SMSVoucher':
            case 'QQPay':
            case 'Zimpler':
            case 'ePay.bg':
            case 'POLi':
            case 'invoice':
            case 'MiFinity-eWallet':
            case 'PagoEffectivo':
            case 'eZeeWallet':
            case 'bitcoin':
                return new ReadyToPayGenericMethod($data);
        }

        throw new InvalidArgumentException("Unsupported method value: '{$data['method']}'");
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method'];
        }

        return $data;
    }
}
