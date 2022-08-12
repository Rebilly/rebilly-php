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

class ThreeDSecureResult implements JsonSerializable
{
    public const VERSION__1_0_2 = '1.0.2';

    public const VERSION__2_1_0 = '2.1.0';

    public const VERSION__2_2_0 = '2.2.0';

    public const ENROLLED_YES = 'yes';

    public const ENROLLED_NO = 'no';

    public const ENROLLED_INVALID_CARD_TIMEOUT = 'invalid card/timeout';

    public const ENROLLED_UNAVAILABLE = 'unavailable';

    public const AUTHENTICATED_YES = 'yes';

    public const AUTHENTICATED_NO = 'no';

    public const AUTHENTICATED_NOT_APPLICABLE = 'not applicable';

    public const AUTHENTICATED_ATTEMPTED = 'attempted';

    public const LIABILITY__PROTECTED = 'protected';

    public const LIABILITY_NOT_PROTECTED = 'not protected';

    public const LIABILITY_PROTECTED__ATTEMPT = 'protected (attempt)';

    public const FLOW_FRICTIONLESS = 'frictionless';

    public const FLOW_CHALLENGE = 'challenge';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('server', $data)) {
            $this->setServer($data['server']);
        }
        if (array_key_exists('version', $data)) {
            $this->setVersion($data['version']);
        }
        if (array_key_exists('enrolled', $data)) {
            $this->setEnrolled($data['enrolled']);
        }
        if (array_key_exists('authenticated', $data)) {
            $this->setAuthenticated($data['authenticated']);
        }
        if (array_key_exists('liability', $data)) {
            $this->setLiability($data['liability']);
        }
        if (array_key_exists('flow', $data)) {
            $this->setFlow($data['flow']);
        }
        if (array_key_exists('isDowngraded', $data)) {
            $this->setIsDowngraded($data['isDowngraded']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getServer(): ?string
    {
        return $this->fields['server'] ?? null;
    }

    public function setServer(null|string $server): self
    {
        $this->fields['server'] = $server;

        return $this;
    }

    /**
     * @psalm-return self::VERSION_*|null $version
     */
    public function getVersion(): ?string
    {
        return $this->fields['version'] ?? null;
    }

    /**
     * @psalm-param self::VERSION_*|null $version
     */
    public function setVersion(null|string $version): self
    {
        $this->fields['version'] = $version;

        return $this;
    }

    /**
     * @psalm-return self::ENROLLED_*|null $enrolled
     */
    public function getEnrolled(): ?string
    {
        return $this->fields['enrolled'] ?? null;
    }

    /**
     * @psalm-param self::ENROLLED_*|null $enrolled
     */
    public function setEnrolled(null|string $enrolled): self
    {
        $this->fields['enrolled'] = $enrolled;

        return $this;
    }

    /**
     * @psalm-return self::AUTHENTICATED_*|null $authenticated
     */
    public function getAuthenticated(): ?string
    {
        return $this->fields['authenticated'] ?? null;
    }

    /**
     * @psalm-param self::AUTHENTICATED_*|null $authenticated
     */
    public function setAuthenticated(null|string $authenticated): self
    {
        $this->fields['authenticated'] = $authenticated;

        return $this;
    }

    /**
     * @psalm-return self::LIABILITY_*|null $liability
     */
    public function getLiability(): ?string
    {
        return $this->fields['liability'] ?? null;
    }

    /**
     * @psalm-param self::LIABILITY_*|null $liability
     */
    public function setLiability(null|string $liability): self
    {
        $this->fields['liability'] = $liability;

        return $this;
    }

    /**
     * @psalm-return self::FLOW_*|null $flow
     */
    public function getFlow(): ?string
    {
        return $this->fields['flow'] ?? null;
    }

    /**
     * @psalm-param self::FLOW_*|null $flow
     */
    public function setFlow(null|string $flow): self
    {
        $this->fields['flow'] = $flow;

        return $this;
    }

    public function getIsDowngraded(): ?bool
    {
        return $this->fields['isDowngraded'] ?? null;
    }

    public function setIsDowngraded(null|bool $isDowngraded): self
    {
        $this->fields['isDowngraded'] = $isDowngraded;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('server', $this->fields)) {
            $data['server'] = $this->fields['server'];
        }
        if (array_key_exists('version', $this->fields)) {
            $data['version'] = $this->fields['version'];
        }
        if (array_key_exists('enrolled', $this->fields)) {
            $data['enrolled'] = $this->fields['enrolled'];
        }
        if (array_key_exists('authenticated', $this->fields)) {
            $data['authenticated'] = $this->fields['authenticated'];
        }
        if (array_key_exists('liability', $this->fields)) {
            $data['liability'] = $this->fields['liability'];
        }
        if (array_key_exists('flow', $this->fields)) {
            $data['flow'] = $this->fields['flow'];
        }
        if (array_key_exists('isDowngraded', $this->fields)) {
            $data['isDowngraded'] = $this->fields['isDowngraded'];
        }

        return $data;
    }
}
