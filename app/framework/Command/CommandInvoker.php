<?php


namespace Framework\Command;


class CommandInvoker
{
    private $commands;

    public function addCommand(CommandInterface $command)
    {
        $this->commands[] = $command;
    }

    public function runAllCommands():void
    {
        foreach ($this->commands as $command) {
            $command->execute();
        }
    }

}
