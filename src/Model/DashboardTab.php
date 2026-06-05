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

class DashboardTab implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('title', $data)) {
            $this->setTitle($data['title']);
        }
        if (array_key_exists('tiles', $data)) {
            $this->setTiles($data['tiles']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getTitle(): string
    {
        return $this->fields['title'];
    }

    public function setTitle(string $title): static
    {
        $this->fields['title'] = $title;

        return $this;
    }

    /**
     * @return DashboardTile[]
     */
    public function getTiles(): array
    {
        return $this->fields['tiles'];
    }

    /**
     * @param array[]|DashboardTile[] $tiles
     */
    public function setTiles(array $tiles): static
    {
        $tiles = array_map(
            fn ($value) => $value instanceof DashboardTile ? $value : DashboardTile::from($value),
            $tiles,
        );

        $this->fields['tiles'] = $tiles;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('title', $this->fields)) {
            $data['title'] = $this->fields['title'];
        }
        if (array_key_exists('tiles', $this->fields)) {
            $data['tiles'] = array_map(
                static fn (DashboardTile $dashboardTile) => $dashboardTile->jsonSerialize(),
                $this->fields['tiles'],
            );
        }

        return $data;
    }
}
