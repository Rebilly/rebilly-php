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

use DateTimeImmutable;

interface FlexiblePlan extends ConfigurablePlan
{
    public function getId(): ?string;

    public function setId(null|string $id): static;

    public function getName(): string;

    public function setName(string $name): static;

    public function getDescription(): ?string;

    public function setDescription(null|string $description): static;

    public function getRichDescription(): ?string;

    public function setRichDescription(null|string $richDescription): static;

    public function getProductId(): string;

    public function setProductId(string $productId): static;

    /**
     * @return null|array<string,string>
     */
    public function getProductOptions(): ?array;

    /**
     * @param null|array<string,string> $productOptions
     */
    public function setProductOptions(null|array $productOptions): static;

    public function getCurrency(): string;

    public function setCurrency(string $currency): static;

    public function getCurrencySign(): ?string;

    public function getSetup(): ?PlanSetup;

    public function setSetup(null|PlanSetup|array $setup): static;

    public function getCustomFields(): ?array;

    public function setCustomFields(null|array $customFields): static;

    public function getIsActive(): ?bool;

    public function setIsActive(null|bool $isActive): static;

    public function getRevision(): ?int;

    public function getIsTrialOnly(): ?bool;

    public function getCreatedTime(): ?DateTimeImmutable;

    public function getUpdatedTime(): ?DateTimeImmutable;

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array;
}
