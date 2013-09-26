<?php

use Stack\LazyHttpKernel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

$loader = require_once __DIR__.'/../app/bootstrap.php.cache';
Debug::enable();

require_once __DIR__.'/../app/AppKernel.php';

$app = new AppKernel('dev', true);
$app->loadClassCache();

return $app;