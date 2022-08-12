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

class DisplayMessage extends RuleAction
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'name' => 'display-message',
        ] + $data);

        if (array_key_exists('messages', $data)) {
            $this->setMessages($data['messages']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return \Rebilly\Sdk\Model\DisplayMessages[]
     */
    public function getMessages(): array
    {
        return $this->fields['messages'];
    }

    /**
     * @param \Rebilly\Sdk\Model\DisplayMessages[] $messages
     */
    public function setMessages(array $messages): self
    {
        $messages = array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\DisplayMessages ? $value : \Rebilly\Sdk\Model\DisplayMessages::from($value)) : null, $messages);

        $this->fields['messages'] = $messages;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('messages', $this->fields)) {
            $data['messages'] = $this->fields['messages'];
        }

        return parent::jsonSerialize() + $data;
    }
}
