<?php

namespace App\Config\Loader;

class IniFileLoader extends AbstractLoader
{
    protected function read($resource)
    {
        return parse_ini_file($resource, true, INI_SCANNER_RAW);
    }

    /**
     * {@inheritDoc}
     */
    public function supports($resource, $type = null)
    {
        return is_string($resource) && pathinfo($resource, PATHINFO_EXTENSION) === 'ini';
    }
}
