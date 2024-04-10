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

class TestProcessor3dsServer implements TestProcessor3dsServers, JsonSerializable
{
    public function __construct(array $data = [])
    {
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getName(): string
    {
        return 'TestSandbox3dsServer';
    }

    public function jsonSerialize(): array
    {
        $data = [
            'name' => 'TestSandbox3dsServer',
        ];

        return $data;
    }
}
