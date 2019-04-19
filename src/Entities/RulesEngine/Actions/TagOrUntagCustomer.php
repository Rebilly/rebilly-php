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

use Rebilly\Entities\RulesEngine\RuleAction;

/**
 * Class TagOrUntagCustomer.
 */
final class TagOrUntagCustomer extends RuleAction
{
    /**
     * @return string[]|array
     */
    public function getAddingTags(): array
    {
        return $this->getAttribute('addingTags');
    }

    /**
     * @param string[]|array $value
     *
     * @return $this
     */
    public function setAddingTags($value): self
    {
        return $this->setAttribute('addingTags', $value);
    }

    /**
     * @return string[]|array
     */
    public function getRemovingTags(): array
    {
        return $this->getAttribute('removingTags');
    }

    /**
     * @param string[]|array $value
     *
     * @return $this
     */
    public function setRemovingTags($value): self
    {
        return $this->setAttribute('removingTags', $value);
    }

    /**
     * @inheritdoc
     */
    public function actionName(): string
    {
        return self::NAME_TAG_OR_UNTAG_CUSTOMER;
    }
}
