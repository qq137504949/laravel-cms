<?php

namespace App\Console;

use App\Models\Admin;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
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
//        ->everyMinute();	每分钟运行一次任务
//        ->everyFiveMinutes();	每五分钟运行一次任务
//        ->everyTenMinutes();	每十分钟运行一次任务
//        ->everyThirtyMinutes();	每三十分钟运行一次任务
//        ->hourly();	每小时运行一次任务
//        ->daily();	每天凌晨零点运行任务
//        ->dailyAt('13:00');	每天13:00运行任务
//        ->twiceDaily(1, 13);	每天1:00 & 13:00运行任务
//        ->weekly();	每周运行一次任务
//        ->monthly();	每月运行一次任务
        // $schedule->command('inspire')
        //          ->hourly();
        $schedule->call(function(){
            $admin = Admin::find(1);
            $admin->increment('admin_login_num');

           // DB::table('admin')->where('admin_id','1')->increment('admin_login_num');
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
