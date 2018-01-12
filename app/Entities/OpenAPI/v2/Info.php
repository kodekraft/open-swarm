<?php

namespace KodeKraft\OpenSwarm\Entities\OpenAPI\v2;

/**
 * Class Info
 *
 * @package KodeKraft\OpenSwarm\Entities\OpenAPI\v2
 */
class Info
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $version;

    /**
     * @var string
     */
    private $termsOfService;

    /**
     * @var Contact
     */
    private $contact;

    /**
     * @var License
     */
    private $license;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return Info
     */
    public function setTitle(string $title): Info
    {
        $this->title = $title;

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
     * @return Info
     */
    public function setDescription(string $description): Info
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param string $version
     *
     * @return Info
     */
    public function setVersion(string $version): Info
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return string
     */
    public function getTermsOfService(): string
    {
        return $this->termsOfService;
    }

    /**
     * @param string $termsOfService
     *
     * @return Info
     */
    public function setTermsOfService(string $termsOfService): Info
    {
        $this->termsOfService = $termsOfService;

        return $this;
    }

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     *
     * @return Info
     */
    public function setContact(Contact $contact): Info
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return License
     */
    public function getLicense(): License
    {
        return $this->license;
    }

    /**
     * @param License $license
     *
     * @return Info
     */
    public function setLicense(License $license): Info
    {
        $this->license = $license;

        return $this;
    }
}
