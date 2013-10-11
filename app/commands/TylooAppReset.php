<?php

use Illuminate\Console\Command;

class TylooAppReset extends Command {

	/**
	 * The console command name.
	 *
	 * @var	string
	 */
	protected $name = 'tyloo:app:reset';

	/**
	 * The console command description.
	 *
	 * @var	string
	 */
	protected $description = 'Reset the Application';

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
		// Reset the migrations
		$this->call('migrate:reset');

		// Run the Sentry Migrations
		$this->call('migrate', array('--package' => 'cartalyst/sentry'));

		// Run the Migrations
		$this->call('migrate');

		// Seed the tables with dummy data
		$this->call('db:seed');

		// Delete all the uploaded files
		$this->clean_files();

		// Install the users and groups
		$this->sentryRunner();
	}

	/**
	 * Runs all the necessary Sentry commands.
	 *
	 * @return void
	 */
	protected function sentryRunner()
	{
		// Create the default groups
		$this->sentryCreateDefaultGroups();

		// Create the admin
		$this->sentryCreateAdmin();

		// Create the user
		$this->sentryCreateUser();
	}

	/**
	 * Creates the default groups.
	 *
	 * @return void
	 */
	protected function sentryCreateDefaultGroups()
	{
		try
		{
			// Create the admin group
			$group = Sentry::getGroupProvider()->create(array(
				'name'        => 'Admin',
				'permissions' => array(
					'admin' => 1,
					'users' => 1
				)
			));

			// Show the success message.
			$this->comment('');
			$this->info('Admin group created successfully.');
		}
		catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
		{
			$this->error('Group already exists.');
		}
	}

	/**
	 * Create the admin and associates the admin group to that user.
	 *
	 * @return void
	 */
	protected function sentryCreateAdmin()
	{
		// Prepare the user data array.
		$data = array(
			'first_name' => 'John',
			'last_name'  => 'Doe',
			'email'      => 'admin@domain.com',
			'password'   => 'admin',
			'activated'   => 1,
			'permissions' => array(
				'admin' => 1,
				'users' => 1
			),
		);

		// Create the sample admin
		$user = Sentry::getUserProvider()->create($data);

		// Associate the Admin group to this user
		$group = Sentry::getGroupProvider()->findById(1);
		$user->addGroup($group);

		// Show the success message
		$this->comment('');
		$this->info('Your Admin was created successfully.');
		$this->comment('');
	}

	/**
	 * Create the user and associates the user group to that user.
	 *
	 * @return void
	 */
	protected function sentryCreateUser()
	{
		// Prepare the user data array.
		$data = array(
			'first_name' => 'Paul',
			'last_name'  => 'Smith',
			'email'      => 'user@domain.com',
			'password'   => 'user',
			'activated'   => 1,
			'permissions' => array(
				'users' => 1,
			),
		);

		// Create the sample admin
		$user = Sentry::getUserProvider()->create($data);

		// Show the success message
		$this->comment('');
		$this->info('Your User was created successfully.');
		$this->comment('');
	}

	/**
	 * Delete all the uploaded files.
	 *
	 * @return void
	 */
	protected function clean_files() {
		$files = glob('public/uploads/blog_posts/*');
		foreach ($files as $file) {
		  if (is_file ($file))
		    unlink ($file);
		}
	}

}