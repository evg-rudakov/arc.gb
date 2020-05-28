<?php

use Commands\KernelCommand;
use Framework\Registry;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\Request;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR .
    'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$request = Request::createFromGlobals();
$containerBuilder = new ContainerBuilder();

Registry::addContainer($containerBuilder);

//$response = (new Kernel($containerBuilder))->handle($request);
$response = (new KernelCommand(new Kernel($containerBuilder)))->execute($request);
$response->send();
