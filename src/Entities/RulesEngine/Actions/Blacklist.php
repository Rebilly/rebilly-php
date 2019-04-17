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

namespace Rebilly\Entities\RulesEngine\Actions;

use DomainException;
use Rebilly\Entities\RulesEngine\RuleAction;

/**
 * Class Blacklist.
 */
final class Blacklist extends RuleAction
{
    public const UNEXPECTED_TYPE = 'Unexpected type. Only %s types are supported';

    public const TYPE_CUSTOMER_ID = 'customer-id';

    public const TYPE_EMAIL = 'email';

    public const TYPE_FINGERPRINT = 'fingerprint';

    public const TYPE_IP_ADDRESS = 'ip-address';

    public const TYPE_PAYMENT_CARD = 'payment-card';

    /**
     * @return string[]|array
     */
    public static function types(): array
    {
        return [
            self::TYPE_CUSTOMER_ID,
            self::TYPE_EMAIL,
            self::TYPE_FINGERPRINT,
            self::TYPE_IP_ADDRESS,
            self::TYPE_PAYMENT_CARD_ID,
        ];
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->getAttribute('type');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setType($value): self
    {
        if (!in_array($value, self::statuses(), true)) {
            throw new DomainException(sprintf(self::UNEXPECTED_TYPE, implode(', ', self::types())));
        }

        return $this->setAttribute('type', $value);
    }

    /**
     * @return int
     */
    public function getTtl(): int
    {
        return $this->getAttribute('ttl');
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setTtl($value): self
    {
        return $this->setAttribute('ttl', $value);
    }

    /**
     * @inheritdoc
     */
    public function actionName(): string
    {
        return self::NAME_BLACKLIST;
    }
}
