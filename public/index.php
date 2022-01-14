<?php

use Service\Dispatcher;
use Service\Request;

require_once __DIR__ . '/../app.php';

$dispatcher = new Dispatcher(new Request);
$dispatcher->run();
