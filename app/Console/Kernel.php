<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        // $schedule->command('fetch:personnel-data')->everyMinute()->appendOutputTo(storage_path('logs/cron.log'));
        $schedule->command('fetch:personnel-data')
            ->dailyAt('1:00')
            ->timezone('Asia/Dhaka')
            ->runInBackground();

        $schedule->command('fetch:program-data')
            ->dailyAt('1:10')
            ->timezone('Asia/Dhaka')
            ->runInBackground();

        $schedule->command('fetch:course-data')
            ->dailyAt('2:10')
            ->timezone('Asia/Dhaka')
            ->runInBackground();


    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
