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

abstract class WebhookAuthorization implements JsonSerializable
{
    public const TYPE_NONE = 'none';

    public const TYPE_BASIC = 'basic';

    public const TYPE_DIGEST = 'digest';

    public const TYPE_OAUTH1 = 'oauth1';

    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
    }

    public static function from(array $data = []): self
    {
        switch ($data['type']) {
            case 'basic':
                return new Basic($data);
            case 'digest':
                return new Digest($data);
            case 'oauth1':
                return new Oauth1($data);
            case 'none':
                return new WebhookAuthorizationNone($data);
        }

        throw new InvalidArgumentException("Unsupported type value: '{$data['type']}'");
    }

    /**
     * @psalm-return self::TYPE_* $type
     */
    public function getType(): string
    {
        return $this->fields['type'];
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }

        return $data;
    }

    /**
     * @psalm-param self::TYPE_* $type
     */
    private function setType(string $type): self
    {
        $this->fields['type'] = $type;

        return $this;
    }
}
