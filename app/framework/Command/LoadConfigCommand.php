<?php


namespace Framework\Command;


class LoadConfigCommand implements CommandInterface
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }


    public function execute(): void
    {
        try {
            $fileLocator = new FileLocator(__DIR__ . DIRECTORY_SEPARATOR . 'config');
            $loader = new PhpFileLoader($this->containerBuilder, $fileLocator);
            $loader->load('parameters.php');
        } catch (\Throwable $e) {
            die('Cannot read the config file. File: ' . __FILE__ . '. Line: ' . __LINE__);
        }
    }
}
