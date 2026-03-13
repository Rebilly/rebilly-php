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

class RuleActionDisplayOtherChoices extends RuleAction
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        parent::__construct([
            'name' => 'display-other-choices',
        ] + $data, $metadata);

        if (array_key_exists('choices', $data)) {
            $this->setChoices($data['choices']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    /**
     * @return RuleActionDisplayOtherChoicesChoices[]
     */
    public function getChoices(): array
    {
        return $this->fields['choices'];
    }

    /**
     * @param array[]|RuleActionDisplayOtherChoicesChoices[] $choices
     */
    public function setChoices(array $choices): static
    {
        $choices = array_map(
            fn ($value) => $value instanceof RuleActionDisplayOtherChoicesChoices ? $value : RuleActionDisplayOtherChoicesChoices::from($value),
            $choices,
        );

        $this->fields['choices'] = $choices;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('choices', $this->fields)) {
            $data['choices'] = array_map(
                static fn (RuleActionDisplayOtherChoicesChoices $ruleActionDisplayOtherChoicesChoices) => $ruleActionDisplayOtherChoicesChoices->jsonSerialize(),
                $this->fields['choices'],
            );
        }

        return parent::jsonSerialize() + $data;
    }
}
