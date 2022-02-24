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

namespace Rebilly\Entities\ReadyToPay\Features;

use InvalidArgumentException;
use Rebilly\Rest\Resource;

abstract class ReadyToPayFeature extends Resource
{
    private const ERROR_REQUIRED_FEATURE_NAME = 'Feature name is required';

    private const ERROR_UNSUPPORTED_FEATURE = 'Unsupported feature';

    /**
     * {@inheritdoc}
     */
    public function __construct(array $data = [])
    {
        parent::__construct(['name' => $this->featureName()] + $data);
    }

    /**
     * @param array $data
     *
     * @return ReadyToPayFeature
     */
    public static function createFromData(array $data)
    {
        if (!isset($data['name'])) {
            throw new InvalidArgumentException(self::ERROR_REQUIRED_FEATURE_NAME);
        }

        switch ($data['name']) {
            case ApplePayFeature::FEATURE_NAME:
                return new ApplePayFeature($data);
            case GooglePayFeature::FEATURE_NAME:
                return new GooglePayFeature($data);
            case PlaidFeature::FEATURE_NAME:
                return new PlaidFeature($data);
            case PayPalBillingAgreementFeature::FEATURE_NAME:
                return new PayPalBillingAgreementFeature($data);
            default:
                throw new InvalidArgumentException(self::ERROR_UNSUPPORTED_FEATURE);
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getAttribute('name');
    }

    abstract protected function featureName();
}
