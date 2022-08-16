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

use JsonSerializable;

class PaymentGatewayMetadata implements JsonSerializable
{
    public const OPERATIONS_VERIFY = 'verify';

    public const OPERATIONS_AUTH = 'auth';

    public const OPERATIONS_CAPTURE = 'capture';

    public const OPERATIONS_SALE = 'sale';

    public const OPERATIONS_REFUND = 'refund';

    public const OPERATIONS_QUERY = 'query';

    public const OPERATIONS_CREDIT = 'credit';

    public const OPERATIONS__3_DS1 = '3DS1';

    public const OPERATIONS__3_DS2 = '3DS2';

    public const OPERATIONS_CHECK_CREDENTIALS = 'checkCredentials';

    public const SUPPORTED_PAYMENT_INSTRUMENT_SETUP_INSTRUCTIONS_DO_NOTHING = 'do-nothing';

    public const SUPPORTED_PAYMENT_INSTRUMENT_SETUP_INSTRUCTIONS_AUTHORIZE = 'authorize';

    public const SUPPORTED_PAYMENT_INSTRUMENT_SETUP_INSTRUCTIONS_AUTHORIZE_AND_VOID = 'authorize-and-void';

    public const SUPPORTED_PAYMENT_INSTRUMENT_SETUP_INSTRUCTIONS_SCA = 'sca';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('apiName', $data)) {
            $this->setApiName($data['apiName']);
        }
        if (array_key_exists('otherNames', $data)) {
            $this->setOtherNames($data['otherNames']);
        }
        if (array_key_exists('logo', $data)) {
            $this->setLogo($data['logo']);
        }
        if (array_key_exists('summary', $data)) {
            $this->setSummary($data['summary']);
        }
        if (array_key_exists('homepage', $data)) {
            $this->setHomepage($data['homepage']);
        }
        if (array_key_exists('externalDocs', $data)) {
            $this->setExternalDocs($data['externalDocs']);
        }
        if (array_key_exists('publishedPricing', $data)) {
            $this->setPublishedPricing($data['publishedPricing']);
        }
        if (array_key_exists('setupInstructions', $data)) {
            $this->setSetupInstructions($data['setupInstructions']);
        }
        if (array_key_exists('paymentMethods', $data)) {
            $this->setPaymentMethods($data['paymentMethods']);
        }
        if (array_key_exists('cardBrands', $data)) {
            $this->setCardBrands($data['cardBrands']);
        }
        if (array_key_exists('merchantCountries', $data)) {
            $this->setMerchantCountries($data['merchantCountries']);
        }
        if (array_key_exists('currencies', $data)) {
            $this->setCurrencies($data['currencies']);
        }
        if (array_key_exists('operations', $data)) {
            $this->setOperations($data['operations']);
        }
        if (array_key_exists('supported3dsServers', $data)) {
            $this->setSupported3dsServers($data['supported3dsServers']);
        }
        if (array_key_exists('supportedPaymentInstrumentSetupInstructions', $data)) {
            $this->setSupportedPaymentInstrumentSetupInstructions($data['supportedPaymentInstrumentSetupInstructions']);
        }
        if (array_key_exists('reconciliationSupport', $data)) {
            $this->setReconciliationSupport($data['reconciliationSupport']);
        }
        if (array_key_exists('disputeSupport', $data)) {
            $this->setDisputeSupport($data['disputeSupport']);
        }
        if (array_key_exists('offsite', $data)) {
            $this->setOffsite($data['offsite']);
        }
        if (array_key_exists('ipn', $data)) {
            $this->setIpn($data['ipn']);
        }
        if (array_key_exists('recommendedWaitingApprovalTtl', $data)) {
            $this->setRecommendedWaitingApprovalTtl($data['recommendedWaitingApprovalTtl']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getApiName(): string
    {
        return $this->fields['apiName'];
    }

    public function setApiName(string $apiName): self
    {
        $this->fields['apiName'] = $apiName;

        return $this;
    }

    /**
     * @return null|PaymentGatewayMetadataOtherNames[]
     */
    public function getOtherNames(): ?array
    {
        return $this->fields['otherNames'] ?? null;
    }

    /**
     * @param null|PaymentGatewayMetadataOtherNames[] $otherNames
     */
    public function setOtherNames(null|array $otherNames): self
    {
        $otherNames = $otherNames !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof PaymentGatewayMetadataOtherNames ? $value : PaymentGatewayMetadataOtherNames::from($value)) : null, $otherNames) : null;

        $this->fields['otherNames'] = $otherNames;

        return $this;
    }

    public function getLogo(): string
    {
        return $this->fields['logo'];
    }

    public function setLogo(string $logo): self
    {
        $this->fields['logo'] = $logo;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->fields['summary'] ?? null;
    }

    public function setSummary(null|string $summary): self
    {
        $this->fields['summary'] = $summary;

        return $this;
    }

    public function getHomepage(): ?string
    {
        return $this->fields['homepage'] ?? null;
    }

    public function setHomepage(null|string $homepage): self
    {
        $this->fields['homepage'] = $homepage;

        return $this;
    }

    /**
     * @return null|PaymentGatewayMetadataExternalDocs[]
     */
    public function getExternalDocs(): ?array
    {
        return $this->fields['externalDocs'] ?? null;
    }

    /**
     * @param null|PaymentGatewayMetadataExternalDocs[] $externalDocs
     */
    public function setExternalDocs(null|array $externalDocs): self
    {
        $externalDocs = $externalDocs !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof PaymentGatewayMetadataExternalDocs ? $value : PaymentGatewayMetadataExternalDocs::from($value)) : null, $externalDocs) : null;

        $this->fields['externalDocs'] = $externalDocs;

        return $this;
    }

    public function getPublishedPricing(): ?string
    {
        return $this->fields['publishedPricing'] ?? null;
    }

    public function setPublishedPricing(null|string $publishedPricing): self
    {
        $this->fields['publishedPricing'] = $publishedPricing;

        return $this;
    }

    public function getSetupInstructions(): ?string
    {
        return $this->fields['setupInstructions'] ?? null;
    }

    public function setSetupInstructions(null|string $setupInstructions): self
    {
        $this->fields['setupInstructions'] = $setupInstructions;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getPaymentMethods(): array
    {
        return $this->fields['paymentMethods'];
    }

    /**
     * @param string[] $paymentMethods
     */
    public function setPaymentMethods(array $paymentMethods): self
    {
        $paymentMethods = array_map(fn ($value) => $value ?? null, $paymentMethods);

        $this->fields['paymentMethods'] = $paymentMethods;

        return $this;
    }

    /**
     * @return null|PaymentCardBrand[]
     */
    public function getCardBrands(): ?array
    {
        return $this->fields['cardBrands'] ?? null;
    }

    /**
     * @param null|PaymentCardBrand[] $cardBrands
     */
    public function setCardBrands(null|array $cardBrands): self
    {
        $cardBrands = $cardBrands !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof PaymentCardBrand ? $value : PaymentCardBrand::from($value)) : null, $cardBrands) : null;

        $this->fields['cardBrands'] = $cardBrands;

        return $this;
    }

    public function getMerchantCountries(): CountriesMetadata
    {
        return $this->fields['merchantCountries'];
    }

    public function setMerchantCountries(CountriesMetadata|array $merchantCountries): self
    {
        if (!($merchantCountries instanceof CountriesMetadata)) {
            $merchantCountries = CountriesMetadata::from($merchantCountries);
        }

        $this->fields['merchantCountries'] = $merchantCountries;

        return $this;
    }

    public function getCurrencies(): CurrenciesMetadata
    {
        return $this->fields['currencies'];
    }

    public function setCurrencies(CurrenciesMetadata|array $currencies): self
    {
        if (!($currencies instanceof CurrenciesMetadata)) {
            $currencies = CurrenciesMetadata::from($currencies);
        }

        $this->fields['currencies'] = $currencies;

        return $this;
    }

    /**
     * @return null|string[]
     *
     * @psalm-return self::OPERATIONS_*|null $operations
     */
    public function getOperations(): ?array
    {
        return $this->fields['operations'] ?? null;
    }

    /**
     * @param null|string[] $operations
     *
     * @psalm-param self::OPERATIONS_*|null $operations
     */
    public function setOperations(null|array $operations): self
    {
        $operations = $operations !== null ? array_map(fn ($value) => $value ?? null, $operations) : null;

        $this->fields['operations'] = $operations;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getSupported3dsServers(): ?array
    {
        return $this->fields['supported3dsServers'] ?? null;
    }

    /**
     * @param null|string[] $supported3dsServers
     */
    public function setSupported3dsServers(null|array $supported3dsServers): self
    {
        $supported3dsServers = $supported3dsServers !== null ? array_map(fn ($value) => $value ?? null, $supported3dsServers) : null;

        $this->fields['supported3dsServers'] = $supported3dsServers;

        return $this;
    }

    /**
     * @return null|string[]
     *
     * @psalm-return self::SUPPORTED_PAYMENT_INSTRUMENT_SETUP_INSTRUCTIONS_*|null $supportedPaymentInstrumentSetupInstructions
     */
    public function getSupportedPaymentInstrumentSetupInstructions(): ?array
    {
        return $this->fields['supportedPaymentInstrumentSetupInstructions'] ?? null;
    }

    /**
     * @param null|string[] $supportedPaymentInstrumentSetupInstructions
     *
     * @psalm-param self::SUPPORTED_PAYMENT_INSTRUMENT_SETUP_INSTRUCTIONS_*|null $supportedPaymentInstrumentSetupInstructions
     */
    public function setSupportedPaymentInstrumentSetupInstructions(null|array $supportedPaymentInstrumentSetupInstructions): self
    {
        $supportedPaymentInstrumentSetupInstructions = $supportedPaymentInstrumentSetupInstructions !== null ? array_map(fn ($value) => $value ?? null, $supportedPaymentInstrumentSetupInstructions) : null;

        $this->fields['supportedPaymentInstrumentSetupInstructions'] = $supportedPaymentInstrumentSetupInstructions;

        return $this;
    }

    public function getReconciliationSupport(): ?bool
    {
        return $this->fields['reconciliationSupport'] ?? null;
    }

    public function setReconciliationSupport(null|bool $reconciliationSupport): self
    {
        $this->fields['reconciliationSupport'] = $reconciliationSupport;

        return $this;
    }

    public function getDisputeSupport(): ?bool
    {
        return $this->fields['disputeSupport'] ?? null;
    }

    public function setDisputeSupport(null|bool $disputeSupport): self
    {
        $this->fields['disputeSupport'] = $disputeSupport;

        return $this;
    }

    public function getOffsite(): ?bool
    {
        return $this->fields['offsite'] ?? null;
    }

    public function setOffsite(null|bool $offsite): self
    {
        $this->fields['offsite'] = $offsite;

        return $this;
    }

    public function getIpn(): ?PaymentGatewayMetadataIpn
    {
        return $this->fields['ipn'] ?? null;
    }

    public function setIpn(null|PaymentGatewayMetadataIpn|array $ipn): self
    {
        if ($ipn !== null && !($ipn instanceof PaymentGatewayMetadataIpn)) {
            $ipn = PaymentGatewayMetadataIpn::from($ipn);
        }

        $this->fields['ipn'] = $ipn;

        return $this;
    }

    public function getRecommendedWaitingApprovalTtl(): ?int
    {
        return $this->fields['recommendedWaitingApprovalTtl'] ?? null;
    }

    public function setRecommendedWaitingApprovalTtl(null|int $recommendedWaitingApprovalTtl): self
    {
        $this->fields['recommendedWaitingApprovalTtl'] = $recommendedWaitingApprovalTtl;

        return $this;
    }

    /**
     * @return null|SelfLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('apiName', $this->fields)) {
            $data['apiName'] = $this->fields['apiName'];
        }
        if (array_key_exists('otherNames', $this->fields)) {
            $data['otherNames'] = $this->fields['otherNames'];
        }
        if (array_key_exists('logo', $this->fields)) {
            $data['logo'] = $this->fields['logo'];
        }
        if (array_key_exists('summary', $this->fields)) {
            $data['summary'] = $this->fields['summary'];
        }
        if (array_key_exists('homepage', $this->fields)) {
            $data['homepage'] = $this->fields['homepage'];
        }
        if (array_key_exists('externalDocs', $this->fields)) {
            $data['externalDocs'] = $this->fields['externalDocs'];
        }
        if (array_key_exists('publishedPricing', $this->fields)) {
            $data['publishedPricing'] = $this->fields['publishedPricing'];
        }
        if (array_key_exists('setupInstructions', $this->fields)) {
            $data['setupInstructions'] = $this->fields['setupInstructions'];
        }
        if (array_key_exists('paymentMethods', $this->fields)) {
            $data['paymentMethods'] = $this->fields['paymentMethods'];
        }
        if (array_key_exists('cardBrands', $this->fields)) {
            $data['cardBrands'] = $this->fields['cardBrands'];
        }
        if (array_key_exists('merchantCountries', $this->fields)) {
            $data['merchantCountries'] = $this->fields['merchantCountries']?->jsonSerialize();
        }
        if (array_key_exists('currencies', $this->fields)) {
            $data['currencies'] = $this->fields['currencies']?->jsonSerialize();
        }
        if (array_key_exists('operations', $this->fields)) {
            $data['operations'] = $this->fields['operations'];
        }
        if (array_key_exists('supported3dsServers', $this->fields)) {
            $data['supported3dsServers'] = $this->fields['supported3dsServers'];
        }
        if (array_key_exists('supportedPaymentInstrumentSetupInstructions', $this->fields)) {
            $data['supportedPaymentInstrumentSetupInstructions'] = $this->fields['supportedPaymentInstrumentSetupInstructions'];
        }
        if (array_key_exists('reconciliationSupport', $this->fields)) {
            $data['reconciliationSupport'] = $this->fields['reconciliationSupport'];
        }
        if (array_key_exists('disputeSupport', $this->fields)) {
            $data['disputeSupport'] = $this->fields['disputeSupport'];
        }
        if (array_key_exists('offsite', $this->fields)) {
            $data['offsite'] = $this->fields['offsite'];
        }
        if (array_key_exists('ipn', $this->fields)) {
            $data['ipn'] = $this->fields['ipn']?->jsonSerialize();
        }
        if (array_key_exists('recommendedWaitingApprovalTtl', $this->fields)) {
            $data['recommendedWaitingApprovalTtl'] = $this->fields['recommendedWaitingApprovalTtl'];
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return $data;
    }

    /**
     * @param null|SelfLink[] $links
     */
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof SelfLink ? $value : SelfLink::from($value)) : null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
