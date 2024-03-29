<?php

namespace App\Services;

use League\Plates\Engine;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class Plates extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    protected array $provides = [
        Engine::class
    ];

    /**
     * Use the register method to register items with the container via the
     * protected $this->container property or the `getContainer` method
     * from the ContainerAwareTrait.
     *
     * @return void
     */
    public function register(): void
    {
        $this->container->addShared(Engine::class, function(){
            return new Engine(APP_ROOT . '/resources/views', 'phtml');
        });
    }

    /**
     * Method will be invoked on registration of a service provider implementing
     * this interface. Provides ability for eager loading of Service Providers.
     *
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     *
     * @return void
     */
    public function boot(): void
    {
        // ...
    }

    public function provides(string $id): bool
    {
        return in_array($id, $this->provides);
    }
}
