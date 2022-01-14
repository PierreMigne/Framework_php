<?php

namespace Service;

abstract class Controller
{
    public function __construct(protected Container $container)
    {
    }

    abstract public function index();
}
