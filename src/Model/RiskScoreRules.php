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

class RiskScoreRules implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
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
        if (array_key_exists('declinedPaymentInstrumentVelocity', $data)) {
            $this->setDeclinedPaymentInstrumentVelocity($data['declinedPaymentInstrumentVelocity']);
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
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getIsProxy(): RiskScoreBoolean
    {
        return $this->fields['isProxy'];
    }

    public function setIsProxy(RiskScoreBoolean|array $isProxy): static
    {
        if (!($isProxy instanceof RiskScoreBoolean)) {
            $isProxy = RiskScoreBoolean::from($isProxy);
        }

        $this->fields['isProxy'] = $isProxy;

        return $this;
    }

    public function getIsVpn(): RiskScoreBoolean
    {
        return $this->fields['isVpn'];
    }

    public function setIsVpn(RiskScoreBoolean|array $isVpn): static
    {
        if (!($isVpn instanceof RiskScoreBoolean)) {
            $isVpn = RiskScoreBoolean::from($isVpn);
        }

        $this->fields['isVpn'] = $isVpn;

        return $this;
    }

    public function getIsTor(): RiskScoreBoolean
    {
        return $this->fields['isTor'];
    }

    public function setIsTor(RiskScoreBoolean|array $isTor): static
    {
        if (!($isTor instanceof RiskScoreBoolean)) {
            $isTor = RiskScoreBoolean::from($isTor);
        }

        $this->fields['isTor'] = $isTor;

        return $this;
    }

    public function getIsHosting(): RiskScoreBoolean
    {
        return $this->fields['isHosting'];
    }

    public function setIsHosting(RiskScoreBoolean|array $isHosting): static
    {
        if (!($isHosting instanceof RiskScoreBoolean)) {
            $isHosting = RiskScoreBoolean::from($isHosting);
        }

        $this->fields['isHosting'] = $isHosting;

        return $this;
    }

    public function getHasMismatchedBillingAddressCountry(): RiskScoreBoolean
    {
        return $this->fields['hasMismatchedBillingAddressCountry'];
    }

    public function setHasMismatchedBillingAddressCountry(RiskScoreBoolean|array $hasMismatchedBillingAddressCountry): static
    {
        if (!($hasMismatchedBillingAddressCountry instanceof RiskScoreBoolean)) {
            $hasMismatchedBillingAddressCountry = RiskScoreBoolean::from($hasMismatchedBillingAddressCountry);
        }

        $this->fields['hasMismatchedBillingAddressCountry'] = $hasMismatchedBillingAddressCountry;

        return $this;
    }

    public function getHasMismatchedBankCountry(): RiskScoreBoolean
    {
        return $this->fields['hasMismatchedBankCountry'];
    }

    public function setHasMismatchedBankCountry(RiskScoreBoolean|array $hasMismatchedBankCountry): static
    {
        if (!($hasMismatchedBankCountry instanceof RiskScoreBoolean)) {
            $hasMismatchedBankCountry = RiskScoreBoolean::from($hasMismatchedBankCountry);
        }

        $this->fields['hasMismatchedBankCountry'] = $hasMismatchedBankCountry;

        return $this;
    }

    public function getHasMismatchedTimeZone(): RiskScoreBoolean
    {
        return $this->fields['hasMismatchedTimeZone'];
    }

    public function setHasMismatchedTimeZone(RiskScoreBoolean|array $hasMismatchedTimeZone): static
    {
        if (!($hasMismatchedTimeZone instanceof RiskScoreBoolean)) {
            $hasMismatchedTimeZone = RiskScoreBoolean::from($hasMismatchedTimeZone);
        }

        $this->fields['hasMismatchedTimeZone'] = $hasMismatchedTimeZone;

        return $this;
    }

    public function getHasMismatchedHolderName(): RiskScoreBoolean
    {
        return $this->fields['hasMismatchedHolderName'];
    }

    public function setHasMismatchedHolderName(RiskScoreBoolean|array $hasMismatchedHolderName): static
    {
        if (!($hasMismatchedHolderName instanceof RiskScoreBoolean)) {
            $hasMismatchedHolderName = RiskScoreBoolean::from($hasMismatchedHolderName);
        }

        $this->fields['hasMismatchedHolderName'] = $hasMismatchedHolderName;

        return $this;
    }

    public function getHasFakeName(): RiskScoreBoolean
    {
        return $this->fields['hasFakeName'];
    }

    public function setHasFakeName(RiskScoreBoolean|array $hasFakeName): static
    {
        if (!($hasFakeName instanceof RiskScoreBoolean)) {
            $hasFakeName = RiskScoreBoolean::from($hasFakeName);
        }

        $this->fields['hasFakeName'] = $hasFakeName;

        return $this;
    }

    public function getIsHighRiskCountry(): RiskScoreBoolean
    {
        return $this->fields['isHighRiskCountry'];
    }

    public function setIsHighRiskCountry(RiskScoreBoolean|array $isHighRiskCountry): static
    {
        if (!($isHighRiskCountry instanceof RiskScoreBoolean)) {
            $isHighRiskCountry = RiskScoreBoolean::from($isHighRiskCountry);
        }

        $this->fields['isHighRiskCountry'] = $isHighRiskCountry;

        return $this;
    }

    public function getPaymentInstrumentVelocity(): RiskScoreBracket
    {
        return $this->fields['paymentInstrumentVelocity'];
    }

    public function setPaymentInstrumentVelocity(RiskScoreBracket|array $paymentInstrumentVelocity): static
    {
        if (!($paymentInstrumentVelocity instanceof RiskScoreBracket)) {
            $paymentInstrumentVelocity = RiskScoreBracket::from($paymentInstrumentVelocity);
        }

        $this->fields['paymentInstrumentVelocity'] = $paymentInstrumentVelocity;

        return $this;
    }

    public function getDeclinedPaymentInstrumentVelocity(): RiskScoreBracket
    {
        return $this->fields['declinedPaymentInstrumentVelocity'];
    }

    public function setDeclinedPaymentInstrumentVelocity(RiskScoreBracket|array $declinedPaymentInstrumentVelocity): static
    {
        if (!($declinedPaymentInstrumentVelocity instanceof RiskScoreBracket)) {
            $declinedPaymentInstrumentVelocity = RiskScoreBracket::from($declinedPaymentInstrumentVelocity);
        }

        $this->fields['declinedPaymentInstrumentVelocity'] = $declinedPaymentInstrumentVelocity;

        return $this;
    }

    public function getDeviceVelocity(): RiskScoreBracket
    {
        return $this->fields['deviceVelocity'];
    }

    public function setDeviceVelocity(RiskScoreBracket|array $deviceVelocity): static
    {
        if (!($deviceVelocity instanceof RiskScoreBracket)) {
            $deviceVelocity = RiskScoreBracket::from($deviceVelocity);
        }

        $this->fields['deviceVelocity'] = $deviceVelocity;

        return $this;
    }

    public function getIpVelocity(): RiskScoreBracket
    {
        return $this->fields['ipVelocity'];
    }

    public function setIpVelocity(RiskScoreBracket|array $ipVelocity): static
    {
        if (!($ipVelocity instanceof RiskScoreBracket)) {
            $ipVelocity = RiskScoreBracket::from($ipVelocity);
        }

        $this->fields['ipVelocity'] = $ipVelocity;

        return $this;
    }

    public function getEmailVelocity(): RiskScoreBracket
    {
        return $this->fields['emailVelocity'];
    }

    public function setEmailVelocity(RiskScoreBracket|array $emailVelocity): static
    {
        if (!($emailVelocity instanceof RiskScoreBracket)) {
            $emailVelocity = RiskScoreBracket::from($emailVelocity);
        }

        $this->fields['emailVelocity'] = $emailVelocity;

        return $this;
    }

    public function getBillingAddressVelocity(): RiskScoreBracket
    {
        return $this->fields['billingAddressVelocity'];
    }

    public function setBillingAddressVelocity(RiskScoreBracket|array $billingAddressVelocity): static
    {
        if (!($billingAddressVelocity instanceof RiskScoreBracket)) {
            $billingAddressVelocity = RiskScoreBracket::from($billingAddressVelocity);
        }

        $this->fields['billingAddressVelocity'] = $billingAddressVelocity;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('isProxy', $this->fields)) {
            $data['isProxy'] = $this->fields['isProxy']?->jsonSerialize();
        }
        if (array_key_exists('isVpn', $this->fields)) {
            $data['isVpn'] = $this->fields['isVpn']?->jsonSerialize();
        }
        if (array_key_exists('isTor', $this->fields)) {
            $data['isTor'] = $this->fields['isTor']?->jsonSerialize();
        }
        if (array_key_exists('isHosting', $this->fields)) {
            $data['isHosting'] = $this->fields['isHosting']?->jsonSerialize();
        }
        if (array_key_exists('hasMismatchedBillingAddressCountry', $this->fields)) {
            $data['hasMismatchedBillingAddressCountry'] = $this->fields['hasMismatchedBillingAddressCountry']?->jsonSerialize();
        }
        if (array_key_exists('hasMismatchedBankCountry', $this->fields)) {
            $data['hasMismatchedBankCountry'] = $this->fields['hasMismatchedBankCountry']?->jsonSerialize();
        }
        if (array_key_exists('hasMismatchedTimeZone', $this->fields)) {
            $data['hasMismatchedTimeZone'] = $this->fields['hasMismatchedTimeZone']?->jsonSerialize();
        }
        if (array_key_exists('hasMismatchedHolderName', $this->fields)) {
            $data['hasMismatchedHolderName'] = $this->fields['hasMismatchedHolderName']?->jsonSerialize();
        }
        if (array_key_exists('hasFakeName', $this->fields)) {
            $data['hasFakeName'] = $this->fields['hasFakeName']?->jsonSerialize();
        }
        if (array_key_exists('isHighRiskCountry', $this->fields)) {
            $data['isHighRiskCountry'] = $this->fields['isHighRiskCountry']?->jsonSerialize();
        }
        if (array_key_exists('paymentInstrumentVelocity', $this->fields)) {
            $data['paymentInstrumentVelocity'] = $this->fields['paymentInstrumentVelocity']?->jsonSerialize();
        }
        if (array_key_exists('declinedPaymentInstrumentVelocity', $this->fields)) {
            $data['declinedPaymentInstrumentVelocity'] = $this->fields['declinedPaymentInstrumentVelocity']?->jsonSerialize();
        }
        if (array_key_exists('deviceVelocity', $this->fields)) {
            $data['deviceVelocity'] = $this->fields['deviceVelocity']?->jsonSerialize();
        }
        if (array_key_exists('ipVelocity', $this->fields)) {
            $data['ipVelocity'] = $this->fields['ipVelocity']?->jsonSerialize();
        }
        if (array_key_exists('emailVelocity', $this->fields)) {
            $data['emailVelocity'] = $this->fields['emailVelocity']?->jsonSerialize();
        }
        if (array_key_exists('billingAddressVelocity', $this->fields)) {
            $data['billingAddressVelocity'] = $this->fields['billingAddressVelocity']?->jsonSerialize();
        }

        return $data;
    }
}
