<?php

declare(strict_types=1);

namespace Rebilly\Entities;

use Rebilly\Rest\Entity;

class AmlEntry extends Entity
{
    public function getFirstName(): string
    {
        return $this->getAttribute('firstName');
    }

    public function getLastName(): string
    {
        return $this->getAttribute('lastName');
    }

    public function getSource(): string
    {
        return $this->getAttribute('source');
    }

    public function getSourceType(): string
    {
        return $this->getAttribute('sourceType');
    }

    public function getGender(): ?string
    {
        return $this->getAttribute('gender');
    }

    public function getType(): ?string
    {
        return $this->getAttribute('type');
    }

    public function getRegime(): ?string
    {
        return $this->getAttribute('regime');
    }

    public function getAuthenticity(): ?string
    {
        return $this->getAttribute('authenticity');
    }

    public function getNationality(): ?string
    {
        return $this->getAttribute('nationality');
    }

    public function getComments(): ?string
    {
        return $this->getAttribute('comments');
    }

    public function getTitle(): array
    {
        return $this->getAttribute('title');
    }

    public function getLegalBasis(): array
    {
        return $this->getAttribute('legalBasis');
    }

    public function getAddress(): array
    {
        return $this->getAttribute('address');
    }

    public function getDob(): array
    {
        return $this->getAttribute('dob');
    }

    public function getAliases(): array
    {
        return $this->getAttribute('aliases');
    }

    public function getPassport(): array
    {
        return $this->getAttribute('passport');
    }
}
