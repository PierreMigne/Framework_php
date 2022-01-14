<?php

namespace UserApp;

use Service\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return $this->container['twig']->render('home.html.twig', [
            'name' => 'John Doe',
        ]);
    }
}
