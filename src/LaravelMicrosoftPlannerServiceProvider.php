<?php

namespace CodebarAg\LaravelMicrosoftPlanner;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use CodebarAg\LaravelMicrosoftPlanner\Commands\LaravelMicrosoftPlannerCommand;

class LaravelMicrosoftPlannerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-microsoft-planner')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-microsoft-planner_table')
            ->hasCommand(LaravelMicrosoftPlannerCommand::class);
    }
}
