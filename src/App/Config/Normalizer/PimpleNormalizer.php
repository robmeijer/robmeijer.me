<?php

namespace App\Config\Normalizer;

use App\Config\Contracts\Normalizer;
use Pimple\Container;

class PimpleNormalizer implements Normalizer
{
    protected $container;

    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function normalize($value)
    {
        if (preg_match('{^%([a-z0-9_.]+)%$}', $value, $match)) {
            return isset($this->container[$match[1]]) ? $this->container[$match[1]] : $match[0];
        }

        $result = preg_replace_callback('{%%|%([a-z0-9_.]+)%}', [$this, 'callback'], $value, -1, $count);

        return $count ? $result : $value;
    }

    /**
     * @param  array $matches
     * @return mixed
     */
    protected function callback($matches)
    {
        if (! isset($matches[1])) {
            return '%%';
        }

        return isset($this->container[$matches[1]]) ? $this->container[$matches[1]] : $matches[0];
    }
}
