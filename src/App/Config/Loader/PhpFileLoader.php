<?php

namespace App\Config\Loader;

class PhpFileLoader extends AbstractLoader
{
    /**
     * {@inheritdoc}
     */
    protected function read($resource)
    {
        return require $resource;
    }

    /**
     * {@inheritdoc}
     */
    public function supports($resource, $type = null)
    {
        return is_string($resource) && pathinfo($resource, PATHINFO_EXTENSION) === 'php';
    }
}
