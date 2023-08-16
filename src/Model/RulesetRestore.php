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

class RulesetRestore extends TimelineAction
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'action' => 'ruleset-restore',
        ] + $data);

        if (array_key_exists('version', $data)) {
            $this->setVersion($data['version']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getVersion(): ?int
    {
        return $this->fields['version'] ?? null;
    }

    public function setVersion(null|int $version): static
    {
        $this->fields['version'] = $version;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('version', $this->fields)) {
            $data['version'] = $this->fields['version'];
        }

        return parent::jsonSerialize() + $data;
    }
}
