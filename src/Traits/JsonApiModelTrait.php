<?php
namespace CarloNicora\Minimalism\Modules\JsonApi\Traits;

use CarloNicora\JsonApi\Document;
use CarloNicora\Minimalism\Core\Modules\Interfaces\ResponseInterface;
use CarloNicora\Minimalism\Modules\JsonApi\JsonApiResponse;

trait JsonApiModelTrait
{
    /**
     * @param Document $document
     * @param string $status
     * @return JsonApiResponse
     */
    final public function generateResponse(Document $document, string $status) : ResponseInterface
    {
        $response = new JsonApiResponse();

        $response->setDocument($document);
        $response->setStatus($status);

        $response->setContentType('application/vnd.api+json');

        return $response;
    }
}