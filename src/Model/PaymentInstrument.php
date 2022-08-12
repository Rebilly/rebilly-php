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

abstract class PaymentInstrument implements JsonSerializable
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
            case 'AdvCash':
                return new AlternativeInstrument($data);
            case 'Alfa-click':
                return new AlternativeInstrument($data);
            case 'Alipay':
                return new AlternativeInstrument($data);
            case 'AstroPay Card':
                return new AlternativeInstrument($data);
            case 'AstroPay-GO':
                return new AlternativeInstrument($data);
            case 'Baloto':
                return new AlternativeInstrument($data);
            case 'Bancontact':
                return new AlternativeInstrument($data);
            case 'Bancontact-mobile':
                return new AlternativeInstrument($data);
            case 'BankReferenced':
                return new AlternativeInstrument($data);
            case 'Beeline':
                return new AlternativeInstrument($data);
            case 'Belfius-direct-net':
                return new AlternativeInstrument($data);
            case 'Bizum':
                return new AlternativeInstrument($data);
            case 'Boleto':
                return new AlternativeInstrument($data);
            case 'CASHlib':
                return new AlternativeInstrument($data);
            case 'CODVoucher':
                return new AlternativeInstrument($data);
            case 'CashToCode':
                return new AlternativeInstrument($data);
            case 'China UnionPay':
                return new AlternativeInstrument($data);
            case 'Conekta-oxxo':
                return new AlternativeInstrument($data);
            case 'Cupon-de-pagos':
                return new AlternativeInstrument($data);
            case 'EPS':
                return new AlternativeInstrument($data);
            case 'Efecty':
                return new AlternativeInstrument($data);
            case 'FasterPay':
                return new AlternativeInstrument($data);
            case 'Flexepin':
                return new AlternativeInstrument($data);
            case 'Giropay':
                return new AlternativeInstrument($data);
            case 'Google Pay':
                return new AlternativeInstrument($data);
            case 'Gpaysafe':
                return new AlternativeInstrument($data);
            case 'ING-homepay':
                return new AlternativeInstrument($data);
            case 'INOVAPAY-pin':
                return new AlternativeInstrument($data);
            case 'INOVAPAY-wallet':
                return new AlternativeInstrument($data);
            case 'InstaDebit':
                return new AlternativeInstrument($data);
            case 'Interac':
                return new AlternativeInstrument($data);
            case 'Interac-eTransfer':
                return new AlternativeInstrument($data);
            case 'Interac-online':
                return new AlternativeInstrument($data);
            case 'Jeton':
                return new AlternativeInstrument($data);
            case 'KNOT':
                return new AlternativeInstrument($data);
            case 'Khelocard':
                return new KhelocardCard($data);
            case 'Klarna':
                return new AlternativeInstrument($data);
            case 'MTS':
                return new AlternativeInstrument($data);
            case 'Matrix':
                return new AlternativeInstrument($data);
            case 'MaxiCash':
                return new AlternativeInstrument($data);
            case 'Megafon':
                return new AlternativeInstrument($data);
            case 'MiFinity-eWallet':
                return new AlternativeInstrument($data);
            case 'MuchBetter':
                return new AlternativeInstrument($data);
            case 'Multibanco':
                return new AlternativeInstrument($data);
            case 'Neosurf':
                return new AlternativeInstrument($data);
            case 'Netbanking':
                return new AlternativeInstrument($data);
            case 'Neteller':
                return new AlternativeInstrument($data);
            case 'Nordea-Solo':
                return new AlternativeInstrument($data);
            case 'OXXO':
                return new AlternativeInstrument($data);
            case 'OchaPay':
                return new AlternativeInstrument($data);
            case 'Onlineueberweisen':
                return new AlternativeInstrument($data);
            case 'P24':
                return new AlternativeInstrument($data);
            case 'POLi':
                return new AlternativeInstrument($data);
            case 'Pagadito':
                return new AlternativeInstrument($data);
            case 'PagoEffectivo':
                return new AlternativeInstrument($data);
            case 'Pagsmile-deposit-express':
                return new AlternativeInstrument($data);
            case 'Pagsmile-lottery':
                return new AlternativeInstrument($data);
            case 'Pay4Fun':
                return new AlternativeInstrument($data);
            case 'PayCash':
                return new AlternativeInstrument($data);
            case 'PayTabs':
                return new AlternativeInstrument($data);
            case 'Payeer':
                return new AlternativeInstrument($data);
            case 'PaymentAsia-crypto':
                return new AlternativeInstrument($data);
            case 'Paymero':
                return new AlternativeInstrument($data);
            case 'Paynote':
                return new AlternativeInstrument($data);
            case 'Paysafecard':
                return new AlternativeInstrument($data);
            case 'Paysafecash':
                return new AlternativeInstrument($data);
            case 'Perfect-money':
                return new AlternativeInstrument($data);
            case 'PhonePe':
                return new AlternativeInstrument($data);
            case 'Piastrix':
                return new AlternativeInstrument($data);
            case 'PinPay':
                return new AlternativeInstrument($data);
            case 'PostFinance-card':
                return new AlternativeInstrument($data);
            case 'PostFinance-e-finance':
                return new AlternativeInstrument($data);
            case 'QIWI':
                return new AlternativeInstrument($data);
            case 'QPay':
                return new AlternativeInstrument($data);
            case 'QQPay':
                return new AlternativeInstrument($data);
            case 'Resurs':
                return new AlternativeInstrument($data);
            case 'SEPA':
                return new AlternativeInstrument($data);
            case 'SMSVoucher':
                return new AlternativeInstrument($data);
            case 'Skrill':
                return new AlternativeInstrument($data);
            case 'Skrill Rapid Transfer':
                return new AlternativeInstrument($data);
            case 'Sofort':
                return new AlternativeInstrument($data);
            case 'SparkPay':
                return new AlternativeInstrument($data);
            case 'Tele2':
                return new AlternativeInstrument($data);
            case 'Terminaly-RF':
                return new AlternativeInstrument($data);
            case 'ToditoCash-card':
                return new AlternativeInstrument($data);
            case 'Trustly':
                return new AlternativeInstrument($data);
            case 'UPI':
                return new AlternativeInstrument($data);
            case 'UPayCard':
                return new AlternativeInstrument($data);
            case 'USD-coin':
                return new AlternativeInstrument($data);
            case 'VCreditos':
                return new AlternativeInstrument($data);
            case 'VenusPoint':
                return new AlternativeInstrument($data);
            case 'WeChat Pay':
                return new AlternativeInstrument($data);
            case 'Webmoney':
                return new AlternativeInstrument($data);
            case 'Webpay':
                return new AlternativeInstrument($data);
            case 'Webpay Card':
                return new AlternativeInstrument($data);
            case 'Webpay-2':
                return new AlternativeInstrument($data);
            case 'XPay-P2P':
                return new AlternativeInstrument($data);
            case 'XPay-QR':
                return new AlternativeInstrument($data);
            case 'Yandex-money':
                return new AlternativeInstrument($data);
            case 'Zimpler':
                return new AlternativeInstrument($data);
            case 'Zotapay':
                return new AlternativeInstrument($data);
            case 'ach':
                return new BankAccount($data);
            case 'bank-transfer':
                return new AlternativeInstrument($data);
            case 'bank-transfer-2':
                return new AlternativeInstrument($data);
            case 'bank-transfer-3':
                return new AlternativeInstrument($data);
            case 'bank-transfer-4':
                return new AlternativeInstrument($data);
            case 'bank-transfer-5':
                return new AlternativeInstrument($data);
            case 'bank-transfer-6':
                return new AlternativeInstrument($data);
            case 'bank-transfer-7':
                return new AlternativeInstrument($data);
            case 'bank-transfer-8':
                return new AlternativeInstrument($data);
            case 'bank-transfer-9':
                return new AlternativeInstrument($data);
            case 'bitcoin':
                return new AlternativeInstrument($data);
            case 'cash':
                return new AlternativeInstrument($data);
            case 'cash-deposit':
                return new AlternativeInstrument($data);
            case 'check':
                return new AlternativeInstrument($data);
            case 'cryptocurrency':
                return new AlternativeInstrument($data);
            case 'domestic-cards':
                return new AlternativeInstrument($data);
            case 'ePay.bg':
                return new AlternativeInstrument($data);
            case 'eZeeWallet':
                return new AlternativeInstrument($data);
            case 'ecoPayz':
                return new AlternativeInstrument($data);
            case 'ecoVoucher':
                return new AlternativeInstrument($data);
            case 'iDEAL':
                return new AlternativeInstrument($data);
            case 'iDebit':
                return new AlternativeInstrument($data);
            case 'iWallet':
                return new AlternativeInstrument($data);
            case 'instant-bank-transfer':
                return new AlternativeInstrument($data);
            case 'invoice':
                return new AlternativeInstrument($data);
            case 'jpay':
                return new AlternativeInstrument($data);
            case 'loonie':
                return new AlternativeInstrument($data);
            case 'miscellaneous':
                return new AlternativeInstrument($data);
            case 'online-bank-transfer':
                return new AlternativeInstrument($data);
            case 'oriental-wallet':
                return new AlternativeInstrument($data);
            case 'payment-card':
                return new PaymentCard($data);
            case 'paypal':
                return new PayPalAccount($data);
            case 'phone':
                return new AlternativeInstrument($data);
            case 'plaid-account':
                return new AlternativeInstrument($data);
            case 'rapyd-checkout':
                return new AlternativeInstrument($data);
            case 'swift-dbt':
                return new AlternativeInstrument($data);
            case 'voucher':
                return new AlternativeInstrument($data);
            case 'voucher-2':
                return new AlternativeInstrument($data);
            case 'voucher-3':
                return new AlternativeInstrument($data);
            case 'voucher-4':
                return new AlternativeInstrument($data);
        }

        throw new InvalidArgumentException("Unsupported method value: '{$data['method']}'");
    }

    public function getMethod(): mixed
    {
        return $this->fields['method'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method'];
        }

        return $data;
    }

    private function setMethod(mixed $method): self
    {
        $this->fields['method'] = $method;

        return $this;
    }
}
