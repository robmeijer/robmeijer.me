<?php

namespace App\Provider;

use App\Config\Configurator;
use App\Config\Loader\CacheLoader;
use App\Config\Loader\IniFileLoader;
use App\Config\Loader\JsonFileLoader;
use App\Config\Loader\NormalizerLoader;
use App\Config\Loader\PhpFileLoader;
use App\Config\Loader\YamlFileLoader;
use App\Config\Normalizer\ChainNormalizer;
use App\Config\Normalizer\EnvironmentNormalizer;
use App\Config\Normalizer\PimpleNormalizer;
use App\Config\Resource\ResourceCollection;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Loader\DelegatingLoader;
use Symfony\Component\Config\Loader\LoaderResolver;

class ConfigServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(Container $container)
    {
        $container['config.path'] = function (Container $container) {
            return [$container['root_dir'] . '/config'];
        };

        $container['config.locator'] = function (Container $container) {
            return new FileLocator($container['config.path']);
        };

        $container['config.resource_collection'] = function () {
            return new ResourceCollection();
        };

        $container['config.loader_resolver'] = function ($container) {
            return new LoaderResolver([
                new JsonFileLoader($container['config.locator'], $container['config.resource_collection']),
                new IniFileLoader($container['config.locator'], $container['config.resource_collection']),
                new PhpFileLoader($container['config.locator'], $container['config.resource_collection']),
                new YamlFileLoader($container['config.locator'], $container['config.resource_collection']),
            ]);
        };

        $container['config.normalizer'] = function (Container $container) {
            $normalizer = new ChainNormalizer();
            $normalizer->add(new PimpleNormalizer($container));
            $normalizer->add(new EnvironmentNormalizer());

            return $normalizer;
        };

        $container['config.cache_dir'] = $container['root_dir'] . '/cache/config';

        $container['config.loader'] = function (Container $container) {
            $loader = new NormalizerLoader(
                new DelegatingLoader($container['config.loader_resolver']),
                $container['config.normalizer']
            );
            $loader = new CacheLoader($loader, $container['config.resource_collection']);

            $loader->setCacheDir($container['config.cache_dir']);
            $loader->setDebug($container['debug']);

            return $loader;
        };

        $container['configurator'] = function (Container $container) {
            return new Configurator($container['config.loader']);
        };
    }
}
