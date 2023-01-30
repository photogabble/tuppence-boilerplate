<?php

namespace App\Console;

use League\Container\DefinitionContainerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class ConsoleCommand extends Command
{
    protected DefinitionContainerInterface $container;

    protected InputInterface $input;

    protected OutputInterface $output;

    public function setContainer(DefinitionContainerInterface $container)
    {
        $this->container = $container;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->input = $input;
        $this->output = $output;
        return $this->fire();
    }

    /**
     * @return int
     */
    abstract protected function fire(): int;
}