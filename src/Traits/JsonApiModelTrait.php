<?php
namespace CarloNicora\Minimalism\Modules\JsonApi\Traits;

use CarloNicora\JsonApi\Document;
use CarloNicora\JsonApi\Objects\Error;
use CarloNicora\Minimalism\Core\Modules\Interfaces\ResponseInterface;
use CarloNicora\Minimalism\Modules\JsonApi\JsonApiResponse;
use Exception;

trait JsonApiModelTrait
{
    /**
     * @param Document $document
     * @param string $status
     * @return JsonApiResponse
     */
    public function generateResponse(Document $document, string $status) : ResponseInterface
    {
        $response = new JsonApiResponse();

        $response->setDocument($document);
        $response->setStatus($status);

        $response->setContentType('application/vnd.api+json');

        return $response;
    }

    /**
     * @param Exception $e
     * @return ResponseInterface
     */
    public function generateResponseFromError(Exception $e): ResponseInterface
    {
        $response = new JsonApiResponse();

        $document = new Document();
        $document->addError(new Error($e));

        $response->setDocument($document);
        $response->setStatus($document->errors[0]->status ?? '500');

        return $response;
    }
}