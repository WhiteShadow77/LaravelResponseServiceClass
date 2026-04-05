<?php


namespace App\Services;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/** Easier service for setup/build a JSON response */
class ResponseService
{
    private const HTTP_OK = 200;
    private const HTTP_BAD_REQUEST = 400;
    private const HTTP_UNAUTHORIZED = 401;
    private const HTTP_FORBIDDEN = 403;
    private const HTTP_NOT_FOUND = 404;
    private const HTTP_UNPROCESSABLE_ENTITY = 422;

    private function makeJson(
        bool    $isSuccess,
        int     $code = self::HTTP_OK,
        ?string $message = null,
        ?array  $keyValueData = null
    )
    {
        $response = [
            'success' => $isSuccess,
        ];

        if ($message !== null) {
            $response['message'] = $message;
        }

        if ($keyValueData !== null) {
            $response = array_merge($response, $keyValueData);
        }

        return response()->json($response, $code);
    }


    /** Responses with success status and message if specified */
    public function success(?string $message = null)
    {
        return $this->makeJson(isSuccess: true, message: $message);
    }

    /** Responses with error status, message if specified, specific error code if specified */
    public function error(?string $message = null, ?int $code = self::HTTP_BAD_REQUEST)
    {
        return $this->makeJson(false, $code, $message);
    }

    /** Responses with success status, key-value data and message if specified */
    public function successWithKeyValueData(array $keyValueData, ?string $message = null)
    {
        return $this->makeJson(isSuccess: true, message: $message, keyValueData: $keyValueData);
    }

    /** Responses with error status, key-value data, message if specified, specific error code if specified */
    public function errorWithKeyValueData(array $keyValueData, ?string $message = null, ?int $code = self::HTTP_BAD_REQUEST)
    {
        return $this->makeJson(false, $code, $message, $keyValueData);
    }

    /** Responses with error status and  with HttpResponseException */
    public function errorWithException(string $message, ?int $code = self::HTTP_BAD_REQUEST)
    {
        throw new HttpResponseException(
            $this->makeJson(false, $code, $message)
        );
    }

    /** Responses with success status, message, additional data as key-value if specified and resource collection*/
    public function successWithResource(AnonymousResourceCollection $resource, ?string $message = null, ?array $additionalData = null)
    {
        $resourceData = $resource->resolve();
        $response = [
            'success' => true,
        ];

        if ($message !== null) {
            $response['message'] = $message;
        }

        if ($additionalData !== null) {
            if (sizeof($additionalData) > 1) {
                foreach ($additionalData as $key => $value) {
                    $response[$key] = current($value);
                }
            } else {
                $response[key($additionalData)] = current($additionalData);
            }
        }
        $response['data'] = $resourceData;

        return response()->json($response);
    }
}


