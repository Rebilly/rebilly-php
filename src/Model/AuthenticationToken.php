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

abstract class AuthenticationToken extends CommonAuthenticationToken
{
    private array $fields = [];

    protected function __construct(array $data = [])
    {
        parent::__construct($data);

        if (array_key_exists('mode', $data)) {
            $this->setMode($data['mode']);
        }
    }

    public static function from(array $data = []): self
    {
        switch ($data['mode']) {
            case 'passwordless':
                return new Passwordless($data);
            case 'password':
                return new Password($data);
        }

        throw new InvalidArgumentException("Unsupported mode value: '{$data['mode']}'");
    }

    public function getMode(): mixed
    {
        return $this->fields['mode'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('mode', $this->fields)) {
            $data['mode'] = $this->fields['mode'];
        }

        return parent::jsonSerialize() + $data;
    }

    private function setMode(mixed $mode): self
    {
        $this->fields['mode'] = $mode;

        return $this;
    }
}
