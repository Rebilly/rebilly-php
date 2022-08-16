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

abstract class TimelineAction implements JsonSerializable
{
    public const ACTION_RESEND_EMAIL = 'resend-email';

    public const ACTION_REDEMPTION_CANCEL = 'redemption-cancel';

    public const ACTION_RULESET_RESTORE = 'ruleset-restore';

    public const ACTION_SHOW_EDD_SEARCH_LOGS = 'show-edd-search-logs';

    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('action', $data)) {
            $this->setAction($data['action']);
        }
    }

    public static function from(array $data = []): self
    {
        switch ($data['action']) {
            case 'resend-email':
                return new ResendEmail($data);
            case 'redemption-cancel':
                return new RedemptionCancel($data);
            case 'ruleset-restore':
                return new RulesetRestore($data);
            case 'show-edd-search-logs':
                return new ShowEddSearchLogs($data);
        }

        throw new InvalidArgumentException("Unsupported action value: '{$data['action']}'");
    }

    /**
     * @psalm-return self::ACTION_*|null $action
     */
    public function getAction(): ?string
    {
        return $this->fields['action'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('action', $this->fields)) {
            $data['action'] = $this->fields['action'];
        }

        return $data;
    }

    /**
     * @psalm-param self::ACTION_*|null $action
     */
    private function setAction(null|string $action): self
    {
        $this->fields['action'] = $action;

        return $this;
    }
}
