<?php

namespace App\Controller;

use \App;
use Symfony\Component\HttpFoundation\Response;

abstract class Controller
{
    /**
     * @var \Silex\Application
     */
    protected $app;

    /**
     * Controller constructor.
     *
     * @param $app
     */
    public function __construct(App $app)
    {
        $this->app = $app;
    }

    /**
     * @param $view
     * @param array $parameters
     * @param Response|null $response
     * @return Response
     */
    public function render($view, array $parameters = [], Response $response = null)
    {
        return $this->app->render($view, $parameters, $response);
    }
}
