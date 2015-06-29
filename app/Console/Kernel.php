<?php namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
/* lets try dispatch command bus facade here 
 */
use Illuminate\Foundation\Bus\DispatchesCommands;

class Kernel extends ConsoleKernel {
        /*
         * Lets also use the Dispatch command here 
         */
    use DispatchesCommands;
	/**
	 * The Artisan commands provided by your application.
	 *
	 * @var array
	 */
	protected $commands = [
		'App\Console\Commands\Inspire',
	];

	/**
	 * Define the application's command schedule.
	 *
	 * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
	 * @return void
	 */
	protected function schedule(Schedule $schedule)
	{
		$schedule->command('inspire')
				 ->hourly();
               $schedule->call(function()
                {
                    $this->dispatch(new \App\Commands\SendBirthdayEmailCommand());
                    $this->dispatch(new \App\Commands\SendAnniversaryEmailCommand());
                    

                })->dailyAt('00:01');;
	}

}
