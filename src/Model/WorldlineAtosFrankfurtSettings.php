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

class WorldlineAtosFrankfurtSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('cardAcceptorName', $data)) {
            $this->setCardAcceptorName($data['cardAcceptorName']);
        }
        if (array_key_exists('cardAcceptorLocation', $data)) {
            $this->setCardAcceptorLocation($data['cardAcceptorLocation']);
        }
        if (array_key_exists('cardAcceptorCountryCode', $data)) {
            $this->setCardAcceptorCountryCode($data['cardAcceptorCountryCode']);
        }
        if (array_key_exists('terminalIds', $data)) {
            $this->setTerminalIds($data['terminalIds']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCardAcceptorName(): string
    {
        return $this->fields['cardAcceptorName'];
    }

    public function setCardAcceptorName(string $cardAcceptorName): static
    {
        $this->fields['cardAcceptorName'] = $cardAcceptorName;

        return $this;
    }

    public function getCardAcceptorLocation(): string
    {
        return $this->fields['cardAcceptorLocation'];
    }

    public function setCardAcceptorLocation(string $cardAcceptorLocation): static
    {
        $this->fields['cardAcceptorLocation'] = $cardAcceptorLocation;

        return $this;
    }

    public function getCardAcceptorCountryCode(): string
    {
        return $this->fields['cardAcceptorCountryCode'];
    }

    public function setCardAcceptorCountryCode(string $cardAcceptorCountryCode): static
    {
        $this->fields['cardAcceptorCountryCode'] = $cardAcceptorCountryCode;

        return $this;
    }

    public function getTerminalIds(): ?string
    {
        return $this->fields['terminalIds'] ?? null;
    }

    public function setTerminalIds(null|string $terminalIds): static
    {
        $this->fields['terminalIds'] = $terminalIds;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('cardAcceptorName', $this->fields)) {
            $data['cardAcceptorName'] = $this->fields['cardAcceptorName'];
        }
        if (array_key_exists('cardAcceptorLocation', $this->fields)) {
            $data['cardAcceptorLocation'] = $this->fields['cardAcceptorLocation'];
        }
        if (array_key_exists('cardAcceptorCountryCode', $this->fields)) {
            $data['cardAcceptorCountryCode'] = $this->fields['cardAcceptorCountryCode'];
        }
        if (array_key_exists('terminalIds', $this->fields)) {
            $data['terminalIds'] = $this->fields['terminalIds'];
        }

        return $data;
    }
}
