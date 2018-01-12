<?php

namespace KodeKraft\OpenSwarm\Entities;

use Swagger\Document;
use Swagger\Exception\MissingDocumentPropertyException;
use Swagger\Object\PathItem;

/**
 * Class SwaggerEntity
 *
 * @package KodeKraft\OpenSwarm\Entities
 */
class SwaggerEntity extends Document
{
    /**
     * SwaggerEntity constructor.
     *
     * @param $json
     */
    public function __construct($json)
    {
        $document = \GuzzleHttp\json_decode($json);
        parent::__construct($document);
    }

    /**
     * @param string $path
     *
     * @return PathItem|null
     */
    public function getPath(string $path)
    {
        try {
            return parent::getPaths()->getItem($path);
        } catch (MissingDocumentPropertyException $e) {
            return null;
        }
    }

    /**
     * @param string      $path
     * @param PathItem    $pathItem
     * @param string|null $method
     *
     * @return SwaggerEntity
     */
    public function setPath(string $path, PathItem $pathItem, string $method = null)
    {
        $document = $this->getDocument();
        $document->paths = new \stdClass();
        $document->paths->$path = $pathItem->getDocument();

        if (isset($method)) {
            $document->paths->$path = new \stdClass();
            $document->paths->$path->$method = $pathItem->getDocument()->$method;
        }

            return $this;
    }

    /**
     * @return array
     */
    public function getPaths()
    {
        $paths = parent::getPaths()->getDocument();

        return json_decode(json_encode($paths), true);
    }
}
