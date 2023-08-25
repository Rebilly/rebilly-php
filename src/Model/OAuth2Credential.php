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

class OAuth2Credential implements ServiceCredential, JsonSerializable
{
    public const STATUS_ACTIVE = 'active';

    public const STATUS_INACTIVE = 'inactive';

    public const STATUS_DEACTIVATED = 'deactivated';

    public const TYPE_OAUTH2 = 'oauth2';

    public const ENCRYPTION_NONE = 'none';

    public const ENCRYPTION_TLS = 'tls';

    public const ENCRYPTION_SSL = 'ssl';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('hash', $data)) {
            $this->setHash($data['hash']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('deactivationTime', $data)) {
            $this->setDeactivationTime($data['deactivationTime']);
        }
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('service', $data)) {
            $this->setService($data['service']);
        }
        if (array_key_exists('code', $data)) {
            $this->setCode($data['code']);
        }
        if (array_key_exists('accessToken', $data)) {
            $this->setAccessToken($data['accessToken']);
        }
        if (array_key_exists('refreshToken', $data)) {
            $this->setRefreshToken($data['refreshToken']);
        }
        if (array_key_exists('scopes', $data)) {
            $this->setScopes($data['scopes']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
        if (array_key_exists('apiKey', $data)) {
            $this->setApiKey($data['apiKey']);
        }
        if (array_key_exists('auth', $data)) {
            $this->setAuth($data['auth']);
        }
        if (array_key_exists('omitFromAddress', $data)) {
            $this->setOmitFromAddress($data['omitFromAddress']);
        }
        if (array_key_exists('useStripe', $data)) {
            $this->setUseStripe($data['useStripe']);
        }
        if (array_key_exists('publicKey', $data)) {
            $this->setPublicKey($data['publicKey']);
        }
        if (array_key_exists('secret', $data)) {
            $this->setSecret($data['secret']);
        }
        if (array_key_exists('serverApiToken', $data)) {
            $this->setServerApiToken($data['serverApiToken']);
        }
        if (array_key_exists('password', $data)) {
            $this->setPassword($data['password']);
        }
        if (array_key_exists('websiteId', $data)) {
            $this->setWebsiteId($data['websiteId']);
        }
        if (array_key_exists('encryption', $data)) {
            $this->setEncryption($data['encryption']);
        }
        if (array_key_exists('host', $data)) {
            $this->setHost($data['host']);
        }
        if (array_key_exists('key', $data)) {
            $this->setKey($data['key']);
        }
        if (array_key_exists('configurationSetName', $data)) {
            $this->setConfigurationSetName($data['configurationSetName']);
        }
        if (array_key_exists('clientId', $data)) {
            $this->setClientId($data['clientId']);
        }
        if (array_key_exists('secretToken', $data)) {
            $this->setSecretToken($data['secretToken']);
        }
        if (array_key_exists('licenseKey', $data)) {
            $this->setLicenseKey($data['licenseKey']);
        }
        if (array_key_exists('accountId', $data)) {
            $this->setAccountId($data['accountId']);
        }
        if (array_key_exists('apiToken', $data)) {
            $this->setApiToken($data['apiToken']);
        }
        if (array_key_exists('port', $data)) {
            $this->setPort($data['port']);
        }
        if (array_key_exists('hmacKey', $data)) {
            $this->setHmacKey($data['hmacKey']);
        }
        if (array_key_exists('domain', $data)) {
            $this->setDomain($data['domain']);
        }
        if (array_key_exists('emailFrom', $data)) {
            $this->setEmailFrom($data['emailFrom']);
        }
        if (array_key_exists('region', $data)) {
            $this->setRegion($data['region']);
        }
        if (array_key_exists('username', $data)) {
            $this->setUsername($data['username']);
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

    public function getHash(): ?string
    {
        return $this->fields['hash'] ?? null;
    }

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    public function getDeactivationTime(): ?DateTimeImmutable
    {
        return $this->fields['deactivationTime'] ?? null;
    }

    public function getType(): string
    {
        return $this->fields['type'];
    }

    public function getService(): string
    {
        return $this->fields['service'];
    }

    public function setService(string $service): static
    {
        $this->fields['service'] = $service;

        return $this;
    }

    public function getCode(): string
    {
        return $this->fields['code'];
    }

    public function setCode(string $code): static
    {
        $this->fields['code'] = $code;

        return $this;
    }

    public function getAccessToken(): ?string
    {
        return $this->fields['accessToken'] ?? null;
    }

    public function getRefreshToken(): ?string
    {
        return $this->fields['refreshToken'] ?? null;
    }

    /**
     * @return string[]
     */
    public function getScopes(): array
    {
        return $this->fields['scopes'];
    }

    /**
     * @param string[] $scopes
     */
    public function setScopes(array $scopes): static
    {
        $scopes = array_map(
            fn ($value) => $value,
            $scopes,
        );

        $this->fields['scopes'] = $scopes;

        return $this;
    }

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    /**
     * @param null|array[]|ResourceLink[] $links
     */
    public function setLinks(null|array $links): static
    {
        $this->fields['_links'] = $links;

        return $this;
    }

    public function getApiKey(): string
    {
        return $this->fields['apiKey'];
    }

    public function setApiKey(string $apiKey): static
    {
        $this->fields['apiKey'] = $apiKey;

        return $this;
    }

    public function getAuth(): ?WebhookAuthorization
    {
        return $this->fields['auth'] ?? null;
    }

    public function setAuth(null|WebhookAuthorization|array $auth): static
    {
        if ($auth !== null && !($auth instanceof WebhookAuthorization)) {
            $auth = WebhookAuthorizationFactory::from($auth);
        }

        $this->fields['auth'] = $auth;

        return $this;
    }

    public function getOmitFromAddress(): ?bool
    {
        return $this->fields['omitFromAddress'] ?? null;
    }

    public function setOmitFromAddress(null|bool $omitFromAddress): static
    {
        $this->fields['omitFromAddress'] = $omitFromAddress;

        return $this;
    }

    public function getUseStripe(): ?bool
    {
        return $this->fields['useStripe'] ?? null;
    }

    public function setUseStripe(null|bool $useStripe): static
    {
        $this->fields['useStripe'] = $useStripe;

        return $this;
    }

    public function getPublicKey(): string
    {
        return $this->fields['publicKey'];
    }

    public function setPublicKey(string $publicKey): static
    {
        $this->fields['publicKey'] = $publicKey;

        return $this;
    }

    public function getSecret(): string
    {
        return $this->fields['secret'];
    }

    public function setSecret(string $secret): static
    {
        $this->fields['secret'] = $secret;

        return $this;
    }

    public function getServerApiToken(): string
    {
        return $this->fields['serverApiToken'];
    }

    public function setServerApiToken(string $serverApiToken): static
    {
        $this->fields['serverApiToken'] = $serverApiToken;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->fields['password'];
    }

    public function setPassword(string $password): static
    {
        $this->fields['password'] = $password;

        return $this;
    }

    public function getWebsiteId(): ?string
    {
        return $this->fields['websiteId'] ?? null;
    }

    public function setWebsiteId(null|string $websiteId): static
    {
        $this->fields['websiteId'] = $websiteId;

        return $this;
    }

    public function getEncryption(): ?string
    {
        return $this->fields['encryption'] ?? null;
    }

    public function setEncryption(null|string $encryption): static
    {
        $this->fields['encryption'] = $encryption;

        return $this;
    }

    public function getHost(): string
    {
        return $this->fields['host'];
    }

    public function setHost(string $host): static
    {
        $this->fields['host'] = $host;

        return $this;
    }

    public function getKey(): string
    {
        return $this->fields['key'];
    }

    public function setKey(string $key): static
    {
        $this->fields['key'] = $key;

        return $this;
    }

    public function getConfigurationSetName(): ?string
    {
        return $this->fields['configurationSetName'] ?? null;
    }

    public function setConfigurationSetName(null|string $configurationSetName): static
    {
        $this->fields['configurationSetName'] = $configurationSetName;

        return $this;
    }

    public function getClientId(): string
    {
        return $this->fields['clientId'];
    }

    public function setClientId(string $clientId): static
    {
        $this->fields['clientId'] = $clientId;

        return $this;
    }

    public function getSecretToken(): string
    {
        return $this->fields['secretToken'];
    }

    public function setSecretToken(string $secretToken): static
    {
        $this->fields['secretToken'] = $secretToken;

        return $this;
    }

    public function getLicenseKey(): string
    {
        return $this->fields['licenseKey'];
    }

    public function setLicenseKey(string $licenseKey): static
    {
        $this->fields['licenseKey'] = $licenseKey;

        return $this;
    }

    public function getAccountId(): string
    {
        return $this->fields['accountId'];
    }

    public function setAccountId(string $accountId): static
    {
        $this->fields['accountId'] = $accountId;

        return $this;
    }

    public function getApiToken(): string
    {
        return $this->fields['apiToken'];
    }

    public function setApiToken(string $apiToken): static
    {
        $this->fields['apiToken'] = $apiToken;

        return $this;
    }

    public function getPort(): ?int
    {
        return $this->fields['port'] ?? null;
    }

    public function setPort(null|int $port): static
    {
        $this->fields['port'] = $port;

        return $this;
    }

    public function getHmacKey(): string
    {
        return $this->fields['hmacKey'];
    }

    public function setHmacKey(string $hmacKey): static
    {
        $this->fields['hmacKey'] = $hmacKey;

        return $this;
    }

    public function getDomain(): string
    {
        return $this->fields['domain'];
    }

    public function setDomain(string $domain): static
    {
        $this->fields['domain'] = $domain;

        return $this;
    }

    public function getEmailFrom(): string
    {
        return $this->fields['emailFrom'];
    }

    public function setEmailFrom(string $emailFrom): static
    {
        $this->fields['emailFrom'] = $emailFrom;

        return $this;
    }

    public function getRegion(): string
    {
        return $this->fields['region'];
    }

    public function setRegion(string $region): static
    {
        $this->fields['region'] = $region;

        return $this;
    }

    public function getUsername(): string
    {
        return $this->fields['username'];
    }

    public function setUsername(string $username): static
    {
        $this->fields['username'] = $username;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('hash', $this->fields)) {
            $data['hash'] = $this->fields['hash'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('deactivationTime', $this->fields)) {
            $data['deactivationTime'] = $this->fields['deactivationTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('service', $this->fields)) {
            $data['service'] = $this->fields['service'];
        }
        if (array_key_exists('code', $this->fields)) {
            $data['code'] = $this->fields['code'];
        }
        if (array_key_exists('accessToken', $this->fields)) {
            $data['accessToken'] = $this->fields['accessToken'];
        }
        if (array_key_exists('refreshToken', $this->fields)) {
            $data['refreshToken'] = $this->fields['refreshToken'];
        }
        if (array_key_exists('scopes', $this->fields)) {
            $data['scopes'] = $this->fields['scopes'];
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }
        if (array_key_exists('apiKey', $this->fields)) {
            $data['apiKey'] = $this->fields['apiKey'];
        }
        if (array_key_exists('auth', $this->fields)) {
            $data['auth'] = $this->fields['auth']?->jsonSerialize();
        }
        if (array_key_exists('omitFromAddress', $this->fields)) {
            $data['omitFromAddress'] = $this->fields['omitFromAddress'];
        }
        if (array_key_exists('useStripe', $this->fields)) {
            $data['useStripe'] = $this->fields['useStripe'];
        }
        if (array_key_exists('publicKey', $this->fields)) {
            $data['publicKey'] = $this->fields['publicKey'];
        }
        if (array_key_exists('secret', $this->fields)) {
            $data['secret'] = $this->fields['secret'];
        }
        if (array_key_exists('serverApiToken', $this->fields)) {
            $data['serverApiToken'] = $this->fields['serverApiToken'];
        }
        if (array_key_exists('password', $this->fields)) {
            $data['password'] = $this->fields['password'];
        }
        if (array_key_exists('websiteId', $this->fields)) {
            $data['websiteId'] = $this->fields['websiteId'];
        }
        if (array_key_exists('encryption', $this->fields)) {
            $data['encryption'] = $this->fields['encryption'];
        }
        if (array_key_exists('host', $this->fields)) {
            $data['host'] = $this->fields['host'];
        }
        if (array_key_exists('key', $this->fields)) {
            $data['key'] = $this->fields['key'];
        }
        if (array_key_exists('configurationSetName', $this->fields)) {
            $data['configurationSetName'] = $this->fields['configurationSetName'];
        }
        if (array_key_exists('clientId', $this->fields)) {
            $data['clientId'] = $this->fields['clientId'];
        }
        if (array_key_exists('secretToken', $this->fields)) {
            $data['secretToken'] = $this->fields['secretToken'];
        }
        if (array_key_exists('licenseKey', $this->fields)) {
            $data['licenseKey'] = $this->fields['licenseKey'];
        }
        if (array_key_exists('accountId', $this->fields)) {
            $data['accountId'] = $this->fields['accountId'];
        }
        if (array_key_exists('apiToken', $this->fields)) {
            $data['apiToken'] = $this->fields['apiToken'];
        }
        if (array_key_exists('port', $this->fields)) {
            $data['port'] = $this->fields['port'];
        }
        if (array_key_exists('hmacKey', $this->fields)) {
            $data['hmacKey'] = $this->fields['hmacKey'];
        }
        if (array_key_exists('domain', $this->fields)) {
            $data['domain'] = $this->fields['domain'];
        }
        if (array_key_exists('emailFrom', $this->fields)) {
            $data['emailFrom'] = $this->fields['emailFrom'];
        }
        if (array_key_exists('region', $this->fields)) {
            $data['region'] = $this->fields['region'];
        }
        if (array_key_exists('username', $this->fields)) {
            $data['username'] = $this->fields['username'];
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setHash(null|string $hash): static
    {
        $this->fields['hash'] = $hash;

        return $this;
    }

    private function setDeactivationTime(null|DateTimeImmutable|string $deactivationTime): static
    {
        if ($deactivationTime !== null && !($deactivationTime instanceof DateTimeImmutable)) {
            $deactivationTime = new DateTimeImmutable($deactivationTime);
        }

        $this->fields['deactivationTime'] = $deactivationTime;

        return $this;
    }

    private function setType(string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    private function setAccessToken(null|string $accessToken): static
    {
        $this->fields['accessToken'] = $accessToken;

        return $this;
    }

    private function setRefreshToken(null|string $refreshToken): static
    {
        $this->fields['refreshToken'] = $refreshToken;

        return $this;
    }
}
