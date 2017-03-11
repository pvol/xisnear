<?php

namespace App\Console;

use Core\Frame\Abstracts\ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Console commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        "migrate" => \App\Console\Commands\Migrate::class,
        "seed" => \App\Console\Commands\Seed::class,
    ];
}
