<?php

namespace Skeleton\Generator\Providers;

use Illuminate\Support\ServiceProvider;
use Skeleton\Generator\Console\Commands\MakeStructCommand;
use Skeleton\Generator\Console\Commands\MakeStructControllerCommand;
use Skeleton\Generator\Console\Commands\MakeStructRepositoryCommand;
use Skeleton\Generator\Console\Commands\MakeStructRoutesCommand;
use Skeleton\Generator\Console\Commands\MakeStructModelCommand;
use Skeleton\Generator\Console\Commands\MakeStructMigrationCommand;
use Skeleton\Generator\Console\Commands\MakeStructServiceProviderCommand;
use Skeleton\Generator\Console\Commands\MakeStructServiceCommand;

class GeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeStructCommand::class,
                MakeStructControllerCommand::class,
                MakeStructRepositoryCommand::class,
                MakeStructRoutesCommand::class,
                MakeStructModelCommand::class,
                MakeStructMigrationCommand::class,
                MakeStructServiceCommand::class
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}