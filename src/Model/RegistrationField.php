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
use Rebilly\Sdk\Trait\HasMetadata;

class RegistrationField implements JsonSerializable
{
    use HasMetadata;

    public const ATTRIBUTE_USERNAME = 'username';

    public const ATTRIBUTE_FIRST_NAME = 'firstName';

    public const ATTRIBUTE_LAST_NAME = 'lastName';

    public const ATTRIBUTE_EMAIL = 'email';

    public const ATTRIBUTE_GENDER = 'gender';

    public const ATTRIBUTE_DATE_OF_BIRTH = 'dateOfBirth';

    public const ATTRIBUTE_ADDRESS_LINE1 = 'addressLine1';

    public const ATTRIBUTE_ADDRESS_LINE2 = 'addressLine2';

    public const ATTRIBUTE_CITY = 'city';

    public const ATTRIBUTE_POSTAL_CODE = 'postalCode';

    public const ATTRIBUTE_COUNTRY = 'country';

    public const ATTRIBUTE_PROVINCE = 'province';

    public const ATTRIBUTE_CURRENCY = 'currency';

    public const ATTRIBUTE_MOBILE_NUMBER = 'mobileNumber';

    public const ATTRIBUTE_INDUSTRY = 'industry';

    public const ATTRIBUTE_OCCUPATION = 'occupation';

    public const ATTRIBUTE_MARKETING_OPT_IN = 'marketingOptIn';

    public const ATTRIBUTE_TERMS_ACCEPTED = 'termsAccepted';

    public const ATTRIBUTE_PASSWORD_STEP = 'passwordStep';

    public const REQUIREMENT_LEVEL_REQUIRED = 'required';

    public const REQUIREMENT_LEVEL_OPTIONAL = 'optional';

    public const REQUIREMENT_LEVEL_HIDDEN = 'hidden';

    public const VALIDATION_TYPE_NONE = 'none';

    public const VALIDATION_TYPE_EMAIL = 'email';

    public const VALIDATION_TYPE_PHONE = 'phone';

    public const VALIDATION_TYPE_ALPHANUMERIC = 'alphanumeric';

    public const VALIDATION_TYPE_NUMERIC = 'numeric';

    public const VALIDATION_TYPE_DATE = 'date';

    public const VALIDATION_TYPE_URL = 'url';

    public const VALIDATION_TYPE_REGEX = 'regex';

    public const VALIDATION_TYPE_PASSWORD = 'password';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('attribute', $data)) {
            $this->setAttribute($data['attribute']);
        }
        if (array_key_exists('displayName', $data)) {
            $this->setDisplayName($data['displayName']);
        }
        if (array_key_exists('requirementLevel', $data)) {
            $this->setRequirementLevel($data['requirementLevel']);
        }
        if (array_key_exists('validationType', $data)) {
            $this->setValidationType($data['validationType']);
        }
        if (array_key_exists('validationPattern', $data)) {
            $this->setValidationPattern($data['validationPattern']);
        }
        if (array_key_exists('minLength', $data)) {
            $this->setMinLength($data['minLength']);
        }
        if (array_key_exists('maxLength', $data)) {
            $this->setMaxLength($data['maxLength']);
        }
        if (array_key_exists('helpText', $data)) {
            $this->setHelpText($data['helpText']);
        }
        if (array_key_exists('order', $data)) {
            $this->setOrder($data['order']);
        }
        if (array_key_exists('step', $data)) {
            $this->setStep($data['step']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getAttribute(): string
    {
        return $this->fields['attribute'];
    }

    public function setAttribute(string $attribute): static
    {
        $this->fields['attribute'] = $attribute;

        return $this;
    }

    public function getDisplayName(): string
    {
        return $this->fields['displayName'];
    }

    public function setDisplayName(string $displayName): static
    {
        $this->fields['displayName'] = $displayName;

        return $this;
    }

    public function getRequirementLevel(): string
    {
        return $this->fields['requirementLevel'];
    }

    public function setRequirementLevel(string $requirementLevel): static
    {
        $this->fields['requirementLevel'] = $requirementLevel;

        return $this;
    }

    public function getValidationType(): string
    {
        return $this->fields['validationType'];
    }

    public function setValidationType(string $validationType): static
    {
        $this->fields['validationType'] = $validationType;

        return $this;
    }

    public function getValidationPattern(): ?string
    {
        return $this->fields['validationPattern'] ?? null;
    }

    public function setValidationPattern(null|string $validationPattern): static
    {
        $this->fields['validationPattern'] = $validationPattern;

        return $this;
    }

    public function getMinLength(): ?int
    {
        return $this->fields['minLength'] ?? null;
    }

    public function setMinLength(null|int $minLength): static
    {
        $this->fields['minLength'] = $minLength;

        return $this;
    }

    public function getMaxLength(): ?int
    {
        return $this->fields['maxLength'] ?? null;
    }

    public function setMaxLength(null|int $maxLength): static
    {
        $this->fields['maxLength'] = $maxLength;

        return $this;
    }

    public function getHelpText(): ?string
    {
        return $this->fields['helpText'] ?? null;
    }

    public function setHelpText(null|string $helpText): static
    {
        $this->fields['helpText'] = $helpText;

        return $this;
    }

    public function getOrder(): int
    {
        return $this->fields['order'];
    }

    public function setOrder(int $order): static
    {
        $this->fields['order'] = $order;

        return $this;
    }

    public function getStep(): RegistrationFieldStep
    {
        return $this->fields['step'];
    }

    public function setStep(RegistrationFieldStep|array $step): static
    {
        if (!($step instanceof RegistrationFieldStep)) {
            $step = RegistrationFieldStep::from($step);
        }

        $this->fields['step'] = $step;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('attribute', $this->fields)) {
            $data['attribute'] = $this->fields['attribute'];
        }
        if (array_key_exists('displayName', $this->fields)) {
            $data['displayName'] = $this->fields['displayName'];
        }
        if (array_key_exists('requirementLevel', $this->fields)) {
            $data['requirementLevel'] = $this->fields['requirementLevel'];
        }
        if (array_key_exists('validationType', $this->fields)) {
            $data['validationType'] = $this->fields['validationType'];
        }
        if (array_key_exists('validationPattern', $this->fields)) {
            $data['validationPattern'] = $this->fields['validationPattern'];
        }
        if (array_key_exists('minLength', $this->fields)) {
            $data['minLength'] = $this->fields['minLength'];
        }
        if (array_key_exists('maxLength', $this->fields)) {
            $data['maxLength'] = $this->fields['maxLength'];
        }
        if (array_key_exists('helpText', $this->fields)) {
            $data['helpText'] = $this->fields['helpText'];
        }
        if (array_key_exists('order', $this->fields)) {
            $data['order'] = $this->fields['order'];
        }
        if (array_key_exists('step', $this->fields)) {
            $data['step'] = $this->fields['step']->jsonSerialize();
        }

        return $data;
    }
}
