<?php

namespace Commands;

class KernelCommand implements \Commands\CommandInterface
{

    private $kernel;

    public function __construct(\Kernel $kernel)
    {
        $this->kernel = $kernel;
    }


    public function execute($request)
    {
        $this->kernel->registerConfigs();
        $this->kernel->registerRoutes();

        return $this->$request->process($request);
    }
}