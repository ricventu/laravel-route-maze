<?php

namespace Ricventu\RouteMaze\Commands;

use Illuminate\Console\Command;

class RouteMazeCommand extends Command
{
    public $signature = 'laravel-route-maze';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
