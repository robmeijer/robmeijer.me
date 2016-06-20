<?php

namespace App\Repository\Contracts;

interface Employment
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function getPositions();
}
