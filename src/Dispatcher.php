<?php

namespace Service;

class Dispatcher
{
    private Container $container;
    private string $response = '';

    public function __construct(private Request $request)
    {
        $this->container = App::get();
    }

    public function run()
    {
        // récupère la route à l'aide du router => nom du contrôleur + méthode avec ses paramètres éventuels
        // puis lance la méthode send() pour afficher la réponse.
        $routes = $this->container['router'];
        $parameters = $this->request->getRequest();
        $route = $routes->getRoute(array_shift($parameters)) ?? new Route('/404', 'NotFoundController');

        $instanceController = $this->makeController($route->getController());
        $this->response = call_user_func_array([$instanceController, $route->getAction()], $parameters ?? []);
        $this->send($route->getControllerName() === 'NotFoundController' ? '404 NOT FOUND' : '200 OK');
    }

    public function makeController($controller)
    {
        if (class_exists($controller)) {
            return new $controller($this->container);
        }
        return null;
    }

    public function send($status = '200 OK')
    {
        header("HTTP/1.1 $status");
        header("Content-Type: text/html, charset=UTF-8");

        echo (string)$this; // appelle la méthode __toString et retourne le $content à envoyer au client.
    }

    public function __toString(): string
    {
        return $this->response;
    }
}
