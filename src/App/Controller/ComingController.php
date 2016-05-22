<?php

namespace App\Controller;

class ComingController extends Controller
{
    public function __invoke()
    {
        return $this->render('coming.html.twig');
    }
}