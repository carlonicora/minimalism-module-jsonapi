<?php
namespace CarloNicora\Minimalism\Modules\JsonApi;

use CarloNicora\JsonApi\Document;
use CarloNicora\Minimalism\Core\Response;
use JsonException;

class JsonApiResponse extends Response
{
    /** @var Document|null */
    private ?Document $document = null;

    /**
     * @return Document
     */
    public function getDocument(): Document
    {
        return $this->document ?? new Document();
    }

    /**
     * @param Document $document
     */
    public function setDocument(Document $document): void
    {
        $this->document = $document;
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        if ($this->document !== null){
            try {
                return $this->document->export();
            } catch (JsonException $e) {
                return '';
            }
        }
        return parent::getData();
    }
}