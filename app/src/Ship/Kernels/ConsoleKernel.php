<?php

namespace LargeLaravel\Ship\Kernels;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\Kernel as BaseConsoleKernel;
use Illuminate\Support\Facades\Cache;

class ConsoleKernel extends BaseConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $commandsDirsList = Cache::get('commandsDirsList', function () {
            $filesystem = new Filesystem();
            $commandsDirsList = [];

            foreach ($filesystem->directories(app_path('src/Containers')) as $directory) {
                $commandsDir = $directory . '/Commands';
                if (is_dir($commandsDir)) {
                    $commandsDirsList[] = $commandsDir;
                }
            }

            Cache::put('commandsDirsList', $commandsDirsList, 120);
            return $commandsDirsList;
        });

        $this->load($commandsDirsList);
    }
}

