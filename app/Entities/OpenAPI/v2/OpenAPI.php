<?php

namespace KodeKraft\OpenSwarm\Entities\OpenAPI\v2;

/**
 * Class OpenAPI
 *
 * @package KodeKraft\OpenSwarm\Entities\OpenAPI\v2
 */
class OpenAPI
{
    /**
     * @var string
     */
    private $swagger;

    /**
     * @var Info
     */
    private $info;

    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $basePath;

    /**
     * @var Tags[]
     */
    private $tags;

    /**
     * @var string[]
     */
    private $schemes;

    /**
     * @var array
     */
    private $paths;

    /**
     * @var SecurityScheme[]
     */
    private $securityDefinitions;

    /**
     * @var Definition[]
     */
    private $definitions;

    /**
     * @var ExternalDocs
     */
    private $externalDocs;

    /**
     * @return string
     */
    public function getSwagger(): string
    {
        return $this->swagger;
    }

    /**
     * @param string $swagger
     *
     * @return OpenAPI
     */
    public function setSwagger(string $swagger): OpenAPI
    {
        $this->swagger = $swagger;

        return $this;
    }

    /**
     * @return Info
     */
    public function getInfo(): Info
    {
        return $this->info;
    }

    /**
     * @param Info $info
     *
     * @return OpenAPI
     */
    public function setInfo(Info $info): OpenAPI
    {
        $this->info = $info;

        return $this;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @param string $host
     *
     * @return OpenAPI
     */
    public function setHost(string $host): OpenAPI
    {
        $this->host = $host;

        return $this;
    }

    /**
     * @return string
     */
    public function getBasePath(): string
    {
        return $this->basePath;
    }

    /**
     * @param string $basePath
     *
     * @return OpenAPI
     */
    public function setBasePath(string $basePath): OpenAPI
    {
        $this->basePath = $basePath;

        return $this;
    }

    /**
     * @return Tags[]
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param Tags[] $tags
     *
     * @return OpenAPI
     */
    public function setTags(array $tags): OpenAPI
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getSchemes(): array
    {
        return $this->schemes;
    }

    /**
     * @param string[] $schemes
     *
     * @return OpenAPI
     */
    public function setSchemes(array $schemes): OpenAPI
    {
        $this->schemes = $schemes;

        return $this;
    }

    /**
     * @return array
     */
    public function getPaths(): array
    {
        return $this->paths;
    }

    /**
     * @param array $paths
     *
     * @return OpenAPI
     */
    public function setPaths(array $paths): OpenAPI
    {
        $this->paths = $paths;

        return $this;
    }

    /**
     * @param string $path
     *
     * @return string[]|null
     */
    public function getPath(string $path)
    {
        return $this->paths[$path] ?? null;
    }

    /**
     * @return SecurityScheme[]
     */
    public function getSecurityDefinitions(): array
    {
        return $this->securityDefinitions;
    }

    /**
     * @param SecurityScheme[] $securityDefinitions
     *
     * @return OpenAPI
     */
    public function setSecurityDefinitions(array $securityDefinitions): OpenAPI
    {
        $this->securityDefinitions = $securityDefinitions;

        return $this;
    }

    /**
     * @return Definition[]
     */
    public function getDefinitions(): array
    {
        return $this->definitions;
    }

    /**
     * @param Definition[] $definitions
     *
     * @return OpenAPI
     */
    public function setDefinitions(array $definitions): OpenAPI
    {
        $this->definitions = $definitions;

        return $this;
    }

    /**
     * @return ExternalDocs
     */
    public function getExternalDocs(): ExternalDocs
    {
        return $this->externalDocs;
    }

    /**
     * @param ExternalDocs $externalDocs
     *
     * @return OpenAPI
     */
    public function setExternalDocs(ExternalDocs $externalDocs): OpenAPI
    {
        $this->externalDocs = $externalDocs;

        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultScheme()
    {
        return current($this->schemes);
    }

    /**
     * @return string
     */
    public function getAbsoluteUrl()
    {
        return
            $this->getDefaultScheme() .
            '://' .
            $this->getHost() .
            $this->getBasePath();
    }
}
