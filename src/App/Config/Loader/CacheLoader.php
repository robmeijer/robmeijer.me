<?php

namespace App\Config\Loader;

use App\Config\Resource\ResourceCollection;
use Symfony\Component\Config\ConfigCache;
use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Config\Loader\LoaderInterface;

class CacheLoader extends Loader
{
    /**
     * @var \Symfony\Component\Config\Loader\LoaderInterface
     */
    protected $loader;

    /**
     * @var \App\Config\Resource\ResourceCollection;
     */
    protected $resourceCollection;
    /**
     * @var string
     */
    protected $cacheDir;
    /**
     * @var bool
     */
    protected $debug;

    /**
     * @param LoaderInterface $loader
     * @param ResourceCollection $resourceCollection
     */
    public function __construct($loader, ResourceCollection $resourceCollection)
    {
        $this->loader = $loader;
        $this->resourceCollection = $resourceCollection;
    }

    /**
     * {@inheritdoc}
     */
    public function load($resource, $type = null)
    {
        $parameters = [];
        $file = $this->cacheDir . '/' . crc32($resource) . '.php';
        $cache = new ConfigCache($file, $this->debug);

        if (! $cache->isFresh()) {
            $parameters = $this->loader->load($resource);
        }

        if ($this->cacheDir && isset($parameters)) {
            $cache->write(
                '<?php return ' . var_export($parameters, true) . ';',
                $this->resourceCollection->all()
            );
        }

        return $parameters ?: require $cache->getPath();
    }

    /**
     * {@inheritdoc}
     */
    public function supports($resource, $type = null)
    {
        return $this->loader->supports($resource, $type);
    }

    /**
     * @return string
     */
    public function getCacheDir()
    {
        return $this->cacheDir;
    }

    /**
     * @param string $cacheDir
     */
    public function setCacheDir($cacheDir)
    {
        $this->cacheDir = $cacheDir;
    }

    /**
     * @return boolean
     */
    public function getDebug()
    {
        return $this->debug;
    }

    /**
     * @param boolean $debug
     */
    public function setDebug($debug)
    {
        $this->debug = $debug;
    }
}
