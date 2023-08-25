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

interface CustomField
{
    public function getName(): ?string;

    public function getType(): string;

    public function setType(string $type): static;

    public function getDescription(): ?string;

    public function setDescription(null|string $description): static;

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array;

    /**
     * @param null|array[]|ResourceLink[] $links
     */
    public function setLinks(null|array $links): static;
}
