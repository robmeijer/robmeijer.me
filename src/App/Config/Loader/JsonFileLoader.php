<?php

namespace App\Config\Loader;

class JsonFileLoader extends AbstractLoader
{
    protected function read($resource)
    {
        return json_decode(file_get_contents($resource), true);
    }

    /**
     * {@inheritDoc}
     */
    public function supports($resource, $type = null)
    {
        return is_string($resource) && pathinfo($resource, PATHINFO_EXTENSION) === 'json';
    }
}
