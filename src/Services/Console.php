<?php

namespace App\Services;

use App\Console\ExampleCommand;
use League\Container\ServiceProvider\AbstractServiceProvider;
use Symfony\Component\Console\Application;

class Console extends AbstractServiceProvider
{
    /** @var array */
    protected $provides = [
        Application::class
    ];

    /**
     * The name of your application.
     *
     * @var string
     */
    protected $name = 'UNKNOWN';

    /**
     * Your application version.
     *
     * @var string
     */
    protected $version = 'UNKNOWN';

    /**
     * Use the register method to register items with the container via the
     * protected $this->container property or the `getContainer` method
     * from the ContainerAwareTrait.
     *
     * @return void
     */
    public function register(): void
    {
        $this->getContainer()->add(Application::class, function(){
            $application = new Application($this->name, $this->version);

            $defaultCommands = [
                new ExampleCommand()
            ];

            foreach ($defaultCommands as $command)
            {
                $command->setContainer($this->container);
                $application->add($command);
            }
            return $application;
        });
    }

    public function provides(string $id): bool
    {
        return in_array($id, $this->provides);
    }
}
