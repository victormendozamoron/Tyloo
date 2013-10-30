<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PortfolioPostTags extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('portfoliopost_portfoliotag', function(Blueprint $table) {
			$table->integer('portfoliopost_id');
			$table->integer('portfoliotag_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('portfoliopost_portfoliotag');
	}

}