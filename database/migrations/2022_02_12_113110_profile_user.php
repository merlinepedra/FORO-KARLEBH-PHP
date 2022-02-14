<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProfileUser extends Migration
{
/**
* Run the migrations.
*
* @return void
*/
public function up()
{
	Schema::create('profile_user', function (Blueprint $table) {
		$table->id();
		$table->foreignId('profile_id')->constrained()->onDelete('cascade');
		$table->foreignId('User_id')->constrained()->onDelete('cascade');
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
		Schema::dropIfExists('profiles');
	}
}
