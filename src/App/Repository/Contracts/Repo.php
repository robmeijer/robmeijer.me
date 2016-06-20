<?php

namespace App\Repository\Contracts;

interface Repo
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function get();
}
