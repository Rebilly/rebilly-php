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
use DateTimeInterface;
use JsonSerializable;

class UserApplication implements JsonSerializable
{
    public const STATUS_PENDING_APPROVAL = 'pending-approval';

    public const STATUS_AVAILABLE = 'available';

    public const STATUS_DISABLED = 'disabled';

    public const PERMISSIONS_DELETE_APPLICATION_INSTANCE = 'DeleteApplicationInstance';

    public const PERMISSIONS_GET_APPLICATION_INSTANCE_CONFIGURATION = 'GetApplicationInstanceConfiguration';

    public const PERMISSIONS_GET_CUSTOMER = 'GetCustomer';

    public const PERMISSIONS_GET_CUSTOMER_COLLECTION = 'GetCustomerCollection';

    public const PERMISSIONS_GET_INVOICE = 'GetInvoice';

    public const PERMISSIONS_GET_INVOICE_COLLECTION = 'GetInvoiceCollection';

    public const PERMISSIONS_GET_PLAN = 'GetPlan';

    public const PERMISSIONS_GET_PLAN_COLLECTION = 'GetPlanCollection';

    public const PERMISSIONS_GET_PRODUCT = 'GetProduct';

    public const PERMISSIONS_GET_PRODUCT_COLLECTION = 'GetProductCollection';

    public const PERMISSIONS_GET_SUBSCRIPTION = 'GetSubscription';

    public const PERMISSIONS_GET_SUBSCRIPTION_COLLECTION = 'GetSubscriptionCollection';

    public const PERMISSIONS_GET_TRANSACTION = 'GetTransaction';

    public const PERMISSIONS_GET_TRANSACTION_COLLECTION = 'GetTransactionCollection';

    public const PERMISSIONS_GET_WEBHOOK = 'GetWebhook';

    public const PERMISSIONS_GET_WEBSITE = 'GetWebsite';

    public const PERMISSIONS_GET_WEBSITE_COLLECTION = 'GetWebsiteCollection';

    public const PERMISSIONS_POST_COUPON = 'PostCoupon';

    public const PERMISSIONS_POST_COUPON_REDEMPTION = 'PostCouponRedemption';

    public const PERMISSIONS_POST_GATEWAY_ACCOUNT_DOWNTIME_SCHEDULE = 'PostGatewayAccountDowntimeSchedule';

    public const PERMISSIONS_POST_PAYOUT = 'PostPayout';

    public const PERMISSIONS_POST_SERVICE_CREDENTIAL = 'PostServiceCredential';

    public const PERMISSIONS_POST_WEBHOOK = 'PostWebhook';

    public const PERMISSIONS_POST_WEBHOOK_CREDENTIAL_HASH = 'PostWebhookCredentialHash';

    public const PERMISSIONS_PUT_APPLICATION_INSTANCE_CONFIGURATION = 'PutApplicationInstanceConfiguration';

    public const PERMISSIONS_PUT_COUPON = 'PutCoupon';

    public const CONFIGURED_BY_USER = 'user';

    public const CONFIGURED_BY_APPLICATION = 'application';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('logoId', $data)) {
            $this->setLogoId($data['logoId']);
        }
        if (array_key_exists('authorName', $data)) {
            $this->setAuthorName($data['authorName']);
        }
        if (array_key_exists('authorLogoId', $data)) {
            $this->setAuthorLogoId($data['authorLogoId']);
        }
        if (array_key_exists('tagline', $data)) {
            $this->setTagline($data['tagline']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('permissions', $data)) {
            $this->setPermissions($data['permissions']);
        }
        if (array_key_exists('configurationUrl', $data)) {
            $this->setConfigurationUrl($data['configurationUrl']);
        }
        if (array_key_exists('configuredBy', $data)) {
            $this->setConfiguredBy($data['configuredBy']);
        }
        if (array_key_exists('properties', $data)) {
            $this->setProperties($data['properties']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
        if (array_key_exists('_embedded', $data)) {
            $this->setEmbedded($data['_embedded']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getName(): string
    {
        return $this->fields['name'];
    }

    public function setName(string $name): static
    {
        $this->fields['name'] = $name;

        return $this;
    }

    public function getLogoId(): string
    {
        return $this->fields['logoId'];
    }

    public function setLogoId(string $logoId): static
    {
        $this->fields['logoId'] = $logoId;

        return $this;
    }

    public function getAuthorName(): string
    {
        return $this->fields['authorName'];
    }

    public function setAuthorName(string $authorName): static
    {
        $this->fields['authorName'] = $authorName;

        return $this;
    }

    public function getAuthorLogoId(): ?string
    {
        return $this->fields['authorLogoId'] ?? null;
    }

    public function setAuthorLogoId(null|string $authorLogoId): static
    {
        $this->fields['authorLogoId'] = $authorLogoId;

        return $this;
    }

    public function getTagline(): string
    {
        return $this->fields['tagline'];
    }

    public function setTagline(string $tagline): static
    {
        $this->fields['tagline'] = $tagline;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->fields['description'];
    }

    public function setDescription(string $description): static
    {
        $this->fields['description'] = $description;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    /**
     * @return string[]
     */
    public function getPermissions(): array
    {
        return $this->fields['permissions'];
    }

    /**
     * @param string[] $permissions
     */
    public function setPermissions(array $permissions): static
    {
        $this->fields['permissions'] = $permissions;

        return $this;
    }

    public function getConfigurationUrl(): ?string
    {
        return $this->fields['configurationUrl'] ?? null;
    }

    public function setConfigurationUrl(null|string $configurationUrl): static
    {
        $this->fields['configurationUrl'] = $configurationUrl;

        return $this;
    }

    public function getConfiguredBy(): ?string
    {
        return $this->fields['configuredBy'] ?? null;
    }

    public function getProperties(): ?array
    {
        return $this->fields['properties'] ?? null;
    }

    public function setProperties(null|array $properties): static
    {
        $this->fields['properties'] = $properties;

        return $this;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function getEmbedded(): ?UserApplicationEmbedded
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function setEmbedded(null|UserApplicationEmbedded|array $embedded): static
    {
        if ($embedded !== null && !($embedded instanceof UserApplicationEmbedded)) {
            $embedded = UserApplicationEmbedded::from($embedded);
        }

        $this->fields['_embedded'] = $embedded;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('logoId', $this->fields)) {
            $data['logoId'] = $this->fields['logoId'];
        }
        if (array_key_exists('authorName', $this->fields)) {
            $data['authorName'] = $this->fields['authorName'];
        }
        if (array_key_exists('authorLogoId', $this->fields)) {
            $data['authorLogoId'] = $this->fields['authorLogoId'];
        }
        if (array_key_exists('tagline', $this->fields)) {
            $data['tagline'] = $this->fields['tagline'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('permissions', $this->fields)) {
            $data['permissions'] = $this->fields['permissions'];
        }
        if (array_key_exists('configurationUrl', $this->fields)) {
            $data['configurationUrl'] = $this->fields['configurationUrl'];
        }
        if (array_key_exists('configuredBy', $this->fields)) {
            $data['configuredBy'] = $this->fields['configuredBy'];
        }
        if (array_key_exists('properties', $this->fields)) {
            $data['properties'] = $this->fields['properties'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'] !== null
                ? array_map(
                    static fn (ResourceLink $resourceLink) => $resourceLink->jsonSerialize(),
                    $this->fields['_links'],
                )
                : null;
        }
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded']?->jsonSerialize();
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    private function setConfiguredBy(null|string $configuredBy): static
    {
        $this->fields['configuredBy'] = $configuredBy;

        return $this;
    }

    private function setCreatedTime(null|DateTimeImmutable|string $createdTime): static
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): static
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }

    /**
     * @param null|array[]|ResourceLink[] $links
     */
    private function setLinks(null|array $links): static
    {
        $links = $links !== null ? array_map(
            fn ($value) => $value instanceof ResourceLink ? $value : ResourceLink::from($value),
            $links,
        ) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
