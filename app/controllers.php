<?php

use App\Controller\ComingController;
use App\Controller\DefaultController;

$app[DefaultController::class] = function() use ($app) {
    return new DefaultController($app);
};

$app[ComingController::class] = function() use ($app) {
    return new ComingController($app);
};
