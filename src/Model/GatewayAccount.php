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

use DateTimeImmutable;
use DateTimeInterface;
use InvalidArgumentException;
use JsonSerializable;

abstract class GatewayAccount implements JsonSerializable
{
    public const STATUS_ACTIVE = 'active';

    public const STATUS_INACTIVE = 'inactive';

    public const STATUS_PENDING = 'pending';

    public const STATUS_CLOSED = 'closed';

    public const SETUP_INSTRUCTION_AUTHORIZE = 'authorize';

    public const SETUP_INSTRUCTION_AUTHORIZE_AND_VOID = 'authorize-and-void';

    public const SETUP_INSTRUCTION_SCA = 'sca';

    public const SETUP_INSTRUCTION_DO_NOTHING = 'do-nothing';

    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('gatewayName', $data)) {
            $this->setGatewayName($data['gatewayName']);
        }
        if (array_key_exists('acquirerName', $data)) {
            $this->setAcquirerName($data['acquirerName']);
        }
        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
        if (array_key_exists('acceptedCurrencies', $data)) {
            $this->setAcceptedCurrencies($data['acceptedCurrencies']);
        }
        if (array_key_exists('paymentCardSchemes', $data)) {
            $this->setPaymentCardSchemes($data['paymentCardSchemes']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('merchantCategoryCode', $data)) {
            $this->setMerchantCategoryCode($data['merchantCategoryCode']);
        }
        if (array_key_exists('dccMarkup', $data)) {
            $this->setDccMarkup($data['dccMarkup']);
        }
        if (array_key_exists('dccForceCurrency', $data)) {
            $this->setDccForceCurrency($data['dccForceCurrency']);
        }
        if (array_key_exists('descriptor', $data)) {
            $this->setDescriptor($data['descriptor']);
        }
        if (array_key_exists('cityField', $data)) {
            $this->setCityField($data['cityField']);
        }
        if (array_key_exists('excludedDccQuoteCurrencies', $data)) {
            $this->setExcludedDccQuoteCurrencies($data['excludedDccQuoteCurrencies']);
        }
        if (array_key_exists('monthlyLimit', $data)) {
            $this->setMonthlyLimit($data['monthlyLimit']);
        }
        if (array_key_exists('approvalWindowTtl', $data)) {
            $this->setApprovalWindowTtl($data['approvalWindowTtl']);
        }
        if (array_key_exists('reconciliationWindowEnabled', $data)) {
            $this->setReconciliationWindowEnabled($data['reconciliationWindowEnabled']);
        }
        if (array_key_exists('reconciliationWindowTtl', $data)) {
            $this->setReconciliationWindowTtl($data['reconciliationWindowTtl']);
        }
        if (array_key_exists('threeDSecure', $data)) {
            $this->setThreeDSecure($data['threeDSecure']);
        }
        if (array_key_exists('dynamicDescriptor', $data)) {
            $this->setDynamicDescriptor($data['dynamicDescriptor']);
        }
        if (array_key_exists('digitalWallets', $data)) {
            $this->setDigitalWallets($data['digitalWallets']);
        }
        if (array_key_exists('isDown', $data)) {
            $this->setIsDown($data['isDown']);
        }
        if (array_key_exists('additionalFilters', $data)) {
            $this->setAdditionalFilters($data['additionalFilters']);
        }
        if (array_key_exists('timeout', $data)) {
            $this->setTimeout($data['timeout']);
        }
        if (array_key_exists('token', $data)) {
            $this->setToken($data['token']);
        }
        if (array_key_exists('sticky', $data)) {
            $this->setSticky($data['sticky']);
        }
        if (array_key_exists('setupInstruction', $data)) {
            $this->setSetupInstruction($data['setupInstruction']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('organizationId', $data)) {
            $this->setOrganizationId($data['organizationId']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
    }

    public static function from(array $data = []): self
    {
        switch ($data['gatewayName']) {
            case 'ePay':
                return new EPay($data);
            case 'CoinGate':
                return new CoinGate($data);
            case 'PaymentsOS':
                return new PaymentsOS($data);
            case 'Prosa':
                return new Prosa($data);
            case 'Rotessa':
                return new Rotessa($data);
            case 'Pagadito':
                return new Pagadito($data);
            case 'MiFinity':
                return new MiFinity($data);
            case 'EPro':
                return new EPro($data);
            case 'Paymero':
                return new Paymero($data);
            case 'Pay4Fun':
                return new Pay4Fun($data);
            case 'SecurionPay':
                return new SecurionPay($data);
            case 'Zotapay':
                return new Zotapay($data);
            case 'Wirecard':
                return new Wirecard($data);
            case 'AsiaPaymentGateway':
                return new AsiaPaymentGateway($data);
            case 'SparkPay':
                return new SparkPay($data);
            case 'Redsys':
                return new Redsys($data);
            case 'PPRO':
                return new PPRO($data);
            case 'CauriPayment':
                return new CauriPayment($data);
            case 'XPay':
                return new XPay($data);
            case 'SmartInvoice':
                return new SmartInvoice($data);
            case 'Paysafecash':
                return new Paysafecash($data);
            case 'PaymenTechnologies':
                return new PaymenTechnologies($data);
            case 'Conekta':
                return new Conekta($data);
            case 'Greenbox':
                return new Greenbox($data);
            case 'PayClub':
                return new PayClub($data);
            case 'AmazonPay':
                return new AmazonPay($data);
            case 'SaltarPay':
                return new SaltarPay($data);
            case 'MuchBetter':
                return new MuchBetter($data);
            case 'FundSend':
                return new FundSend($data);
            case 'Bambora':
                return new Bambora($data);
            case 'MercadoPago':
                return new MercadoPago($data);
            case 'Coinbase':
                return new Coinbase($data);
            case 'CheckoutCom':
                return new CheckoutCom($data);
            case 'MyFatoorah':
                return new MyFatoorah($data);
            case 'Plugnpay':
                return new Plugnpay($data);
            case 'iCheque':
                return new ICheque($data);
            case 'Chase':
                return new Chase($data);
            case 'Realtime':
                return new Realtime($data);
            case 'Paynote':
                return new Paynote($data);
            case 'vegaaH':
                return new VegaaH($data);
            case 'WesternUnion':
                return new WesternUnion($data);
            case 'Finrax':
                return new Finrax($data);
            case 'FinTecSystems':
                return new FinTecSystems($data);
            case 'USAePay':
                return new USAePay($data);
            case 'GlobalOne':
                return new GlobalOne($data);
            case 'Truevo':
                return new Truevo($data);
            case 'Payeezy':
                return new Payeezy($data);
            case 'GET':
                return new GET($data);
            case 'MtaPay':
                return new MtaPay($data);
            case 'Ilixium':
                return new Ilixium($data);
            case 'EcorePay':
                return new EcorePay($data);
            case 'PaymentAsia':
                return new PaymentAsia($data);
            case 'Panamerican':
                return new Panamerican($data);
            case 'Paysafe':
                return new Paysafe($data);
            case 'LPG':
                return new LPG($data);
            case 'Citadel':
                return new Citadel($data);
            case 'Cashterminal':
                return new Cashterminal($data);
            case 'TestProcessor':
                return new TestProcessor($data);
            case 'Credorax':
                return new Credorax($data);
            case 'CashToCode':
                return new CashToCode($data);
            case 'NuaPay':
                return new NuaPay($data);
            case 'AmexVPC':
                return new AmexVPC($data);
            case 'Stripe':
                return new Stripe($data);
            case 'Netbanking':
                return new Netbanking($data);
            case 'Walpay':
                return new Walpay($data);
            case 'Sagepay':
                return new Sagepay($data);
            case 'Jeton':
                return new Jeton($data);
            case 'Realex':
                return new Realex($data);
            case 'Gigadat':
                return new Gigadat($data);
            case 'iDebit':
                return new IDebit($data);
            case 'loonie':
                return new Loonie($data);
            case 'Neosurf':
                return new Neosurf($data);
            case 'ICEPAY':
                return new ICEPAY($data);
            case 'WorldlineAtosFrankfurt':
                return new WorldlineAtosFrankfurt($data);
            case 'Dengi':
                return new Dengi($data);
            case 'Ingenico':
                return new Ingenico($data);
            case 'Moneris':
                return new Moneris($data);
            case 'JetPay':
                return new JetPay($data);
            case 'Piastrix':
                return new Piastrix($data);
            case 'ACI':
                return new ACI($data);
            case 'DataCash':
                return new DataCash($data);
            case 'Onlineueberweisen':
                return new Onlineueberweisen($data);
            case 'Khelocard':
                return new Khelocard($data);
            case 'NMI':
                return new NMI($data);
            case 'VCreditos':
                return new VCreditos($data);
            case 'PayTabs':
                return new PayTabs($data);
            case 'VantivLitle':
                return new VantivLitle($data);
            case 'Euteller':
                return new Euteller($data);
            case 'NGenius':
                return new NGenius($data);
            case 'Paysafecard':
                return new Paysafecard($data);
            case 'ParamountEft':
                return new ParamountEft($data);
            case 'INOVAPAY':
                return new INOVAPAY($data);
            case 'ParamountInterac':
                return new ParamountInterac($data);
            case 'A1Gateway':
                return new A1Gateway($data);
            case 'Adyen':
                return new Adyen($data);
            case 'Rapyd':
                return new Rapyd($data);
            case 'Cashflows':
                return new Cashflows($data);
            case 'BraintreePayments':
                return new BraintreePayments($data);
            case 'Flexepin':
                return new Flexepin($data);
            case 'Trustly':
                return new Trustly($data);
            case 'SeamlessChex':
                return new SeamlessChex($data);
            case 'Coppr':
                return new Coppr($data);
            case 'Safecharge':
                return new Safecharge($data);
            case 'Payper':
                return new Payper($data);
            case 'PostFinance':
                return new PostFinance($data);
            case 'CoinPayments':
                return new CoinPayments($data);
            case 'Pin4Pay':
                return new Pin4Pay($data);
            case 'Payvision':
                return new Payvision($data);
            case 'PandaGateway':
                return new PandaGateway($data);
            case 'Neteller':
                return new Neteller($data);
            case 'CASHlib':
                return new CASHlib($data);
            case 'STPMexico':
                return new STPMexico($data);
            case 'ApcoPay':
                return new ApcoPay($data);
            case 'OchaPay':
                return new OchaPay($data);
            case 'PayCash':
                return new PayCash($data);
            case 'Konnektive':
                return new Konnektive($data);
            case 'Gpaysafe':
                return new Gpaysafe($data);
            case 'Circle':
                return new Circle($data);
            case 'ezyEFT':
                return new EzyEFT($data);
            case 'CyberSource':
                return new CyberSource($data);
            case 'Gooney':
                return new Gooney($data);
            case 'TWINT':
                return new TWINT($data);
            case 'TrustsPay':
                return new TrustsPay($data);
            case 'Directa24':
                return new Directa24($data);
            case 'Sofort':
                return new Sofort($data);
            case 'EMS':
                return new EMS($data);
            case 'IpayOptions':
                return new IpayOptions($data);
            case 'NinjaWallet':
                return new NinjaWallet($data);
            case 'CODVoucher':
                return new CODVoucher($data);
            case 'OnRamp':
                return new OnRamp($data);
            case 'MuchBetterGateway':
                return new MuchBetterGateway($data);
            case 'Pagsmile':
                return new Pagsmile($data);
            case 'InstaDebit':
                return new InstaDebit($data);
            case 'Dimoco':
                return new Dimoco($data);
            case 'Klarna':
                return new Klarna($data);
            case 'Clearhaus':
                return new Clearhaus($data);
            case 'eMerchantPay':
                return new EMerchantPay($data);
            case 'Elavon':
                return new Elavon($data);
            case 'AstroPayCard':
                return new AstroPayCard($data);
            case 'UPayCard':
                return new UPayCard($data);
            case 'Inovio':
                return new Inovio($data);
            case 'Payr':
                return new Payr($data);
            case 'RPN':
                return new RPN($data);
            case 'PayULatam':
                return new PayULatam($data);
            case 'Cleo':
                return new Cleo($data);
            case 'Skrill':
                return new Skrill($data);
            case 'Forte':
                return new Forte($data);
            case 'Airpay':
                return new Airpay($data);
            case 'StaticGateway':
                return new StaticGateway($data);
            case 'Cardknox':
                return new Cardknox($data);
            case 'ecoPayz':
                return new EcoPayz($data);
            case 'MaxiCash':
                return new MaxiCash($data);
            case 'NOWPayments':
                return new NOWPayments($data);
            case 'Awepay':
                return new Awepay($data);
            case 'Dropayment':
                return new Dropayment($data);
            case 'HiPay':
                return new HiPay($data);
            case 'Cryptonator':
                return new Cryptonator($data);
            case 'PayPal':
                return new PayPal($data);
            case 'iCanPay':
                return new ICanPay($data);
            case 'EBANX':
                return new EBANX($data);
            case 'AuthorizeNet':
                return new AuthorizeNet($data);
            case 'BitPay':
                return new BitPay($data);
            case 'Payflow':
                return new Payflow($data);
            case 'Intuit':
                return new Intuit($data);
            case 'CCAvenue':
                return new CCAvenue($data);
            case 'BlueSnap':
                return new BlueSnap($data);
            case 'eZeeWallet':
                return new EZeeWallet($data);
            case 'dLocal':
                return new DLocal($data);
            case 'BankSEND':
                return new BankSEND($data);
            case 'Telr':
                return new Telr($data);
            case 'SMSVoucher':
                return new SMSVoucher($data);
            case 'Dragonphoenix':
                return new Dragonphoenix($data);
            case 'Zimpler':
                return new Zimpler($data);
            case 'Worldpay':
                return new Worldpay($data);
            case 'Wallet88':
                return new Wallet88($data);
            case 'Cayan':
                return new Cayan($data);
            case 'SecureTrading':
                return new SecureTrading($data);
            case 'ToditoCash':
                return new ToditoCash($data);
            case 'EPG':
                return new EPG($data);
        }

        throw new InvalidArgumentException("Unsupported gatewayName value: '{$data['gatewayName']}'");
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getGatewayName(): GatewayName
    {
        return $this->fields['gatewayName'];
    }

    public function getAcquirerName(): ?AcquirerName
    {
        return $this->fields['acquirerName'] ?? null;
    }

    public function setAcquirerName(null|AcquirerName|string $acquirerName): self
    {
        if ($acquirerName !== null && !($acquirerName instanceof AcquirerName)) {
            $acquirerName = AcquirerName::from($acquirerName);
        }

        $this->fields['acquirerName'] = $acquirerName;

        return $this;
    }

    public function getMethod(): PaymentMethod
    {
        return $this->fields['method'];
    }

    public function setMethod(PaymentMethod|string $method): self
    {
        if (!($method instanceof PaymentMethod)) {
            $method = PaymentMethod::from($method);
        }

        $this->fields['method'] = $method;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getAcceptedCurrencies(): array
    {
        return $this->fields['acceptedCurrencies'];
    }

    /**
     * @param string[] $acceptedCurrencies
     */
    public function setAcceptedCurrencies(array $acceptedCurrencies): self
    {
        $acceptedCurrencies = array_map(fn ($value) => $value ?? null, $acceptedCurrencies);

        $this->fields['acceptedCurrencies'] = $acceptedCurrencies;

        return $this;
    }

    /**
     * @return null|PaymentCardBrand[]
     */
    public function getPaymentCardSchemes(): ?array
    {
        return $this->fields['paymentCardSchemes'] ?? null;
    }

    /**
     * @param null|PaymentCardBrand[] $paymentCardSchemes
     */
    public function setPaymentCardSchemes(null|array $paymentCardSchemes): self
    {
        $paymentCardSchemes = $paymentCardSchemes !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof PaymentCardBrand ? $value : PaymentCardBrand::from($value)) : null, $paymentCardSchemes) : null;

        $this->fields['paymentCardSchemes'] = $paymentCardSchemes;

        return $this;
    }

    /**
     * @psalm-return self::STATUS_*|null $status
     */
    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function getMerchantCategoryCode(): ?string
    {
        return $this->fields['merchantCategoryCode'] ?? null;
    }

    public function setMerchantCategoryCode(null|string $merchantCategoryCode): self
    {
        $this->fields['merchantCategoryCode'] = $merchantCategoryCode;

        return $this;
    }

    public function getDccMarkup(): ?int
    {
        return $this->fields['dccMarkup'] ?? null;
    }

    public function setDccMarkup(null|int $dccMarkup): self
    {
        $this->fields['dccMarkup'] = $dccMarkup;

        return $this;
    }

    public function getDccForceCurrency(): ?string
    {
        return $this->fields['dccForceCurrency'] ?? null;
    }

    public function setDccForceCurrency(null|string $dccForceCurrency): self
    {
        $this->fields['dccForceCurrency'] = $dccForceCurrency;

        return $this;
    }

    public function getDescriptor(): ?string
    {
        return $this->fields['descriptor'] ?? null;
    }

    public function setDescriptor(null|string $descriptor): self
    {
        $this->fields['descriptor'] = $descriptor;

        return $this;
    }

    public function getCityField(): ?string
    {
        return $this->fields['cityField'] ?? null;
    }

    public function setCityField(null|string $cityField): self
    {
        $this->fields['cityField'] = $cityField;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getExcludedDccQuoteCurrencies(): ?array
    {
        return $this->fields['excludedDccQuoteCurrencies'] ?? null;
    }

    /**
     * @param null|string[] $excludedDccQuoteCurrencies
     */
    public function setExcludedDccQuoteCurrencies(null|array $excludedDccQuoteCurrencies): self
    {
        $excludedDccQuoteCurrencies = $excludedDccQuoteCurrencies !== null ? array_map(fn ($value) => $value ?? null, $excludedDccQuoteCurrencies) : null;

        $this->fields['excludedDccQuoteCurrencies'] = $excludedDccQuoteCurrencies;

        return $this;
    }

    public function getMonthlyLimit(): ?float
    {
        return $this->fields['monthlyLimit'] ?? null;
    }

    public function setMonthlyLimit(null|float|string $monthlyLimit): self
    {
        if (is_string($monthlyLimit)) {
            $monthlyLimit = (float) $monthlyLimit;
        }

        $this->fields['monthlyLimit'] = $monthlyLimit;

        return $this;
    }

    public function getApprovalWindowTtl(): ?int
    {
        return $this->fields['approvalWindowTtl'] ?? null;
    }

    public function setApprovalWindowTtl(null|int $approvalWindowTtl): self
    {
        $this->fields['approvalWindowTtl'] = $approvalWindowTtl;

        return $this;
    }

    public function getReconciliationWindowEnabled(): ?bool
    {
        return $this->fields['reconciliationWindowEnabled'] ?? null;
    }

    public function setReconciliationWindowEnabled(null|bool $reconciliationWindowEnabled): self
    {
        $this->fields['reconciliationWindowEnabled'] = $reconciliationWindowEnabled;

        return $this;
    }

    public function getReconciliationWindowTtl(): ?int
    {
        return $this->fields['reconciliationWindowTtl'] ?? null;
    }

    public function setReconciliationWindowTtl(null|int $reconciliationWindowTtl): self
    {
        $this->fields['reconciliationWindowTtl'] = $reconciliationWindowTtl;

        return $this;
    }

    public function getThreeDSecure(): ?bool
    {
        return $this->fields['threeDSecure'] ?? null;
    }

    public function setThreeDSecure(null|bool $threeDSecure): self
    {
        $this->fields['threeDSecure'] = $threeDSecure;

        return $this;
    }

    public function getDynamicDescriptor(): ?bool
    {
        return $this->fields['dynamicDescriptor'] ?? null;
    }

    public function setDynamicDescriptor(null|bool $dynamicDescriptor): self
    {
        $this->fields['dynamicDescriptor'] = $dynamicDescriptor;

        return $this;
    }

    public function getDigitalWallets(): ?DigitalWallets
    {
        return $this->fields['digitalWallets'] ?? null;
    }

    public function setDigitalWallets(null|DigitalWallets|array $digitalWallets): self
    {
        if ($digitalWallets !== null && !($digitalWallets instanceof DigitalWallets)) {
            $digitalWallets = DigitalWallets::from($digitalWallets);
        }

        $this->fields['digitalWallets'] = $digitalWallets;

        return $this;
    }

    public function getIsDown(): ?bool
    {
        return $this->fields['isDown'] ?? null;
    }

    public function getAdditionalFilters(): ?string
    {
        return $this->fields['additionalFilters'] ?? null;
    }

    public function setAdditionalFilters(null|string $additionalFilters): self
    {
        $this->fields['additionalFilters'] = $additionalFilters;

        return $this;
    }

    public function getTimeout(): ?int
    {
        return $this->fields['timeout'] ?? null;
    }

    public function setTimeout(null|int $timeout): self
    {
        $this->fields['timeout'] = $timeout;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->fields['token'] ?? null;
    }

    public function getSticky(): ?bool
    {
        return $this->fields['sticky'] ?? null;
    }

    public function setSticky(null|bool $sticky): self
    {
        $this->fields['sticky'] = $sticky;

        return $this;
    }

    /**
     * @psalm-return self::SETUP_INSTRUCTION_*|null $setupInstruction
     */
    public function getSetupInstruction(): ?string
    {
        return $this->fields['setupInstruction'] ?? null;
    }

    /**
     * @psalm-param self::SETUP_INSTRUCTION_*|null $setupInstruction
     */
    public function setSetupInstruction(null|string $setupInstruction): self
    {
        $this->fields['setupInstruction'] = $setupInstruction;

        return $this;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function setCreatedTime(null|DateTimeImmutable|string $createdTime): self
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    public function getOrganizationId(): ?string
    {
        return $this->fields['organizationId'] ?? null;
    }

    /**
     * @return null|array<DynamicIpnLink|OnBoardingUrlLink|SelfLink|StaticIpnLink>
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('gatewayName', $this->fields)) {
            $data['gatewayName'] = $this->fields['gatewayName']?->value;
        }
        if (array_key_exists('acquirerName', $this->fields)) {
            $data['acquirerName'] = $this->fields['acquirerName']?->value;
        }
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method']?->value;
        }
        if (array_key_exists('acceptedCurrencies', $this->fields)) {
            $data['acceptedCurrencies'] = $this->fields['acceptedCurrencies'];
        }
        if (array_key_exists('paymentCardSchemes', $this->fields)) {
            $data['paymentCardSchemes'] = $this->fields['paymentCardSchemes'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('merchantCategoryCode', $this->fields)) {
            $data['merchantCategoryCode'] = $this->fields['merchantCategoryCode'];
        }
        if (array_key_exists('dccMarkup', $this->fields)) {
            $data['dccMarkup'] = $this->fields['dccMarkup'];
        }
        if (array_key_exists('dccForceCurrency', $this->fields)) {
            $data['dccForceCurrency'] = $this->fields['dccForceCurrency'];
        }
        if (array_key_exists('descriptor', $this->fields)) {
            $data['descriptor'] = $this->fields['descriptor'];
        }
        if (array_key_exists('cityField', $this->fields)) {
            $data['cityField'] = $this->fields['cityField'];
        }
        if (array_key_exists('excludedDccQuoteCurrencies', $this->fields)) {
            $data['excludedDccQuoteCurrencies'] = $this->fields['excludedDccQuoteCurrencies'];
        }
        if (array_key_exists('monthlyLimit', $this->fields)) {
            $data['monthlyLimit'] = $this->fields['monthlyLimit'];
        }
        if (array_key_exists('approvalWindowTtl', $this->fields)) {
            $data['approvalWindowTtl'] = $this->fields['approvalWindowTtl'];
        }
        if (array_key_exists('reconciliationWindowEnabled', $this->fields)) {
            $data['reconciliationWindowEnabled'] = $this->fields['reconciliationWindowEnabled'];
        }
        if (array_key_exists('reconciliationWindowTtl', $this->fields)) {
            $data['reconciliationWindowTtl'] = $this->fields['reconciliationWindowTtl'];
        }
        if (array_key_exists('threeDSecure', $this->fields)) {
            $data['threeDSecure'] = $this->fields['threeDSecure'];
        }
        if (array_key_exists('dynamicDescriptor', $this->fields)) {
            $data['dynamicDescriptor'] = $this->fields['dynamicDescriptor'];
        }
        if (array_key_exists('digitalWallets', $this->fields)) {
            $data['digitalWallets'] = $this->fields['digitalWallets']?->jsonSerialize();
        }
        if (array_key_exists('isDown', $this->fields)) {
            $data['isDown'] = $this->fields['isDown'];
        }
        if (array_key_exists('additionalFilters', $this->fields)) {
            $data['additionalFilters'] = $this->fields['additionalFilters'];
        }
        if (array_key_exists('timeout', $this->fields)) {
            $data['timeout'] = $this->fields['timeout'];
        }
        if (array_key_exists('token', $this->fields)) {
            $data['token'] = $this->fields['token'];
        }
        if (array_key_exists('sticky', $this->fields)) {
            $data['sticky'] = $this->fields['sticky'];
        }
        if (array_key_exists('setupInstruction', $this->fields)) {
            $data['setupInstruction'] = $this->fields['setupInstruction'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('organizationId', $this->fields)) {
            $data['organizationId'] = $this->fields['organizationId'];
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return $data;
    }

    private function setId(null|string $id): self
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setGatewayName(GatewayName|string $gatewayName): self
    {
        if (!($gatewayName instanceof GatewayName)) {
            $gatewayName = GatewayName::from($gatewayName);
        }

        $this->fields['gatewayName'] = $gatewayName;

        return $this;
    }

    /**
     * @psalm-param self::STATUS_*|null $status
     */
    private function setStatus(null|string $status): self
    {
        $this->fields['status'] = $status;

        return $this;
    }

    private function setIsDown(null|bool $isDown): self
    {
        $this->fields['isDown'] = $isDown;

        return $this;
    }

    private function setToken(null|string $token): self
    {
        $this->fields['token'] = $token;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): self
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }

    private function setOrganizationId(null|string $organizationId): self
    {
        $this->fields['organizationId'] = $organizationId;

        return $this;
    }

    /**
     * @param null|array<DynamicIpnLink|OnBoardingUrlLink|SelfLink|StaticIpnLink> $links
     */
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value ?? null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
