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

abstract class CompositeToken extends CommonPaymentToken
{
    private array $fields = [];

    protected function __construct(array $data = [])
    {
        parent::__construct($data);

        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
    }

    public static function from(array $data = []): self
    {
        switch ($data['method']) {
            case 'AdvCash':
                return new AlternativePaymentToken($data);
            case 'Alfa-click':
                return new AlternativePaymentToken($data);
            case 'Alipay':
                return new AlternativePaymentToken($data);
            case 'AstroPay Card':
                return new AlternativePaymentToken($data);
            case 'AstroPay-GO':
                return new AlternativePaymentToken($data);
            case 'Baloto':
                return new AlternativePaymentToken($data);
            case 'Bancontact':
                return new AlternativePaymentToken($data);
            case 'Bancontact-mobile':
                return new AlternativePaymentToken($data);
            case 'BankReferenced':
                return new AlternativePaymentToken($data);
            case 'Beeline':
                return new AlternativePaymentToken($data);
            case 'Belfius-direct-net':
                return new AlternativePaymentToken($data);
            case 'Bizum':
                return new AlternativePaymentToken($data);
            case 'Boleto':
                return new AlternativePaymentToken($data);
            case 'CASHlib':
                return new AlternativePaymentToken($data);
            case 'CODVoucher':
                return new AlternativePaymentToken($data);
            case 'CashToCode':
                return new AlternativePaymentToken($data);
            case 'China UnionPay':
                return new AlternativePaymentToken($data);
            case 'Conekta-oxxo':
                return new AlternativePaymentToken($data);
            case 'Cupon-de-pagos':
                return new AlternativePaymentToken($data);
            case 'EPS':
                return new AlternativePaymentToken($data);
            case 'Efecty':
                return new AlternativePaymentToken($data);
            case 'FasterPay':
                return new AlternativePaymentToken($data);
            case 'Flexepin':
                return new AlternativePaymentToken($data);
            case 'Giropay':
                return new AlternativePaymentToken($data);
            case 'Google Pay':
                return new AlternativePaymentToken($data);
            case 'Gpaysafe':
                return new AlternativePaymentToken($data);
            case 'ING-homepay':
                return new AlternativePaymentToken($data);
            case 'INOVAPAY-pin':
                return new AlternativePaymentToken($data);
            case 'INOVAPAY-wallet':
                return new AlternativePaymentToken($data);
            case 'InstaDebit':
                return new AlternativePaymentToken($data);
            case 'Interac':
                return new AlternativePaymentToken($data);
            case 'Interac-eTransfer':
                return new AlternativePaymentToken($data);
            case 'Interac-online':
                return new AlternativePaymentToken($data);
            case 'Jeton':
                return new AlternativePaymentToken($data);
            case 'KNOT':
                return new AlternativePaymentToken($data);
            case 'Khelocard':
                return new KhelocardCardToken($data);
            case 'Klarna':
                return new KlarnaToken($data);
            case 'MTS':
                return new AlternativePaymentToken($data);
            case 'Matrix':
                return new AlternativePaymentToken($data);
            case 'MaxiCash':
                return new AlternativePaymentToken($data);
            case 'Megafon':
                return new AlternativePaymentToken($data);
            case 'MiFinity-eWallet':
                return new AlternativePaymentToken($data);
            case 'MuchBetter':
                return new AlternativePaymentToken($data);
            case 'Multibanco':
                return new AlternativePaymentToken($data);
            case 'Neosurf':
                return new AlternativePaymentToken($data);
            case 'Netbanking':
                return new AlternativePaymentToken($data);
            case 'Neteller':
                return new AlternativePaymentToken($data);
            case 'Nordea-Solo':
                return new AlternativePaymentToken($data);
            case 'OXXO':
                return new AlternativePaymentToken($data);
            case 'OchaPay':
                return new AlternativePaymentToken($data);
            case 'Onlineueberweisen':
                return new AlternativePaymentToken($data);
            case 'P24':
                return new AlternativePaymentToken($data);
            case 'POLi':
                return new AlternativePaymentToken($data);
            case 'Pagadito':
                return new AlternativePaymentToken($data);
            case 'PagoEffectivo':
                return new AlternativePaymentToken($data);
            case 'Pagsmile-deposit-express':
                return new AlternativePaymentToken($data);
            case 'Pagsmile-lottery':
                return new AlternativePaymentToken($data);
            case 'Pay4Fun':
                return new AlternativePaymentToken($data);
            case 'PayCash':
                return new AlternativePaymentToken($data);
            case 'PayTabs':
                return new AlternativePaymentToken($data);
            case 'Payeer':
                return new AlternativePaymentToken($data);
            case 'PaymentAsia-crypto':
                return new AlternativePaymentToken($data);
            case 'Paymero':
                return new AlternativePaymentToken($data);
            case 'Paynote':
                return new AlternativePaymentToken($data);
            case 'Paysafecard':
                return new AlternativePaymentToken($data);
            case 'Paysafecash':
                return new AlternativePaymentToken($data);
            case 'Perfect-money':
                return new AlternativePaymentToken($data);
            case 'PhonePe':
                return new AlternativePaymentToken($data);
            case 'Piastrix':
                return new AlternativePaymentToken($data);
            case 'PinPay':
                return new AlternativePaymentToken($data);
            case 'PostFinance-card':
                return new AlternativePaymentToken($data);
            case 'PostFinance-e-finance':
                return new AlternativePaymentToken($data);
            case 'QIWI':
                return new AlternativePaymentToken($data);
            case 'QPay':
                return new AlternativePaymentToken($data);
            case 'QQPay':
                return new AlternativePaymentToken($data);
            case 'Resurs':
                return new AlternativePaymentToken($data);
            case 'SEPA':
                return new AlternativePaymentToken($data);
            case 'SMSVoucher':
                return new AlternativePaymentToken($data);
            case 'Skrill':
                return new AlternativePaymentToken($data);
            case 'Skrill Rapid Transfer':
                return new AlternativePaymentToken($data);
            case 'Sofort':
                return new AlternativePaymentToken($data);
            case 'SparkPay':
                return new AlternativePaymentToken($data);
            case 'Tele2':
                return new AlternativePaymentToken($data);
            case 'Terminaly-RF':
                return new AlternativePaymentToken($data);
            case 'ToditoCash-card':
                return new AlternativePaymentToken($data);
            case 'Trustly':
                return new AlternativePaymentToken($data);
            case 'UPI':
                return new AlternativePaymentToken($data);
            case 'UPayCard':
                return new AlternativePaymentToken($data);
            case 'USD-coin':
                return new AlternativePaymentToken($data);
            case 'VCreditos':
                return new AlternativePaymentToken($data);
            case 'VenusPoint':
                return new AlternativePaymentToken($data);
            case 'WeChat Pay':
                return new AlternativePaymentToken($data);
            case 'Webmoney':
                return new AlternativePaymentToken($data);
            case 'Webpay':
                return new AlternativePaymentToken($data);
            case 'Webpay Card':
                return new AlternativePaymentToken($data);
            case 'Webpay-2':
                return new AlternativePaymentToken($data);
            case 'XPay-P2P':
                return new AlternativePaymentToken($data);
            case 'XPay-QR':
                return new AlternativePaymentToken($data);
            case 'Yandex-money':
                return new AlternativePaymentToken($data);
            case 'Zimpler':
                return new AlternativePaymentToken($data);
            case 'Zotapay':
                return new AlternativePaymentToken($data);
            case 'ach':
                return new BankAccountToken($data);
            case 'bank-transfer':
                return new AlternativePaymentToken($data);
            case 'bank-transfer-2':
                return new AlternativePaymentToken($data);
            case 'bank-transfer-3':
                return new AlternativePaymentToken($data);
            case 'bank-transfer-4':
                return new AlternativePaymentToken($data);
            case 'bank-transfer-5':
                return new AlternativePaymentToken($data);
            case 'bank-transfer-6':
                return new AlternativePaymentToken($data);
            case 'bank-transfer-7':
                return new AlternativePaymentToken($data);
            case 'bank-transfer-8':
                return new AlternativePaymentToken($data);
            case 'bank-transfer-9':
                return new AlternativePaymentToken($data);
            case 'bitcoin':
                return new AlternativePaymentToken($data);
            case 'cash':
                return new AlternativePaymentToken($data);
            case 'cash-deposit':
                return new AlternativePaymentToken($data);
            case 'check':
                return new AlternativePaymentToken($data);
            case 'cryptocurrency':
                return new AlternativePaymentToken($data);
            case 'digital-wallet':
                return new DigitalWalletToken($data);
            case 'domestic-cards':
                return new AlternativePaymentToken($data);
            case 'ePay.bg':
                return new AlternativePaymentToken($data);
            case 'eZeeWallet':
                return new AlternativePaymentToken($data);
            case 'echeck':
                return new BankAccountToken($data);
            case 'ecoPayz':
                return new AlternativePaymentToken($data);
            case 'ecoVoucher':
                return new AlternativePaymentToken($data);
            case 'iDEAL':
                return new AlternativePaymentToken($data);
            case 'iDebit':
                return new AlternativePaymentToken($data);
            case 'iWallet':
                return new AlternativePaymentToken($data);
            case 'instant-bank-transfer':
                return new AlternativePaymentToken($data);
            case 'invoice':
                return new AlternativePaymentToken($data);
            case 'jpay':
                return new AlternativePaymentToken($data);
            case 'loonie':
                return new AlternativePaymentToken($data);
            case 'miscellaneous':
                return new AlternativePaymentToken($data);
            case 'online-bank-transfer':
                return new AlternativePaymentToken($data);
            case 'oriental-wallet':
                return new AlternativePaymentToken($data);
            case 'payment-card':
                return new PaymentCardToken($data);
            case 'paypal':
                return new PayPalToken($data);
            case 'phone':
                return new AlternativePaymentToken($data);
            case 'plaid-account':
                return new PlaidAccountToken($data);
            case 'rapyd-checkout':
                return new AlternativePaymentToken($data);
            case 'swift-dbt':
                return new AlternativePaymentToken($data);
            case 'voucher':
                return new AlternativePaymentToken($data);
            case 'voucher-2':
                return new AlternativePaymentToken($data);
            case 'voucher-3':
                return new AlternativePaymentToken($data);
            case 'voucher-4':
                return new AlternativePaymentToken($data);
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

        return parent::jsonSerialize() + $data;
    }

    private function setMethod(mixed $method): self
    {
        $this->fields['method'] = $method;

        return $this;
    }
}
