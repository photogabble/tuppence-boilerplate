<?php

namespace App\Console;

class ExampleCommand extends ConsoleCommand
{
    protected function configure()
    {
        $this->setName('app:example')
            ->setDescription('An example command.');
    }

    /**
     * @return int
     */
    protected function fire()
    {
        $this->output->writeln('Hello world.');
        return 0;
    }
}