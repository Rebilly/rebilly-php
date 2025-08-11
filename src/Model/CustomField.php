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

interface CustomField extends JsonSerializable
{
    public function getType(): string;

    public function getName(): ?string;

    public function getDescription(): ?string;

    public function setDescription(null|string $description): static;

    public function getIsEnabled(): ?bool;

    public function setIsEnabled(null|bool $isEnabled): static;

    public function getAdditionalSchema(): null|ArrayCustomFieldAdditionalSchema|BooleanCustomFieldAdditionalSchema|DateCustomFieldAdditionalSchema|DateTimeCustomFieldAdditionalSchema|IntegerCustomFieldAdditionalSchema|MonetaryCustomFieldAdditionalSchema|NumberCustomFieldAdditionalSchema|StringCustomFieldAdditionalSchema;

    public function setAdditionalSchema(null|array $additionalSchema): static;

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array;
}
