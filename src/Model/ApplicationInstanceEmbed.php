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

class ApplicationInstanceEmbed implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('applicationInstance', $data)) {
            $this->setApplicationInstance($data['applicationInstance']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getApplicationInstance(): ?ApplicationInstance
    {
        return $this->fields['applicationInstance'] ?? null;
    }

    public function setApplicationInstance(null|ApplicationInstance|array $applicationInstance): self
    {
        if ($applicationInstance !== null && !($applicationInstance instanceof ApplicationInstance)) {
            $applicationInstance = ApplicationInstance::from($applicationInstance);
        }

        $this->fields['applicationInstance'] = $applicationInstance;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('applicationInstance', $this->fields)) {
            $data['applicationInstance'] = $this->fields['applicationInstance']?->jsonSerialize();
        }

        return $data;
    }
}
