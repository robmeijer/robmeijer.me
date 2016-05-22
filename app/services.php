<?php

use App\Repository\EmploymentRepo;
use App\Repository\SkillsRepo;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\TwigServiceProvider;

$app->register(new ServiceControllerServiceProvider());
$app->register(new TwigServiceProvider(), [
    'twig.path' => __DIR__ . '/resources/views',
]);

$app[EmploymentRepo::class] = new EmploymentRepo();
$app[SkillsRepo::class] = new SkillsRepo();
