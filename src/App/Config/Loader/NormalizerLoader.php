<?php

namespace App\Config\Loader;

use App\Config\Contracts\Normalizer;
use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Config\Loader\LoaderInterface;

class NormalizerLoader extends Loader
{
    /**
     * @var \App\Config\Contracts\Normalizer
     */
    protected $normalizer;
    /**
     * @var \Symfony\Component\Config\Loader\LoaderInterface
     */
    protected $loader;

    /**
     * @param LoaderInterface $loader
     * @param Normalizer $normalizer
     */
    public function __construct(LoaderInterface $loader, Normalizer $normalizer)
    {
        $this->loader = $loader;
        $this->normalizer = $normalizer;
    }

    /**
     * {@inheritdoc}
     */
    public function load($resource, $type = null)
    {
        $parameters = $this->loader->load($resource, $type);

        return array_map([$this, 'normalize'], $parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function supports($resource, $type = null)
    {
        return $this->loader->supports($resource, $type);
    }

    /**
     * @param $value
     * @return array|mixed
     */
    private function normalize($value)
    {
        if (is_array($value)) {
            return array_map([$this, 'normalize'], $value);
        }

        return $this->normalizer->normalize($value);
    }
}
