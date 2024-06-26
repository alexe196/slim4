<?php
namespace app\Factory;

use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Events\Dispatcher;
use Psr\Container\ContainerInterface;

class DatabaseManagerFactory
{
    public $capsule;

    public function __construct(ContainerInterface $container)
    {
        // this would usually be in your dependency settings or on a safe place within
        // your application. This is purely for explanatory reasons that is has been placed here

        $dbSettings = [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'slim',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => ''
        ];

        $manager = new Manager;
        $manager->addConnection($dbSettings);

        $manager->getConnection()->enableQueryLog();

        $manager->setEventDispatcher(new Dispatcher(new Container()));

        $manager->setAsGlobal();
        $manager->bootEloquent();

        $this->capsule = $manager;
    }
}