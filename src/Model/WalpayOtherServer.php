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

class WalpayOtherServer extends Walpay3dsServers
{
    public function __construct(array $data = [])
    {
        parent::__construct([
            'name' => 'Other',
        ] + $data);
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }
}