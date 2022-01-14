<?php

namespace UserApp;

use Service\Controller;

class NotFoundController extends Controller
{

    public function index()
    {
        return $this->container['twig']->render('notFound.html.twig');
    }
}
