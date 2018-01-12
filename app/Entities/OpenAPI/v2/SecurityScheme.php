<?php

namespace KodeKraft\OpenSwarm\Entities\OpenAPI\v2;

/**
 * Class SecurityScheme
 *
 * @package KodeKraft\OpenSwarm\Entities\OpenAPI\v2
 */
class SecurityScheme
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $in;

    /**
     * @var string
     */
    private $flow;

    /**
     * @var string
     */
    private $authorizationUrl;

    /**
     * @var string
     */
    private $tokenUrl;

    /**
     * @var string[]
     */
    private $scopes;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return SecurityScheme
     */
    public function setType(string $type): SecurityScheme
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return SecurityScheme
     */
    public function setDescription(string $description): SecurityScheme
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return SecurityScheme
     */
    public function setName(string $name): SecurityScheme
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getIn(): string
    {
        return $this->in;
    }

    /**
     * @param string $in
     *
     * @return SecurityScheme
     */
    public function setIn(string $in): SecurityScheme
    {
        $this->in = $in;

        return $this;
    }

    /**
     * @return string
     */
    public function getFlow(): string
    {
        return $this->flow;
    }

    /**
     * @param string $flow
     *
     * @return SecurityScheme
     */
    public function setFlow(string $flow): SecurityScheme
    {
        $this->flow = $flow;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthorizationUrl(): string
    {
        return $this->authorizationUrl;
    }

    /**
     * @param string $authorizationUrl
     *
     * @return SecurityScheme
     */
    public function setAuthorizationUrl(string $authorizationUrl): SecurityScheme
    {
        $this->authorizationUrl = $authorizationUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getTokenUrl(): string
    {
        return $this->tokenUrl;
    }

    /**
     * @param string $tokenUrl
     *
     * @return SecurityScheme
     */
    public function setTokenUrl(string $tokenUrl): SecurityScheme
    {
        $this->tokenUrl = $tokenUrl;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getScopes(): array
    {
        return $this->scopes;
    }

    /**
     * @param string[] $scopes
     *
     * @return SecurityScheme
     */
    public function setScopes(array $scopes): SecurityScheme
    {
        $this->scopes = $scopes;

        return $this;
    }
}
