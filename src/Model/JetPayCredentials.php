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
use Rebilly\Sdk\Trait\HasMetadata;

class JetPayCredentials implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('TerminalID', $data)) {
            $this->setTerminalID($data['TerminalID']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getTerminalID(): string
    {
        return $this->fields['TerminalID'];
    }

    public function setTerminalID(string $terminalID): static
    {
        $this->fields['TerminalID'] = $terminalID;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('TerminalID', $this->fields)) {
            $data['TerminalID'] = $this->fields['TerminalID'];
        }

        return $data;
    }
}
