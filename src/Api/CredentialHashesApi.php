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

namespace Rebilly\Sdk\Api;

use GuzzleHttp\ClientInterface;

use function GuzzleHttp\json_decode;
use function GuzzleHttp\json_encode;

use GuzzleHttp\Psr7\Request;
use Rebilly\Sdk\Collection;
use Rebilly\Sdk\Model\ExperianCredential;
use Rebilly\Sdk\Model\GoogleSpreadsheet;
use Rebilly\Sdk\Model\MailgunCredential;
use Rebilly\Sdk\Model\OAuth2Credential;
use Rebilly\Sdk\Model\PatchCredential;
use Rebilly\Sdk\Model\PlaidCredential;
use Rebilly\Sdk\Model\PostmarkCredential;
use Rebilly\Sdk\Model\SendGridCredential;
use Rebilly\Sdk\Model\SESCredential;
use Rebilly\Sdk\Model\SmtpCredential;
use Rebilly\Sdk\Model\TaxJarCredential;
use Rebilly\Sdk\Model\WebhookCredential;
use Rebilly\Sdk\Paginator;

class CredentialHashesApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return SESCredential
     */
    public function createAWSSESCredential(
        SESCredential $sESCredential,
    ): SESCredential {
        $uri = '/credential-hashes/aws-ses';

        $request = new Request('POST', $uri, body: json_encode($sESCredential));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return SESCredential::from($data);
    }

    /**
     * @return SmtpCredential
     */
    public function createEmailCredential(
        SmtpCredential $smtpCredential,
    ): SmtpCredential {
        $uri = '/credential-hashes/emails';

        $request = new Request('POST', $uri, body: json_encode($smtpCredential));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return SmtpCredential::from($data);
    }

    /**
     * @return ExperianCredential
     */
    public function createExperianCredential(
        ExperianCredential $experianCredential,
    ): ExperianCredential {
        $uri = '/credential-hashes/experian';

        $request = new Request('POST', $uri, body: json_encode($experianCredential));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return ExperianCredential::from($data);
    }

    /**
     * @return MailgunCredential
     */
    public function createMailgunCredential(
        MailgunCredential $mailgunCredential,
    ): MailgunCredential {
        $uri = '/credential-hashes/mailgun';

        $request = new Request('POST', $uri, body: json_encode($mailgunCredential));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return MailgunCredential::from($data);
    }

    /**
     * @return OAuth2Credential
     */
    public function createOAuth2Credential(
        OAuth2Credential $oAuth2Credential,
    ): OAuth2Credential {
        $uri = '/credential-hashes/oauth2';

        $request = new Request('POST', $uri, body: json_encode($oAuth2Credential));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return OAuth2Credential::from($data);
    }

    /**
     * @return PlaidCredential
     */
    public function createPlaidCredential(
        PlaidCredential $plaidCredential,
    ): PlaidCredential {
        $uri = '/credential-hashes/plaid';

        $request = new Request('POST', $uri, body: json_encode($plaidCredential));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return PlaidCredential::from($data);
    }

    /**
     * @return PostmarkCredential
     */
    public function createPostmarkCredential(
        PostmarkCredential $postmarkCredential,
    ): PostmarkCredential {
        $uri = '/credential-hashes/postmark';

        $request = new Request('POST', $uri, body: json_encode($postmarkCredential));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return PostmarkCredential::from($data);
    }

    /**
     * @return SendGridCredential
     */
    public function createSendGridCredential(
        SendGridCredential $sendGridCredential,
    ): SendGridCredential {
        $uri = '/credential-hashes/sendgrid';

        $request = new Request('POST', $uri, body: json_encode($sendGridCredential));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return SendGridCredential::from($data);
    }

    /**
     * @return TaxJarCredential
     */
    public function createTaxJarCredential(
        TaxJarCredential $taxJarCredential,
    ): TaxJarCredential {
        $uri = '/credential-hashes/taxjar';

        $request = new Request('POST', $uri, body: json_encode($taxJarCredential));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return TaxJarCredential::from($data);
    }

    /**
     * @return WebhookCredential
     */
    public function createWebhookCredential(
        WebhookCredential $webhookCredential,
    ): WebhookCredential {
        $uri = '/credential-hashes/webhooks';

        $request = new Request('POST', $uri, body: json_encode($webhookCredential));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return WebhookCredential::from($data);
    }

    /**
     * @return SESCredential
     */
    public function getAWSSESCredential(
        string $hash,
    ): SESCredential {
        $pathParams = [
            '{hash}' => $hash,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credential-hashes/aws-ses/{hash}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return SESCredential::from($data);
    }

    /**
     * @return Collection<ExperianCredential>
     */
    public function getAllExperianCredentials(
        ?string $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $q = null,
    ): Collection {
        $queryParams = [
            'filter' => $filter,
            'limit' => $limit,
            'offset' => $offset,
            'sort' => $sort,
            'q' => $q,
        ];
        $uri = '/credential-hashes/experian?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): ExperianCredential => ExperianCredential::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllExperianCredentialsPaginator(
        ?string $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $q = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAllExperianCredentials(
            filter: $filter,
            limit: $limit,
            offset: $offset,
            sort: $sort,
            q: $q,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return Collection<OAuth2Credential>
     */
    public function getAllOAuth2Credentials(
        ?string $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $q = null,
    ): Collection {
        $queryParams = [
            'filter' => $filter,
            'limit' => $limit,
            'offset' => $offset,
            'sort' => $sort,
            'q' => $q,
        ];
        $uri = '/credential-hashes/oauth2?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): OAuth2Credential => OAuth2Credential::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllOAuth2CredentialsPaginator(
        ?string $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $q = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAllOAuth2Credentials(
            filter: $filter,
            limit: $limit,
            offset: $offset,
            sort: $sort,
            q: $q,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return Collection<PlaidCredential>
     */
    public function getAllPlaidCredentials(
        ?string $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $q = null,
    ): Collection {
        $queryParams = [
            'filter' => $filter,
            'limit' => $limit,
            'offset' => $offset,
            'sort' => $sort,
            'q' => $q,
        ];
        $uri = '/credential-hashes/plaid?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): PlaidCredential => PlaidCredential::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllPlaidCredentialsPaginator(
        ?string $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $q = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAllPlaidCredentials(
            filter: $filter,
            limit: $limit,
            offset: $offset,
            sort: $sort,
            q: $q,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return Collection<TaxJarCredential>
     */
    public function getAllTaxJarCredentials(
        ?string $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $q = null,
    ): Collection {
        $queryParams = [
            'filter' => $filter,
            'limit' => $limit,
            'offset' => $offset,
            'sort' => $sort,
            'q' => $q,
        ];
        $uri = '/credential-hashes/taxjar?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): TaxJarCredential => TaxJarCredential::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllTaxJarCredentialsPaginator(
        ?string $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $q = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAllTaxJarCredentials(
            filter: $filter,
            limit: $limit,
            offset: $offset,
            sort: $sort,
            q: $q,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return SmtpCredential
     */
    public function getEmailCredential(
        string $hash,
    ): SmtpCredential {
        $pathParams = [
            '{hash}' => $hash,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credential-hashes/emails/{hash}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return SmtpCredential::from($data);
    }

    /**
     * @return ExperianCredential
     */
    public function getExperianCredential(
        string $hash,
    ): ExperianCredential {
        $pathParams = [
            '{hash}' => $hash,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credential-hashes/experian/{hash}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return ExperianCredential::from($data);
    }

    /**
     * @return MailgunCredential
     */
    public function getMailgunCredential(
        string $hash,
    ): MailgunCredential {
        $pathParams = [
            '{hash}' => $hash,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credential-hashes/mailgun/{hash}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return MailgunCredential::from($data);
    }

    /**
     * @return OAuth2Credential
     */
    public function getOAuth2Credential(
        string $hash,
    ): OAuth2Credential {
        $pathParams = [
            '{hash}' => $hash,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credential-hashes/oauth2/{hash}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return OAuth2Credential::from($data);
    }

    /**
     * @return Collection<GoogleSpreadsheet>
     */
    public function getOAuth2CredentialItems(
        string $hash,
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?string $q = null,
        ?string $fields = null,
        ?array $sort = null,
    ): Collection {
        $pathParams = [
            '{hash}' => $hash,
        ];

        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'q' => $q,
            'fields' => $fields,
            'sort' => $sort,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credential-hashes/oauth2/{hash}/items?') . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): GoogleSpreadsheet => GoogleSpreadsheet::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getOAuth2CredentialItemsPaginator(
        string $hash,
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?string $q = null,
        ?string $fields = null,
        ?array $sort = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getOAuth2CredentialItems(
            hash: $hash,
            limit: $limit,
            offset: $offset,
            filter: $filter,
            q: $q,
            fields: $fields,
            sort: $sort,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return PlaidCredential
     */
    public function getPlaidCredential(
        string $hash,
    ): PlaidCredential {
        $pathParams = [
            '{hash}' => $hash,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credential-hashes/plaid/{hash}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return PlaidCredential::from($data);
    }

    /**
     * @return PostmarkCredential
     */
    public function getPostmarkCredential(
        string $hash,
    ): PostmarkCredential {
        $pathParams = [
            '{hash}' => $hash,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credential-hashes/postmark/{hash}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return PostmarkCredential::from($data);
    }

    /**
     * @return SendGridCredential
     */
    public function getSendGridCredential(
        string $hash,
    ): SendGridCredential {
        $pathParams = [
            '{hash}' => $hash,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credential-hashes/sendgrid/{hash}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return SendGridCredential::from($data);
    }

    /**
     * @return TaxJarCredential
     */
    public function getTaxJarCredential(
        string $hash,
    ): TaxJarCredential {
        $pathParams = [
            '{hash}' => $hash,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credential-hashes/taxjar/{hash}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return TaxJarCredential::from($data);
    }

    /**
     * @return WebhookCredential
     */
    public function getWebhookCredential(
        string $hash,
    ): WebhookCredential {
        $pathParams = [
            '{hash}' => $hash,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credential-hashes/webhooks/{hash}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return WebhookCredential::from($data);
    }

    /**
     * @return SmtpCredential
     */
    public function patchEmailCredential(
        string $hash,
        PatchCredential $patchCredential,
    ): SmtpCredential {
        $pathParams = [
            '{hash}' => $hash,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credential-hashes/emails/{hash}');

        $request = new Request('PATCH', $uri, body: json_encode($patchCredential));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return SmtpCredential::from($data);
    }

    /**
     * @return MailgunCredential
     */
    public function patchMailgunCredential(
        string $hash,
        PatchCredential $patchCredential,
    ): MailgunCredential {
        $pathParams = [
            '{hash}' => $hash,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credential-hashes/mailgun/{hash}');

        $request = new Request('PATCH', $uri, body: json_encode($patchCredential));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return MailgunCredential::from($data);
    }

    /**
     * @return PostmarkCredential
     */
    public function patchPostmarkCredential(
        string $hash,
        PatchCredential $patchCredential,
    ): PostmarkCredential {
        $pathParams = [
            '{hash}' => $hash,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credential-hashes/postmark/{hash}');

        $request = new Request('PATCH', $uri, body: json_encode($patchCredential));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return PostmarkCredential::from($data);
    }

    /**
     * @return SendGridCredential
     */
    public function patchSendGridCredential(
        string $hash,
        PatchCredential $patchCredential,
    ): SendGridCredential {
        $pathParams = [
            '{hash}' => $hash,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credential-hashes/sendgrid/{hash}');

        $request = new Request('PATCH', $uri, body: json_encode($patchCredential));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return SendGridCredential::from($data);
    }

    /**
     * @return WebhookCredential
     */
    public function patchWebhookCredential(
        string $hash,
        PatchCredential $patchCredential,
    ): WebhookCredential {
        $pathParams = [
            '{hash}' => $hash,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credential-hashes/webhooks/{hash}');

        $request = new Request('PATCH', $uri, body: json_encode($patchCredential));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return WebhookCredential::from($data);
    }

    /**
     * @return SESCredential
     */
    public function updateAWSSESCredential(
        string $hash,
        PatchCredential $patchCredential,
    ): SESCredential {
        $pathParams = [
            '{hash}' => $hash,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credential-hashes/aws-ses/{hash}');

        $request = new Request('PATCH', $uri, body: json_encode($patchCredential));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return SESCredential::from($data);
    }

    /**
     * @return ExperianCredential
     */
    public function updateExperianCredential(
        string $hash,
        PatchCredential $patchCredential,
    ): ExperianCredential {
        $pathParams = [
            '{hash}' => $hash,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credential-hashes/experian/{hash}');

        $request = new Request('PATCH', $uri, body: json_encode($patchCredential));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return ExperianCredential::from($data);
    }

    /**
     * @return OAuth2Credential
     */
    public function updateOAuth2Credential(
        string $hash,
        OAuth2Credential $oAuth2Credential,
    ): OAuth2Credential {
        $pathParams = [
            '{hash}' => $hash,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credential-hashes/oauth2/{hash}');

        $request = new Request('PATCH', $uri, body: json_encode($oAuth2Credential));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return OAuth2Credential::from($data);
    }

    /**
     * @return PlaidCredential
     */
    public function updatePlaidCredential(
        string $hash,
        PatchCredential $patchCredential,
    ): PlaidCredential {
        $pathParams = [
            '{hash}' => $hash,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credential-hashes/plaid/{hash}');

        $request = new Request('PATCH', $uri, body: json_encode($patchCredential));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return PlaidCredential::from($data);
    }

    /**
     * @return TaxJarCredential
     */
    public function updateTaxJarCredential(
        string $hash,
        PatchCredential $patchCredential,
    ): TaxJarCredential {
        $pathParams = [
            '{hash}' => $hash,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credential-hashes/taxjar/{hash}');

        $request = new Request('PATCH', $uri, body: json_encode($patchCredential));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return TaxJarCredential::from($data);
    }
}
