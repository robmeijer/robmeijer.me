<?php

namespace App\Config;

use Pimple\Container;
use Symfony\Component\Config\Loader\LoaderInterface;

class Configurator
{
    /**
     * @var \Symfony\Component\Config\Loader\LoaderInterface
     */
    protected $loader;

    /**
     * Configurator constructor.
     *
     * @param LoaderInterface $loader
     */
    public function __construct(LoaderInterface $loader)
    {
        $this->loader = $loader;
    }

    /**
     * @param Container $container
     * @param $resource
     */
    public function configure(Container $container, $resource)
    {
        $parameters = $this->loader->load($resource);

        foreach ($parameters as $k => $v) {
            $container->offsetSet($k, $v);
        }
    }
}
