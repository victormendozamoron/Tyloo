<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class TylooAppSetup extends Command {

	/**
	 * The console command name.
	 *
	 * @var	string
	 */
	protected $name = 'tyloo:app:setup';

	/**
	 * The console command description.
	 *
	 * @var	string
	 */
	protected $description = 'Initialization of the Application';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		// Generate the Application Encryption key
		$this->call('key:generate');

		// Create the migrations table
		$this->call('migrate:install');

		// Run the Sentry Migrations
		$this->call('migrate', array('--package' => 'cartalyst/sentry'));

		// Run the Migrations
		$this->call('migrate');

		// Seed the tables with dummy data
		$this->call('db:seed');
	}

}