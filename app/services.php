<?php

use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\TwigServiceProvider;

$app->register(new ServiceControllerServiceProvider());
$app->register(new TwigServiceProvider(), [
    'twig.path' => __DIR__ . '/resources/views',
]);
