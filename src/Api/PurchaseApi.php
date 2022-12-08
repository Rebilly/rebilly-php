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
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Utils;
use InvalidArgumentException;
use Rebilly\Sdk\Model\CoreReadyToPay;
use TypeError;

class PurchaseApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return ReadyToPayAchMethod|ReadyToPayGenericMethod|ReadyToPayKlarnaMethod[]|ReadyToPayPaymentCardMethod|ReadyToPayPayPalMethod
     */
    public function readyToPay(
        ?CoreReadyToPay $coreReadyToPay = null,
    ): array {
        $uri = '/ready-to-pay';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($coreReadyToPay));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return array_map(fn (array $item): ReadyToPayPaymentCardMethod|ReadyToPayAchMethod|ReadyToPayGenericMethod|ReadyToPayPayPalMethod|ReadyToPayKlarnaMethod => ReadyToPayPaymentCardMethod | ReadyToPayAchMethod | ReadyToPayGenericMethod | ReadyToPayPayPalMethod | ReadyToPayKlarnaMethod::from($item), $data);
    }

    protected function buildReadyToPayMethodsResponse(array $data): ReadyToPayPaymentCardMethod|ReadyToPayAchMethod|ReadyToPayGenericMethod|ReadyToPayPayPalMethod|ReadyToPayKlarnaMethod
    {
        $candidates = [];

        try {
            $instance = ReadyToPayPaymentCardMethod::from($data);
            $candidates[] = [$instance, count(array_intersect_key($data, $instance->jsonSerialize()))];
        } catch (InvalidArgumentException|TypeError) {
        }

        try {
            $instance = ReadyToPayAchMethod::from($data);
            $candidates[] = [$instance, count(array_intersect_key($data, $instance->jsonSerialize()))];
        } catch (InvalidArgumentException|TypeError) {
        }

        try {
            $instance = ReadyToPayGenericMethod::from($data);
            $candidates[] = [$instance, count(array_intersect_key($data, $instance->jsonSerialize()))];
        } catch (InvalidArgumentException|TypeError) {
        }

        try {
            $instance = ReadyToPayPayPalMethod::from($data);
            $candidates[] = [$instance, count(array_intersect_key($data, $instance->jsonSerialize()))];
        } catch (InvalidArgumentException|TypeError) {
        }

        try {
            $instance = ReadyToPayKlarnaMethod::from($data);
            $candidates[] = [$instance, count(array_intersect_key($data, $instance->jsonSerialize()))];
        } catch (InvalidArgumentException|TypeError) {
        }

        $determined = array_reduce($candidates, function (?array $current, array $candidate) {
            if ($current === null || $current[1] < $candidate[1]) {
                $current = $candidate;
            }

            return $current;
        });

        if ($determined[0] === null) {
            throw new InvalidArgumentException('Could not instantiate ReadyToPayMethods response with the given value');
        }

        return $determined[0];
    }
}
