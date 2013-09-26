<?php

require_once __DIR__.'/../../demo-yolo-argentina/vendor/autoload.php';

$container = Yolo\createContainer(
    [
        'debug' => true,
    ],
    [
        new Yolo\DependencyInjection\MonologExtension(),
        new Yolo\DependencyInjection\ServiceControllerExtension()
    ]
);

$app = new Yolo\Application($container);

$app->get('/app_dev.php/yolo2', 'yolo_demo_controller:indexAction');

return $app->getHttpKernel();
