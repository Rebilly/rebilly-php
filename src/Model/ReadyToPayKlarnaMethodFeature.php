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

interface ReadyToPayKlarnaMethodFeature
{
    public function getName(): string;

    public function getClientToken(): string;

    public function setClientToken(string $clientToken): static;

    public function getSessionId(): string;

    public function setSessionId(string $sessionId): static;
}
