<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;
use App\Annonce;
use App\Newsletter;

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
        // $schedule->command('inspire')
        //          ->hourly();
       
        $schedule->call(function () {
             $annonce = Annonce::take(2)->get();
             $newsletters = Newsletter::all();
            foreach ($newsletters as $subscriber){
                Mail::send('admin.EnvoyeSubscribe', ['annonce' => $annonce], function($message) use ($subscriber) {
                    $message->from('abaki.anis@gmail.com', 'TunisienEnFrance@gmail.com');
                    $message->to($subscriber->email)->subject('TunisienEnFrance');
                });
            }
        })->everyMinute();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
