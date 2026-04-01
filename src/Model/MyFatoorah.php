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

use Rebilly\Sdk\Trait\HasMetadata;

class MyFatoorah extends GatewayAccount
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        parent::__construct([
            'gatewayName' => 'MyFatoorah',
        ] + $data, $metadata);

        if (array_key_exists('credentials', $data)) {
            $this->setCredentials($data['credentials']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getCredentials(): MyFatoorahCredentials
    {
        return $this->fields['credentials'];
    }

    public function setCredentials(MyFatoorahCredentials|array $credentials): static
    {
        if (!($credentials instanceof MyFatoorahCredentials)) {
            $credentials = MyFatoorahCredentials::from($credentials);
        }

        $this->fields['credentials'] = $credentials;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('credentials', $this->fields)) {
            $data['credentials'] = $this->fields['credentials']->jsonSerialize();
        }

        return parent::jsonSerialize() + $data;
    }
}
