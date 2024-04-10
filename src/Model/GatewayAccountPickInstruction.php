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

abstract class GatewayAccountPickInstruction implements JsonSerializable
{
    public const STRATEGY_WEIGHTED_RANDOM = 'weighted-random';

    public const STRATEGY_ROUND_ROBIN = 'round-robin';

    public const METHOD_ACCOUNT_WEIGHTS = 'gateway-account-weights';

    public const METHOD_ACQUIRER_WEIGHTS = 'gateway-acquirer-weights';

    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('strategy', $data)) {
            $this->setStrategy($data['strategy']);
        }
        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
    }

    public static function from(array $data = []): self
    {
        switch ($data['method']) {
            case 'gateway-account-weights':
                return PickInstructionGatewayAccountWeights::from($data);
            case 'gateway-acquirer-weights':
                return PickInstructionGatewayAcquirerWeights::from($data);
        }

        throw new InvalidArgumentException("Unsupported method value: '{$data['method']}'");
    }

    public function getStrategy(): ?string
    {
        return $this->fields['strategy'] ?? null;
    }

    public function setStrategy(null|string $strategy): static
    {
        $this->fields['strategy'] = $strategy;

        return $this;
    }

    public function getMethod(): string
    {
        return $this->fields['method'];
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('strategy', $this->fields)) {
            $data['strategy'] = $this->fields['strategy'];
        }
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method'];
        }

        return $data;
    }

    private function setMethod(string $method): static
    {
        $this->fields['method'] = $method;

        return $this;
    }
}
