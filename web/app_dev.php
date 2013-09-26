<?php

use Symfony\Component\Debug\Debug;
use Stack\LazyHttpKernel;
use Symfony\Component\HttpFoundation\Request;

$baseLoader = require_once __DIR__.'/../../demo-symfony2-argentina/app/bootstrap.php.cache';
Debug::enable();

require_once __DIR__.'/../../demo-symfony2-argentina/app/AppKernel.php';

$symfony2App = new AppKernel('dev', true);
$symfony2App->loadClassCache();
$yoloApp = function() { return require __DIR__.'/yolo_dev.php'; };
$stack = (new Stack\Builder)
    ->push('Stack\UrlMap', ['/yolo2' => new LazyHttpKernel($yoloApp)]
);

$app = $stack->resolve($symfony2App);

$request = Request::createFromGlobals();
$response = $app->handle($request);
$response->send();
$app->terminate($request, $response);
