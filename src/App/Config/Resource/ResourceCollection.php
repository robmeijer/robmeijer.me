<?php

namespace App\Config\Resource;

use Symfony\Component\Config\Resource\ResourceInterface;

class ResourceCollection
{
    protected $collection = [];

    public function add(ResourceInterface $resource)
    {
        $this->collection[] = $resource;
    }

    public function all()
    {
        return $this->collection;
    }
}
