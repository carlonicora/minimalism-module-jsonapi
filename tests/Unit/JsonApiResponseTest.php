<?php
namespace CarloNicora\Minimalism\Modules\JsonApi\Tests\Unit;

use CarloNicora\JsonApi\Document;
use CarloNicora\Minimalism\Core\Modules\Interfaces\ResponseInterface;
use CarloNicora\Minimalism\Modules\JsonApi\JsonApiResponse;
use Exception;
use PHPUnit\Framework\TestCase;

class JsonApiResponseTest extends TestCase
{
    /** @var array */
    private array $documentArray = [
        'data' => [
            'type' => 'author',
            'id' => '1'
        ]
    ];

    /**
     * @return ResponseInterface
     * @throws Exception
     */
    public function testDocumentSetterGetter() : ResponseInterface
    {
        $response = new JsonApiResponse();

        $document = new Document($this->documentArray);

        $response->setDocument($document);
        $this->assertEquals($document, $response->getDocument());

        return $response;
    }

    /**
     * @param ResponseInterface $response
     * @depends testDocumentSetterGetter
     * @throws Exception
     */
    public function testResponseGetData(ResponseInterface $response) : void
    {
        $document = new Document($this->documentArray);
        $expectedResponse = $document->export();

        $this->assertEquals($expectedResponse, $response->getData());
    }
}