<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSenderIdsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
        
        public function up()
	{
		Schema::create('sender_ids', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->bigInteger('user_id')->unsigned();
                        $table->foreign('user_id')->references('ID')->on('wp_users');
                        $table->string('senderid_name',6)->unique();
                        $table->string('senderid_status',255);
                        $table->string('senderid_note')->nullable();
                        $table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sender_ids');
	}

}
