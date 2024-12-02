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

class ApcoPaySettings implements JsonSerializable
{
    public const METHOD_AFTERPAY = 'AFTERPAY';

    public const METHOD_BANCONTACT = 'BANCONTACT';

    public const METHOD_CREDITCLICK = 'CREDITCLICK';

    public const METHOD_FLEXEPIN = 'FLEXEPIN';

    public const METHOD_IDEAL = 'IDEAL';

    public const METHOD_JPAY = 'JPAY';

    public const METHOD_OCTAPAY = 'OCTAPAY';

    public const METHOD_ONLINEUBERWEISEN = 'ONLINEUBERWEISEN';

    public const METHOD_ORIENTALWALLET = 'ORIENTALWALLET';

    public const METHOD_VENUSPOINT = 'VENUSPOINT';

    public const METHOD_ZIMPLER = 'ZIMPLER';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMethod(): string
    {
        return $this->fields['method'];
    }

    public function setMethod(string $method): static
    {
        $this->fields['method'] = $method;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method'];
        }

        return $data;
    }
}
