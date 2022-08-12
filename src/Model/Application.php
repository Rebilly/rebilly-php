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

class Application implements JsonSerializable
{
    public const STATUS_PENDING_APPROVAL = 'pending-approval';

    public const STATUS_AVAILABLE = 'available';

    public const STATUS_DISABLED = 'disabled';

    public const PERMISSIONS_POST_WEBHOOK_CREDENTIAL_HASH = 'PostWebhookCredentialHash';

    public const PERMISSIONS_POST_WEBHOOK = 'PostWebhook';

    public const PERMISSIONS_GET_WEBHOOK = 'GetWebhook';

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

    public const PERMISSIONS_GET_WEBSITE = 'GetWebsite';

    public const PERMISSIONS_GET_WEBSITE_COLLECTION = 'GetWebsiteCollection';

    public const PERMISSIONS_POST_COUPON = 'PostCoupon';

    public const PERMISSIONS_PUT_COUPON = 'PutCoupon';

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

    public function setName(string $name): self
    {
        $this->fields['name'] = $name;

        return $this;
    }

    public function getLogoId(): string
    {
        return $this->fields['logoId'];
    }

    public function setLogoId(string $logoId): self
    {
        $this->fields['logoId'] = $logoId;

        return $this;
    }

    public function getAuthorName(): string
    {
        return $this->fields['authorName'];
    }

    public function setAuthorName(string $authorName): self
    {
        $this->fields['authorName'] = $authorName;

        return $this;
    }

    public function getAuthorLogoId(): ?string
    {
        return $this->fields['authorLogoId'] ?? null;
    }

    public function setAuthorLogoId(null|string $authorLogoId): self
    {
        $this->fields['authorLogoId'] = $authorLogoId;

        return $this;
    }

    public function getTagline(): string
    {
        return $this->fields['tagline'];
    }

    public function setTagline(string $tagline): self
    {
        $this->fields['tagline'] = $tagline;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->fields['description'];
    }

    public function setDescription(string $description): self
    {
        $this->fields['description'] = $description;

        return $this;
    }

    /**
     * @psalm-return self::STATUS_*|null $status
     */
    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    /**
     * @return string[]
     *
     * @psalm-return self::PERMISSIONS_* $permissions
     */
    public function getPermissions(): array
    {
        return $this->fields['permissions'];
    }

    /**
     * @param string[] $permissions
     *
     * @psalm-param self::PERMISSIONS_* $permissions
     */
    public function setPermissions(array $permissions): self
    {
        $permissions = array_map(fn ($value) => $value ?? null, $permissions);

        $this->fields['permissions'] = $permissions;

        return $this;
    }

    public function getProperties(): ?array
    {
        return $this->fields['properties'] ?? null;
    }

    public function setProperties(null|array $properties): self
    {
        $this->fields['properties'] = $properties;

        return $this;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function setCreatedTime(null|DateTimeImmutable|string $createdTime): self
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    /**
     * @return null|array<\Rebilly\Sdk\Model\ApplicationInstanceLink|\Rebilly\Sdk\Model\AuthorLogoUrlLink|\Rebilly\Sdk\Model\LogoUrlLink|\Rebilly\Sdk\Model\SelfLink>
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
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
            $data['_links'] = $this->fields['_links'];
        }

        return $data;
    }

    private function setId(null|string $id): self
    {
        $this->fields['id'] = $id;

        return $this;
    }

    /**
     * @psalm-param self::STATUS_*|null $status
     */
    private function setStatus(null|string $status): self
    {
        $this->fields['status'] = $status;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): self
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }

    /**
     * @param null|array<\Rebilly\Sdk\Model\ApplicationInstanceLink|\Rebilly\Sdk\Model\AuthorLogoUrlLink|\Rebilly\Sdk\Model\LogoUrlLink|\Rebilly\Sdk\Model\SelfLink> $links
     */
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value ?? null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
