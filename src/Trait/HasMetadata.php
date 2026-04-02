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

namespace Rebilly\Sdk\Trait;

trait HasMetadata
{
    /**
     * @var array
     */
    private array $metadata = [];

    /**
     * Get metadata array.
     *
     * @return array
     */
    public function getMetadata(): array
    {
        return $this->metadata;
    }

    /**
     * Get a header value from metadata.
     *
     * @param string $name
     * @return null|array
     */
    public function getHeader(string $name): ?array
    {
        return $this->metadata['headers'][$name] ?? null;
    }

    /**
     * Set the metadata array.
     *
     * @param array $metadata
     * @return void
     */
    public function setMetadata(array $metadata): void
    {
        $this->metadata = $metadata;
    }
}
