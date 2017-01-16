<?php

namespace App\Console;

use Xisnear\Frame\Abstracts\ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Console commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        "migrate" => \App\Console\Commands\Migrate::class,
    ];
}
