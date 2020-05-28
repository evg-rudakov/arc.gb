<?php


namespace Framework\Command;


class LoadRoutesCommand implements CommandInterface
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }


    public function execute(): void
    {
        $this->kernel->routeCollection = require __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'routing.php';
        $this->kernel->containerBuilder->set('route_collection', $this->routeCollection);
    }
}
