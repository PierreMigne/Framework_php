<?php

namespace Service;

class Request
{
    private string $requestUri;

    public function __construct()
    {
        $this->requestUri = $_SERVER["REQUEST_URI"];
    }

    public function getRequest()
    {
        $params = explode('/', substr($this->requestUri, 1));
        if (count($params) === 1 && $params[0] === '') $params = ['/'];

        return $params;
    }
}
