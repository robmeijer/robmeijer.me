<?php

namespace App\Controller;

class DefaultController extends Controller
{
    public function __invoke()
    {
        return $this->render('default.html.twig');
    }
}
