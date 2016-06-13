<?php

use App\Repository\EmploymentRepo;
use App\Repository\SkillsRepo;

$app[EmploymentRepo::class] = function () {
    return new EmploymentRepo();
};

$app[SkillsRepo::class] = function () {
    return new SkillsRepo();
};
