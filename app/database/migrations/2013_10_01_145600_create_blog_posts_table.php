<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlogPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blogposts', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->string('slug')->nullable();
			$table->text('content')->nullable();
			$table->boolean('draft');
			$table->string('lang');
			$table->string('image')->nullable();
			$table->string('meta_title')->nullable();
			$table->string('meta_keywords')->nullable();
			$table->text('meta_description')->nullable();
			$table->integer('user_id');
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
		Schema::drop('blogposts');
	}

}
