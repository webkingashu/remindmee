<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//contacts for sending reminder
		
		Schema::create('contacts', function(Blueprint $table)
		{
			$table->bigIncrements('id')->unique();
			$table->string('contact_name');
			$table->string('contact_email');
			$table->string('contact_mobile');
                        $table->bigInteger('contact_ownerid');
			$table->string('contact_type');
			$table->bigInteger('contact_parent');
                        $table->date('birthday');
                        $table->date('anniversary')->nullable();
                        $table->timestamps();
                        $table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::dropIfExists('contacts');
	}

}
