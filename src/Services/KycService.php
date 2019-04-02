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

namespace Rebilly\Services;

use ArrayObject;
use JsonSerializable;
use Rebilly\Entities\KycDocuments\KycDocument;
use Rebilly\Entities\KycDocuments\RejectionReason;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

final class KycService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return KycDocument[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'kyc-documents', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return KycDocument[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('kyc-documents', $params);
    }

    /**
     * @param string $kycDocumentId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does not exist
     *
     * @return KycDocument
     */
    public function load($kycDocumentId, $params = [])
    {
        return $this->client()->get('kyc-documents/{id}', ['id' => $kycDocumentId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|KycDocument $data
     * @param string $kycDocumentId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return KycDocument
     */
    public function create($data, $kycDocumentId = null)
    {
        if (isset($kycDocumentId)) {
            return $this->client()->put($data, 'kyc-documents/{id}', ['id' => $kycDocumentId]);
        }

        return $this->client()->post($data, 'kyc-documents');
    }

    /**
     * @param string $kycDocumentId
     * @param array|JsonSerializable|KycDocument $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return KycDocument
     */
    public function update($kycDocumentId, $data)
    {
        return $this->client()->put($data, 'kyc-documents/{id}', ['id' => $kycDocumentId]);
    }

    /**
     * @param string $kycDocumentId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return KycDocument
     */
    public function accept($kycDocumentId)
    {
        return $this->client()->post([], 'kyc-documents/{id}/acceptance', ['id' => $kycDocumentId]);
    }

    /**
     * @param string $kycDocumentId
     * @param array|JsonSerializable|RejectionReason $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return KycDocument
     */
    public function reject($kycDocumentId, $data)
    {
        return $this->client()->post($data, 'kyc-documents/{id}/rejection', ['id' => $kycDocumentId]);
    }
}
