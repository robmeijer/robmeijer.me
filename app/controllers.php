<?php

use App\Controller\ComingController;
use App\Controller\DefaultController;
use App\Repository\Contracts\Employment;
use App\Repository\Contracts\Skills;

$app[DefaultController::class] = function () use ($app) {
    return new DefaultController(
        $app,
        $app[Employment::class],
        $app[Skills::class]
    );
};

$app[ComingController::class] = function () use ($app) {
    return new ComingController($app);
};
