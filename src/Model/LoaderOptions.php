<?php
declare(strict_types=1);

namespace WildSiena\GoogleMapsBundle\Model;

class LoaderOptions
{
    protected string $apiKey;
    protected string $version;

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     * @return LoaderOptions
     */
    public function setApiKey(string $apiKey): LoaderOptions
    {
        $this->apiKey = $apiKey;
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
     * @return LoaderOptions
     */
    public function setVersion(string $version): LoaderOptions
    {
        $this->version = $version;
        return $this;
    }



}