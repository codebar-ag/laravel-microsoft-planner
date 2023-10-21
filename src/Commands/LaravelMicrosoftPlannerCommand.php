<?php

namespace CodebarAg\LaravelMicrosoftPlanner\Commands;

use Illuminate\Console\Command;

class LaravelMicrosoftPlannerCommand extends Command
{
    public $signature = 'laravel-microsoft-planner';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
