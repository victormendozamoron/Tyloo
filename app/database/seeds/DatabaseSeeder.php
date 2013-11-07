<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		//$this->call('PageTableSeeder');
		$this->call('BlogTagsTableSeeder');
		$this->call('BlogPostsTableSeeder');
		//$this->call('PortfolioTagsTableSeeder');
		//$this->call('PortfolioPostsTableSeeder');
	}

}