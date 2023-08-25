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

use Rebilly\Sdk\Exception\UnknownDiscriminatorValueException;

class TestProcessor3dsServersFactory
{
    public static function from(array $data = []): TestProcessor3dsServers
    {
        return match ($data['name']) {
            'TestSandbox3dsServer' => TestProcessor3dsServer::from($data),
            'ThreeDSecureIO3dsServer' => ThreeDSecureIO3dsServer::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
