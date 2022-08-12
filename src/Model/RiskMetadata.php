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

class RiskMetadata implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('ipAddress', $data)) {
            $this->setIpAddress($data['ipAddress']);
        }
        if (array_key_exists('fingerprint', $data)) {
            $this->setFingerprint($data['fingerprint']);
        }
        if (array_key_exists('httpHeaders', $data)) {
            $this->setHttpHeaders($data['httpHeaders']);
        }
        if (array_key_exists('browserData', $data)) {
            $this->setBrowserData($data['browserData']);
        }
        if (array_key_exists('extraData', $data)) {
            $this->setExtraData($data['extraData']);
        }
        if (array_key_exists('isProxy', $data)) {
            $this->setIsProxy($data['isProxy']);
        }
        if (array_key_exists('isVpn', $data)) {
            $this->setIsVpn($data['isVpn']);
        }
        if (array_key_exists('isTor', $data)) {
            $this->setIsTor($data['isTor']);
        }
        if (array_key_exists('isHosting', $data)) {
            $this->setIsHosting($data['isHosting']);
        }
        if (array_key_exists('vpnServiceName', $data)) {
            $this->setVpnServiceName($data['vpnServiceName']);
        }
        if (array_key_exists('isp', $data)) {
            $this->setIsp($data['isp']);
        }
        if (array_key_exists('country', $data)) {
            $this->setCountry($data['country']);
        }
        if (array_key_exists('region', $data)) {
            $this->setRegion($data['region']);
        }
        if (array_key_exists('city', $data)) {
            $this->setCity($data['city']);
        }
        if (array_key_exists('latitude', $data)) {
            $this->setLatitude($data['latitude']);
        }
        if (array_key_exists('longitude', $data)) {
            $this->setLongitude($data['longitude']);
        }
        if (array_key_exists('postalCode', $data)) {
            $this->setPostalCode($data['postalCode']);
        }
        if (array_key_exists('timeZone', $data)) {
            $this->setTimeZone($data['timeZone']);
        }
        if (array_key_exists('accuracyRadius', $data)) {
            $this->setAccuracyRadius($data['accuracyRadius']);
        }
        if (array_key_exists('distance', $data)) {
            $this->setDistance($data['distance']);
        }
        if (array_key_exists('hasMismatchedBillingAddressCountry', $data)) {
            $this->setHasMismatchedBillingAddressCountry($data['hasMismatchedBillingAddressCountry']);
        }
        if (array_key_exists('hasMismatchedBankCountry', $data)) {
            $this->setHasMismatchedBankCountry($data['hasMismatchedBankCountry']);
        }
        if (array_key_exists('hasMismatchedTimeZone', $data)) {
            $this->setHasMismatchedTimeZone($data['hasMismatchedTimeZone']);
        }
        if (array_key_exists('hasMismatchedHolderName', $data)) {
            $this->setHasMismatchedHolderName($data['hasMismatchedHolderName']);
        }
        if (array_key_exists('hasFakeName', $data)) {
            $this->setHasFakeName($data['hasFakeName']);
        }
        if (array_key_exists('isHighRiskCountry', $data)) {
            $this->setIsHighRiskCountry($data['isHighRiskCountry']);
        }
        if (array_key_exists('paymentInstrumentVelocity', $data)) {
            $this->setPaymentInstrumentVelocity($data['paymentInstrumentVelocity']);
        }
        if (array_key_exists('deviceVelocity', $data)) {
            $this->setDeviceVelocity($data['deviceVelocity']);
        }
        if (array_key_exists('ipVelocity', $data)) {
            $this->setIpVelocity($data['ipVelocity']);
        }
        if (array_key_exists('emailVelocity', $data)) {
            $this->setEmailVelocity($data['emailVelocity']);
        }
        if (array_key_exists('billingAddressVelocity', $data)) {
            $this->setBillingAddressVelocity($data['billingAddressVelocity']);
        }
        if (array_key_exists('score', $data)) {
            $this->setScore($data['score']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getIpAddress(): ?string
    {
        return $this->fields['ipAddress'] ?? null;
    }

    public function setIpAddress(null|string $ipAddress): self
    {
        $this->fields['ipAddress'] = $ipAddress;

        return $this;
    }

    public function getFingerprint(): ?string
    {
        return $this->fields['fingerprint'] ?? null;
    }

    public function setFingerprint(null|string $fingerprint): self
    {
        $this->fields['fingerprint'] = $fingerprint;

        return $this;
    }

    public function getHttpHeaders(): ?array
    {
        return $this->fields['httpHeaders'] ?? null;
    }

    public function setHttpHeaders(null|array $httpHeaders): self
    {
        $this->fields['httpHeaders'] = $httpHeaders;

        return $this;
    }

    public function getBrowserData(): ?BrowserData
    {
        return $this->fields['browserData'] ?? null;
    }

    public function setBrowserData(null|BrowserData|array $browserData): self
    {
        if ($browserData !== null && !($browserData instanceof \Rebilly\Sdk\Model\BrowserData)) {
            $browserData = \Rebilly\Sdk\Model\BrowserData::from($browserData);
        }

        $this->fields['browserData'] = $browserData;

        return $this;
    }

    public function getExtraData(): ?ExtraData
    {
        return $this->fields['extraData'] ?? null;
    }

    public function setExtraData(null|ExtraData|array $extraData): self
    {
        if ($extraData !== null && !($extraData instanceof \Rebilly\Sdk\Model\ExtraData)) {
            $extraData = \Rebilly\Sdk\Model\ExtraData::from($extraData);
        }

        $this->fields['extraData'] = $extraData;

        return $this;
    }

    public function getIsProxy(): ?bool
    {
        return $this->fields['isProxy'] ?? null;
    }

    public function getIsVpn(): ?bool
    {
        return $this->fields['isVpn'] ?? null;
    }

    public function getIsTor(): ?bool
    {
        return $this->fields['isTor'] ?? null;
    }

    public function getIsHosting(): ?bool
    {
        return $this->fields['isHosting'] ?? null;
    }

    public function getVpnServiceName(): ?string
    {
        return $this->fields['vpnServiceName'] ?? null;
    }

    public function getIsp(): ?string
    {
        return $this->fields['isp'] ?? null;
    }

    public function getCountry(): ?string
    {
        return $this->fields['country'] ?? null;
    }

    public function getRegion(): ?string
    {
        return $this->fields['region'] ?? null;
    }

    public function getCity(): ?string
    {
        return $this->fields['city'] ?? null;
    }

    public function getLatitude(): ?float
    {
        return $this->fields['latitude'] ?? null;
    }

    public function getLongitude(): ?float
    {
        return $this->fields['longitude'] ?? null;
    }

    public function getPostalCode(): ?string
    {
        return $this->fields['postalCode'] ?? null;
    }

    public function getTimeZone(): ?string
    {
        return $this->fields['timeZone'] ?? null;
    }

    public function getAccuracyRadius(): ?int
    {
        return $this->fields['accuracyRadius'] ?? null;
    }

    public function getDistance(): ?int
    {
        return $this->fields['distance'] ?? null;
    }

    public function getHasMismatchedBillingAddressCountry(): ?bool
    {
        return $this->fields['hasMismatchedBillingAddressCountry'] ?? null;
    }

    public function getHasMismatchedBankCountry(): ?bool
    {
        return $this->fields['hasMismatchedBankCountry'] ?? null;
    }

    public function getHasMismatchedTimeZone(): ?bool
    {
        return $this->fields['hasMismatchedTimeZone'] ?? null;
    }

    public function getHasMismatchedHolderName(): ?bool
    {
        return $this->fields['hasMismatchedHolderName'] ?? null;
    }

    public function getHasFakeName(): ?bool
    {
        return $this->fields['hasFakeName'] ?? null;
    }

    public function getIsHighRiskCountry(): ?bool
    {
        return $this->fields['isHighRiskCountry'] ?? null;
    }

    public function getPaymentInstrumentVelocity(): ?int
    {
        return $this->fields['paymentInstrumentVelocity'] ?? null;
    }

    public function getDeviceVelocity(): ?int
    {
        return $this->fields['deviceVelocity'] ?? null;
    }

    public function getIpVelocity(): ?int
    {
        return $this->fields['ipVelocity'] ?? null;
    }

    public function getEmailVelocity(): ?int
    {
        return $this->fields['emailVelocity'] ?? null;
    }

    public function getBillingAddressVelocity(): ?int
    {
        return $this->fields['billingAddressVelocity'] ?? null;
    }

    public function getScore(): ?int
    {
        return $this->fields['score'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('ipAddress', $this->fields)) {
            $data['ipAddress'] = $this->fields['ipAddress'];
        }
        if (array_key_exists('fingerprint', $this->fields)) {
            $data['fingerprint'] = $this->fields['fingerprint'];
        }
        if (array_key_exists('httpHeaders', $this->fields)) {
            $data['httpHeaders'] = $this->fields['httpHeaders'];
        }
        if (array_key_exists('browserData', $this->fields)) {
            $data['browserData'] = $this->fields['browserData']?->jsonSerialize();
        }
        if (array_key_exists('extraData', $this->fields)) {
            $data['extraData'] = $this->fields['extraData']?->jsonSerialize();
        }
        if (array_key_exists('isProxy', $this->fields)) {
            $data['isProxy'] = $this->fields['isProxy'];
        }
        if (array_key_exists('isVpn', $this->fields)) {
            $data['isVpn'] = $this->fields['isVpn'];
        }
        if (array_key_exists('isTor', $this->fields)) {
            $data['isTor'] = $this->fields['isTor'];
        }
        if (array_key_exists('isHosting', $this->fields)) {
            $data['isHosting'] = $this->fields['isHosting'];
        }
        if (array_key_exists('vpnServiceName', $this->fields)) {
            $data['vpnServiceName'] = $this->fields['vpnServiceName'];
        }
        if (array_key_exists('isp', $this->fields)) {
            $data['isp'] = $this->fields['isp'];
        }
        if (array_key_exists('country', $this->fields)) {
            $data['country'] = $this->fields['country'];
        }
        if (array_key_exists('region', $this->fields)) {
            $data['region'] = $this->fields['region'];
        }
        if (array_key_exists('city', $this->fields)) {
            $data['city'] = $this->fields['city'];
        }
        if (array_key_exists('latitude', $this->fields)) {
            $data['latitude'] = $this->fields['latitude'];
        }
        if (array_key_exists('longitude', $this->fields)) {
            $data['longitude'] = $this->fields['longitude'];
        }
        if (array_key_exists('postalCode', $this->fields)) {
            $data['postalCode'] = $this->fields['postalCode'];
        }
        if (array_key_exists('timeZone', $this->fields)) {
            $data['timeZone'] = $this->fields['timeZone'];
        }
        if (array_key_exists('accuracyRadius', $this->fields)) {
            $data['accuracyRadius'] = $this->fields['accuracyRadius'];
        }
        if (array_key_exists('distance', $this->fields)) {
            $data['distance'] = $this->fields['distance'];
        }
        if (array_key_exists('hasMismatchedBillingAddressCountry', $this->fields)) {
            $data['hasMismatchedBillingAddressCountry'] = $this->fields['hasMismatchedBillingAddressCountry'];
        }
        if (array_key_exists('hasMismatchedBankCountry', $this->fields)) {
            $data['hasMismatchedBankCountry'] = $this->fields['hasMismatchedBankCountry'];
        }
        if (array_key_exists('hasMismatchedTimeZone', $this->fields)) {
            $data['hasMismatchedTimeZone'] = $this->fields['hasMismatchedTimeZone'];
        }
        if (array_key_exists('hasMismatchedHolderName', $this->fields)) {
            $data['hasMismatchedHolderName'] = $this->fields['hasMismatchedHolderName'];
        }
        if (array_key_exists('hasFakeName', $this->fields)) {
            $data['hasFakeName'] = $this->fields['hasFakeName'];
        }
        if (array_key_exists('isHighRiskCountry', $this->fields)) {
            $data['isHighRiskCountry'] = $this->fields['isHighRiskCountry'];
        }
        if (array_key_exists('paymentInstrumentVelocity', $this->fields)) {
            $data['paymentInstrumentVelocity'] = $this->fields['paymentInstrumentVelocity'];
        }
        if (array_key_exists('deviceVelocity', $this->fields)) {
            $data['deviceVelocity'] = $this->fields['deviceVelocity'];
        }
        if (array_key_exists('ipVelocity', $this->fields)) {
            $data['ipVelocity'] = $this->fields['ipVelocity'];
        }
        if (array_key_exists('emailVelocity', $this->fields)) {
            $data['emailVelocity'] = $this->fields['emailVelocity'];
        }
        if (array_key_exists('billingAddressVelocity', $this->fields)) {
            $data['billingAddressVelocity'] = $this->fields['billingAddressVelocity'];
        }
        if (array_key_exists('score', $this->fields)) {
            $data['score'] = $this->fields['score'];
        }

        return $data;
    }

    private function setIsProxy(null|bool $isProxy): self
    {
        $this->fields['isProxy'] = $isProxy;

        return $this;
    }

    private function setIsVpn(null|bool $isVpn): self
    {
        $this->fields['isVpn'] = $isVpn;

        return $this;
    }

    private function setIsTor(null|bool $isTor): self
    {
        $this->fields['isTor'] = $isTor;

        return $this;
    }

    private function setIsHosting(null|bool $isHosting): self
    {
        $this->fields['isHosting'] = $isHosting;

        return $this;
    }

    private function setVpnServiceName(null|string $vpnServiceName): self
    {
        $this->fields['vpnServiceName'] = $vpnServiceName;

        return $this;
    }

    private function setIsp(null|string $isp): self
    {
        $this->fields['isp'] = $isp;

        return $this;
    }

    private function setCountry(null|string $country): self
    {
        $this->fields['country'] = $country;

        return $this;
    }

    private function setRegion(null|string $region): self
    {
        $this->fields['region'] = $region;

        return $this;
    }

    private function setCity(null|string $city): self
    {
        $this->fields['city'] = $city;

        return $this;
    }

    private function setLatitude(null|float|string $latitude): self
    {
        if ($latitude !== null && is_string($latitude)) {
            $latitude = (float) $latitude;
        }

        $this->fields['latitude'] = $latitude;

        return $this;
    }

    private function setLongitude(null|float|string $longitude): self
    {
        if ($longitude !== null && is_string($longitude)) {
            $longitude = (float) $longitude;
        }

        $this->fields['longitude'] = $longitude;

        return $this;
    }

    private function setPostalCode(null|string $postalCode): self
    {
        $this->fields['postalCode'] = $postalCode;

        return $this;
    }

    private function setTimeZone(null|string $timeZone): self
    {
        $this->fields['timeZone'] = $timeZone;

        return $this;
    }

    private function setAccuracyRadius(null|int $accuracyRadius): self
    {
        $this->fields['accuracyRadius'] = $accuracyRadius;

        return $this;
    }

    private function setDistance(null|int $distance): self
    {
        $this->fields['distance'] = $distance;

        return $this;
    }

    private function setHasMismatchedBillingAddressCountry(null|bool $hasMismatchedBillingAddressCountry): self
    {
        $this->fields['hasMismatchedBillingAddressCountry'] = $hasMismatchedBillingAddressCountry;

        return $this;
    }

    private function setHasMismatchedBankCountry(null|bool $hasMismatchedBankCountry): self
    {
        $this->fields['hasMismatchedBankCountry'] = $hasMismatchedBankCountry;

        return $this;
    }

    private function setHasMismatchedTimeZone(null|bool $hasMismatchedTimeZone): self
    {
        $this->fields['hasMismatchedTimeZone'] = $hasMismatchedTimeZone;

        return $this;
    }

    private function setHasMismatchedHolderName(null|bool $hasMismatchedHolderName): self
    {
        $this->fields['hasMismatchedHolderName'] = $hasMismatchedHolderName;

        return $this;
    }

    private function setHasFakeName(null|bool $hasFakeName): self
    {
        $this->fields['hasFakeName'] = $hasFakeName;

        return $this;
    }

    private function setIsHighRiskCountry(null|bool $isHighRiskCountry): self
    {
        $this->fields['isHighRiskCountry'] = $isHighRiskCountry;

        return $this;
    }

    private function setPaymentInstrumentVelocity(null|int $paymentInstrumentVelocity): self
    {
        $this->fields['paymentInstrumentVelocity'] = $paymentInstrumentVelocity;

        return $this;
    }

    private function setDeviceVelocity(null|int $deviceVelocity): self
    {
        $this->fields['deviceVelocity'] = $deviceVelocity;

        return $this;
    }

    private function setIpVelocity(null|int $ipVelocity): self
    {
        $this->fields['ipVelocity'] = $ipVelocity;

        return $this;
    }

    private function setEmailVelocity(null|int $emailVelocity): self
    {
        $this->fields['emailVelocity'] = $emailVelocity;

        return $this;
    }

    private function setBillingAddressVelocity(null|int $billingAddressVelocity): self
    {
        $this->fields['billingAddressVelocity'] = $billingAddressVelocity;

        return $this;
    }

    private function setScore(null|int $score): self
    {
        $this->fields['score'] = $score;

        return $this;
    }
}
