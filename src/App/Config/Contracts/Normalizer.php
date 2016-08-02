<?php

namespace App\Config\Contracts;

interface Normalizer
{
    /**
     * @param $value
     * @return mixed
     */
    public function normalize($value);
}
