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
 * Class SendEmail.
 */
final class SendEmail extends RuleAction
{
    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->getAttribute('title');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setTitle($value): self
    {
        return $this->setAttribute('title', $value);
    }

    /**
     * @return EmailNotification[]|array
     */
    public function getEmails(): array
    {
        return $this->getAttribute('emails');
    }

    /**
     * @param EmailNotification[]|array $value
     *
     * @return $this
     */
    public function setEmails(array $value): self
    {
        return $this->setAttribute('emails', $value);
    }

    /**
     * @param EmailNotification[]|array $value
     *
     * @return EmailNotification[]|array
     */
    public function createEmails(array $value): array
    {
        return array_map(function ($data) {
            return new EmailNotification($data);
        }, $value);
    }

    /**
     * @return string
     */
    public function getSplitTestStartTime(): string
    {
        return $this->getAttribute('splitTestStartTime');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setSplitTestStartTime($value): self
    {
        return $this->setAttribute('splitTestStartTime', $value);
    }

    /**
     * @inheritdoc
     */
    public function actionName(): string
    {
        return self::NAME_SEND_EMAIL;
    }
}
