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

    public function setFirstName(string $value): self
    {
        return $this->setAttribute('firstName', $value);
    }

    public function getLastName(): string
    {
        return $this->getAttribute('lastName');
    }

    public function setLastName(string $value): self
    {
        return $this->setAttribute('lastName', $value);
    }

    public function setSource(string $value): self
    {
        return $this->setAttribute('source', $value);
    }

    public function getSource(): string
    {
        return $this->getAttribute('source');
    }

    public function setSourceType(string $value): self
    {
        return $this->setAttribute('sourceType', $value);
    }

    public function getSourceType(): string
    {
        return $this->getAttribute('sourceType');
    }

    public function setGender(string $value): self
    {
        return $this->setAttribute('gender', $value);
    }

    public function getGender(): ?string
    {
        return $this->getAttribute('gender');
    }

    public function setType(?string $type): self
    {
        return $this->setAttribute('type', $type);
    }

    public function getType(): ?string
    {
        return $this->getAttribute('type');
    }

    public function setRegime(?string $value): self
    {
        return $this->setAttribute('regime', $value);
    }

    public function getRegime(): ?string
    {
        return $this->getAttribute('regime');
    }

    public function setAuthenticity(?string $value): self
    {
        return $this->setAttribute('authenticity', $value);
    }

    public function getAuthenticity(): ?string
    {
        return $this->getAttribute('authenticity');
    }

    public function setNationality(?string $value): self
    {
        return $this->setAttribute('nationality', $value);
    }

    public function getNationality(): ?string
    {
        return $this->getAttribute('nationality');
    }

    public function setComments(?string $comments): self
    {
        return $this->setAttribute('comments', $comments);
    }

    public function getComments(): ?string
    {
        return $this->getAttribute('comments');
    }

    public function setTitle(array $value): self
    {
        return $this->setAttribute('title', $value);
    }

    public function getTitle(): array
    {
        return $this->getAttribute('title');
    }

    public function setLegalBasis(array $value): self
    {
        return $this->setAttribute('legalBasis', $value);
    }

    public function getLegalBasis(): array
    {
        return $this->getAttribute('legalBasis');
    }

    public function setAddress(array $address): self
    {
        return $this->setAttribute('address', $address);
    }

    public function getAddress(): array
    {
        return $this->getAttribute('address');
    }

    public function setDob(array $value): self
    {
        return $this->setAttribute('dob', $value);
    }

    public function getDob(): array
    {
        return $this->getAttribute('dob');
    }

    public function setAliases(array $value): self
    {
        return $this->setAttribute('aliases', $value);
    }

    public function getAliases(): array
    {
        return $this->getAttribute('aliases');
    }

    public function setPassport(array $value): self
    {
        return $this->setAttribute('passport', $value);
    }

    public function getPassport(): array
    {
        return $this->getAttribute('passport');
    }
}
