<?php

namespace App\Config\Normalizer;

use App\Config\Contracts\Normalizer;

class EnvironmentNormalizer implements Normalizer
{
    /**
     * {@inheritDoc}
     */
    public function normalize($value)
    {
        $result = preg_replace_callback('{##|#([A-Z0-9_]+)#}', [$this, 'callback'], $value, -1, $count);

        return $count ? $result : $value;
    }

    /**
     * @param  array $matches
     * @return mixed
     */
    protected function callback($matches)
    {
        if (! isset($matches[1])) {
            return $matches[0];
        }

        if ($env = getenv($matches[1]) !== false) {
            return $env;
        };

        return $matches[0];
    }
}
