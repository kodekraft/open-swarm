<?php

namespace KodeKraft\OpenSwarm\Tests\Entities\OpenAPI\v2;

use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use KodeKraft\OpenSwarm\Entities\OpenAPI\v2\OpenAPI;
use KodeKraft\OpenSwarm\Tests\TestCase;

/**
 * Class OpenAPITest
 *
 * @package KodeKraft\OpenSwarm\Tests\Entities\OpenAPI\v2
 */
class OpenAPITest extends TestCase
{
    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        parent::setUp();

        $this->serializer = SerializerBuilder::create()
            ->addMetadataDir(app_path('Entities/OpenAPI/v2/Metadata'), 'KodeKraft\\OpenSwarm\\Entities\\OpenAPI\\v2')
            ->build();
    }

    /**
     * @test
     */
    public function deserializeSwagger()
    {
        $entity = $this->serializer->deserialize($this->getResource('swagger.json'), OpenAPI::class, 'json');

        $this->assertTrue($entity instanceof OpenAPI);
    }
}