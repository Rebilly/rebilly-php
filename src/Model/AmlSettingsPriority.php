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

class AmlSettingsPriority implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('pep', $data)) {
            $this->setPep($data['pep']);
        }
        if (array_key_exists('enforcements', $data)) {
            $this->setEnforcements($data['enforcements']);
        }
        if (array_key_exists('stateOwnedEnterprise', $data)) {
            $this->setStateOwnedEnterprise($data['stateOwnedEnterprise']);
        }
        if (array_key_exists('sanctions', $data)) {
            $this->setSanctions($data['sanctions']);
        }
        if (array_key_exists('adverseMedia', $data)) {
            $this->setAdverseMedia($data['adverseMedia']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPep(): ?AmlSettingsPriorityPep
    {
        return $this->fields['pep'] ?? null;
    }

    public function setPep(null|AmlSettingsPriorityPep|array $pep): static
    {
        if ($pep !== null && !($pep instanceof AmlSettingsPriorityPep)) {
            $pep = AmlSettingsPriorityPep::from($pep);
        }

        $this->fields['pep'] = $pep;

        return $this;
    }

    public function getEnforcements(): ?AmlSettingsPriorityEnforcements
    {
        return $this->fields['enforcements'] ?? null;
    }

    public function setEnforcements(null|AmlSettingsPriorityEnforcements|array $enforcements): static
    {
        if ($enforcements !== null && !($enforcements instanceof AmlSettingsPriorityEnforcements)) {
            $enforcements = AmlSettingsPriorityEnforcements::from($enforcements);
        }

        $this->fields['enforcements'] = $enforcements;

        return $this;
    }

    public function getStateOwnedEnterprise(): ?AmlSettingsPriorityStateOwnedEnterprise
    {
        return $this->fields['stateOwnedEnterprise'] ?? null;
    }

    public function setStateOwnedEnterprise(null|AmlSettingsPriorityStateOwnedEnterprise|array $stateOwnedEnterprise): static
    {
        if ($stateOwnedEnterprise !== null && !($stateOwnedEnterprise instanceof AmlSettingsPriorityStateOwnedEnterprise)) {
            $stateOwnedEnterprise = AmlSettingsPriorityStateOwnedEnterprise::from($stateOwnedEnterprise);
        }

        $this->fields['stateOwnedEnterprise'] = $stateOwnedEnterprise;

        return $this;
    }

    public function getSanctions(): ?AmlSettingsPrioritySanctions
    {
        return $this->fields['sanctions'] ?? null;
    }

    public function setSanctions(null|AmlSettingsPrioritySanctions|array $sanctions): static
    {
        if ($sanctions !== null && !($sanctions instanceof AmlSettingsPrioritySanctions)) {
            $sanctions = AmlSettingsPrioritySanctions::from($sanctions);
        }

        $this->fields['sanctions'] = $sanctions;

        return $this;
    }

    public function getAdverseMedia(): ?AmlSettingsPriorityAdverseMedia
    {
        return $this->fields['adverseMedia'] ?? null;
    }

    public function setAdverseMedia(null|AmlSettingsPriorityAdverseMedia|array $adverseMedia): static
    {
        if ($adverseMedia !== null && !($adverseMedia instanceof AmlSettingsPriorityAdverseMedia)) {
            $adverseMedia = AmlSettingsPriorityAdverseMedia::from($adverseMedia);
        }

        $this->fields['adverseMedia'] = $adverseMedia;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('pep', $this->fields)) {
            $data['pep'] = $this->fields['pep']?->jsonSerialize();
        }
        if (array_key_exists('enforcements', $this->fields)) {
            $data['enforcements'] = $this->fields['enforcements']?->jsonSerialize();
        }
        if (array_key_exists('stateOwnedEnterprise', $this->fields)) {
            $data['stateOwnedEnterprise'] = $this->fields['stateOwnedEnterprise']?->jsonSerialize();
        }
        if (array_key_exists('sanctions', $this->fields)) {
            $data['sanctions'] = $this->fields['sanctions']?->jsonSerialize();
        }
        if (array_key_exists('adverseMedia', $this->fields)) {
            $data['adverseMedia'] = $this->fields['adverseMedia']?->jsonSerialize();
        }

        return $data;
    }
}
