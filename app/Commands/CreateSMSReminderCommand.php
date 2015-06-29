<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class CreateSMSReminderCommand extends Command implements ShouldBeQueued {

	use InteractsWithQueue, SerializesModels;
        public $contact_id;
        public $reminder_set;
        public $reminder_type;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($contact_id,$reminder_set)
	{
		//
                $this->contact_id = $contact_id;
                $this->reminder_set = $reminder_set;
                $this->reminder_type = 'sms';
	}

}
