<?php

use App\Repository\ArrayEmployment;
use App\Repository\ArraySkills;
use App\Repository\Contracts\Employment;
use App\Repository\Contracts\Skills;

$app[Employment::class] = function () {
    return new ArrayEmployment();
};

$app[Skills::class] = function () {
    return new ArraySkills();
};
