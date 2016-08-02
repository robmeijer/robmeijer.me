<?php

namespace App\Config\Loader;

use App\Config\Resource\ResourceCollection;
use Symfony\Component\Config\FileLocatorInterface;
use Symfony\Component\Config\Loader\FileLoader;
use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\Yaml\Yaml;

class YamlFileLoader extends FileLoader
{
    protected $resources;

    /**
     * {@inheritdoc}
     */
    public function __construct(FileLocatorInterface $locator, ResourceCollection $resources) {
        parent::__construct($locator);
        $this->resources = $resources;
    }

    /**
     * {@inheritdoc}
     */
    public function load($resource, $type = null)
    {
        $resource = $this->locator->locate($resource);

        $this->resources->add(new FileResource($resource));

        return $this->parse($this->read($resource), $resource);
    }

    /**
     * {@inheritdoc}
     */
    public function supports($resource, $type = null)
    {
        return is_string($resource) && pathinfo($resource, PATHINFO_EXTENSION) === 'yml';
    }

    /**
     * @param array $parameters
     * @param $resource
     * @return array
     * @throws \Symfony\Component\Config\Exception\FileLoaderImportCircularReferenceException
     * @throws \Symfony\Component\Config\Exception\FileLoaderLoadException
     */
    protected function parse(array $parameters, $resource)
    {
        if (!isset($parameters['@import'])) {
            return $parameters;
        }

        $imports = (array) $parameters['@import'];
        $inherited = [];

        unset($parameters['@import']);

        foreach ($imports as $import) {
            $this->setCurrentDir(dirname($import));

            $inherited = array_replace($inherited, $this->import($import, null, false, $resource));
        }

        return array_replace($inherited, $parameters);
    }

    /**
     * @param  $resource
     * @return array
     */
    protected function read($resource)
    {
        return Yaml::parse(file_get_contents($resource));
    }
}
