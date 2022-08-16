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

class DisplayOtherChoices extends RuleAction
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'name' => 'display-other-choices',
        ] + $data);

        if (array_key_exists('choices', $data)) {
            $this->setChoices($data['choices']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return DisplayMessages[]
     */
    public function getChoices(): array
    {
        return $this->fields['choices'];
    }

    /**
     * @param DisplayMessages[] $choices
     */
    public function setChoices(array $choices): self
    {
        $choices = array_map(fn ($value) => $value !== null ? ($value instanceof DisplayMessages ? $value : DisplayMessages::from($value)) : null, $choices);

        $this->fields['choices'] = $choices;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('choices', $this->fields)) {
            $data['choices'] = $this->fields['choices'];
        }

        return parent::jsonSerialize() + $data;
    }
}