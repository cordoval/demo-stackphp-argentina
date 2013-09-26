<?php

$loader = require_once __DIR__.'/../../demo-symfony2-argentina/app/bootstrap.php.cache';
Debug::enable();

require_once __DIR__.'/../../demo-symfony2-argentina/app/AppKernel.php';

$app = new AppKernel('prod', false);
$app->loadClassCache();
$lazyFactoryApp = function() { return require __DIR__.'/admin.php'; };
$stack = (new Stack\Builder)
    ->push('Stack\UrlMap', ['/dev_mode' => new LazyHttpKernel($lazyFactoryApp)]
    );

$app = $stack->resolve($app);

$request = Request::createFromGlobals();
$response = $app->handle($request);
$response->send();
$app->terminate($request, $response);
