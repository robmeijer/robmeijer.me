<?php

namespace App\Provider;

use App\Config\Configurator;
use App\Config\Loader\CacheLoader;
use App\Config\Loader\YamlFileLoader;
use App\Config\Resource\ResourceCollection;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Symfony\Component\Config\FileLocator;

class ConfigServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $container A container instance
     */
    public function register(Container $container)
    {

        $container['config.path'] = function(Container $container) {
            return [$container['root_dir'] . '/config'];
        };

        $container['config.locator'] = function(Container $container) {
            return new FileLocator($container['config.path']);
        };

        $container['config.resource_collection'] = function (Container $container) {
            return new ResourceCollection();
        };

        $container['config.yaml_file_loader'] = function(Container $container) {
            return new YamlFileLoader($container['config.locator'], $container['config.resource_collection']);
        };

        $container['config.cache_dir'] = $container['root_dir'] . '/cache/config';

        $container['config.loader'] = function (Container $container) {
            $loader = new CacheLoader($container['config.yaml_file_loader'], $container['config.resource_collection']);

            $loader->setCacheDir($container['config.cache_dir']);
            $loader->setDebug($container['debug']);

            return $loader;
        };

        $container['configurator'] = function (Container $container) {
            return new Configurator($container['config.loader']);
        };
    }
}
