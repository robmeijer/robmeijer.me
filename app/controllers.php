<?php

use App\Controller\ComingController;
use App\Controller\DefaultController;
use App\Repository\EmploymentRepo;
use App\Repository\SkillsRepo;

$app[DefaultController::class] = function() use ($app) {
    return new DefaultController(
        $app,
        $app[EmploymentRepo::class],
        $app[SkillsRepo::class]
    );
};

$app[ComingController::class] = function() use ($app) {
    return new ComingController($app);
};
