<?php


use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Database\Eloquent\Collection;

/** Easier service for improve/build/tune a JSON response */
class ResponseService
{
    private array  $responseData;

    private function setMessageFieldIfNotNull(?string $message)
    {
        if(!is_null($message)){
            $this->responseData['message'] = $message;
        }
    }

    /** Responses with success status and message if specified */
    public function successResponse(?string $message = null)
    {
        $this->responseData['success'] = true;
        $this->setMessageFieldIfNotNull($message);

        return response()->json($this->responseData);
    }

    /** Responses with error status, message if specified, error code if specified */
    public function errorResponse(?string $message = null, ?int $code = null)
    {
        $this->responseData['success'] = false;
        $this->setMessageFieldIfNotNull($message);

        return response()->json($this->responseData, $code ?? 200);
    }

    /** Responses with success status, key-value data and message if specified */
    public function successResponseWithKeyValueData(array $keyValueData, ?string $message = null)
    {
        $this->responseData['success'] = true;
        $this->setMessageFieldIfNotNull($message);
        $result = array_merge($this->responseData, $keyValueData);

        return response()->json($result);
    }

    /** Responses with error status, key-value data, message if specified, error code if specified */
    public function errorResponseWithKeyValueData(array $keyValueData, ?string $message = null, ?int $code = null)
    {
        $this->responseData['success'] = false;
        $this->setMessageFieldIfNotNull($message);
        $result = array_merge($this->responseData, $keyValueData);

        return response()->json($result, $code ?? 200);
    }

    /** Responses with error status, HttpResponseException */
    public function errorResponseWithException(string $message, int $code = 400)
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => $message,
            ], $code)
        );
    }

    /** Responses with success status, message, key-value data if specified and resource collection*/
    public function successResponseWithResourceCollection(
        string $message, string $resourceClassName, $collectionToResponse, ?array $info
    )
    {
        $resourceInstance = new $resourceClassName($collectionToResponse);
        $resourceCollectionClassName = $resourceClassName . 'Collection';
        return new $resourceCollectionClassName(true, $message, $resourceInstance, $info);
    }
}