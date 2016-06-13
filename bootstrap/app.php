<?php

$app = new \App();

require_once $app['root_dir'] . '/services.php';
require_once $app['root_dir'] . '/controllers.php';
require_once $app['root_dir'] . '/routes.php';

$app->configure($app['root_dir'] . '/config/config.yml');

return $app;
