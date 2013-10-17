<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Application Debug Mode
	|--------------------------------------------------------------------------
	|
	| When your application is in debug mode, detailed error messages with
	| stack traces will be shown on every error that occurs within your
	| application. If disabled, a simple generic error page is shown.
	|
	*/

	'debug' => true,

	/*
	|--------------------------------------------------------------------------
	| Application URL
	|--------------------------------------------------------------------------
	|
	| This URL is used by the console to properly generate URLs when using
	| the Artisan command line tool. You should set this to the root of
	| your application so that it is used when running Artisan tasks.
	|
	*/

	'url' => 'http://localhost',

	/*
	|--------------------------------------------------------------------------
	| Application Timezone
	|--------------------------------------------------------------------------
	|
	| Here you may specify the default timezone for your application, which
	| will be used by the PHP date and date-time functions. We have gone
	| ahead and set this to a sensible default for you out of the box.
	|
	*/

	'timezone' => 'UTC',

	/*
	|--------------------------------------------------------------------------
	| Application Locale Configuration
	|--------------------------------------------------------------------------
	|
	| The application locale determines the default locale that will be used
	| by the translation service provider. You are free to set this value
	| to any of the locales which will be supported by the application.
	|
	*/

	'locale' => 'fr',

	/*
	|--------------------------------------------------------------------------
	| Encryption Key
	|--------------------------------------------------------------------------
	|
	| This key is used by the Illuminate encrypter service and should be set
	| to a random, 32 character string, otherwise these encrypted strings
	| will not be safe. Please do this before deploying an application!
	|
	*/

	'key' => 'QGwqEA7MPFwhnqnhKblQQVhXRZysHhoe',

	/*
	|--------------------------------------------------------------------------
	| Autoloaded Service Providers
	|--------------------------------------------------------------------------
	|
	| The service providers listed here will be automatically loaded on the
	| request to your application. Feel free to add your own services to
	| this array to grant expanded functionality to your applications.
	|
	*/

	'providers' => array(

		'Illuminate\Foundation\Providers\ArtisanServiceProvider',
		'Illuminate\Auth\AuthServiceProvider',
		'Illuminate\Cache\CacheServiceProvider',
		'Illuminate\Foundation\Providers\CommandCreatorServiceProvider',
		'Illuminate\Session\CommandsServiceProvider',
		'Illuminate\Foundation\Providers\ComposerServiceProvider',
		'Illuminate\Routing\ControllerServiceProvider',
		'Illuminate\Cookie\CookieServiceProvider',
		'Illuminate\Database\DatabaseServiceProvider',
		'Illuminate\Encryption\EncryptionServiceProvider',
		'Illuminate\Filesystem\FilesystemServiceProvider',
		'Illuminate\Hashing\HashServiceProvider',
		'Illuminate\Html\HtmlServiceProvider',
		'Illuminate\Foundation\Providers\KeyGeneratorServiceProvider',
		'Illuminate\Log\LogServiceProvider',
		'Illuminate\Mail\MailServiceProvider',
		'Illuminate\Foundation\Providers\MaintenanceServiceProvider',
		'Illuminate\Database\MigrationServiceProvider',
		'Illuminate\Foundation\Providers\OptimizeServiceProvider',
		'Illuminate\Pagination\PaginationServiceProvider',
		'Illuminate\Foundation\Providers\PublisherServiceProvider',
		'Illuminate\Queue\QueueServiceProvider',
		'Illuminate\Redis\RedisServiceProvider',
		'Illuminate\Auth\Reminders\ReminderServiceProvider',
		'Illuminate\Foundation\Providers\RouteListServiceProvider',
		'Illuminate\Database\SeedServiceProvider',
		'Illuminate\Foundation\Providers\ServerServiceProvider',
		'Illuminate\Session\SessionServiceProvider',
		'Illuminate\Foundation\Providers\TinkerServiceProvider',
		'Illuminate\Translation\TranslationServiceProvider',
		'Illuminate\Validation\ValidationServiceProvider',
		'Illuminate\View\ViewServiceProvider',
		'Illuminate\Workbench\WorkbenchServiceProvider',

		// Additional Plugins
		'Cartalyst\Sentry\SentryServiceProvider', // Sentry
		'Way\Generators\GeneratorsServiceProvider', // Generator
	),

	/*
	|--------------------------------------------------------------------------
	| Service Provider Manifest
	|--------------------------------------------------------------------------
	|
	| The service provider manifest is used by Laravel to lazy load service
	| providers which are not needed for each request, as well to keep a
	| list of all of the services. Here, you may set its storage spot.
	|
	*/

	'manifest' => storage_path().'/meta',

	/*
	|--------------------------------------------------------------------------
	| Class Aliases
	|--------------------------------------------------------------------------
	|
	| This array of class aliases will be registered when this application
	| is started. However, feel free to register as many as you wish as
	| the aliases are "lazy" loaded so they don't hinder performance.
	|
	*/

	'aliases' => array(

		'App'             => 'Illuminate\Support\Facades\App',
		'Artisan'         => 'Illuminate\Support\Facades\Artisan',
		'Auth'            => 'Illuminate\Support\Facades\Auth',
		'Blade'           => 'Illuminate\Support\Facades\Blade',
		'Cache'           => 'Illuminate\Support\Facades\Cache',
		'ClassLoader'     => 'Illuminate\Support\ClassLoader',
		'Config'          => 'Illuminate\Support\Facades\Config',
		'Controller'      => 'Illuminate\Routing\Controllers\Controller',
		'Cookie'          => 'Illuminate\Support\Facades\Cookie',
		'Crypt'           => 'Illuminate\Support\Facades\Crypt',
		'DB'              => 'Illuminate\Support\Facades\DB',
		'Eloquent'        => 'Illuminate\Database\Eloquent\Model',
		'Event'           => 'Illuminate\Support\Facades\Event',
		'File'            => 'Illuminate\Support\Facades\File',
		'Form'            => 'Illuminate\Support\Facades\Form',
		'Hash'            => 'Illuminate\Support\Facades\Hash',
		'HTML'            => 'Illuminate\Support\Facades\HTML',
		'Input'           => 'Illuminate\Support\Facades\Input',
		'Lang'            => 'Illuminate\Support\Facades\Lang',
		'Log'             => 'Illuminate\Support\Facades\Log',
		'Mail'            => 'Illuminate\Support\Facades\Mail',
		'Paginator'       => 'Illuminate\Support\Facades\Paginator',
		'Password'        => 'Illuminate\Support\Facades\Password',
		'Queue'           => 'Illuminate\Support\Facades\Queue',
		'Redirect'        => 'Illuminate\Support\Facades\Redirect',
		'Redis'           => 'Illuminate\Support\Facades\Redis',
		'Request'         => 'Illuminate\Support\Facades\Request',
		'Response'        => 'Illuminate\Support\Facades\Response',
		'Route'           => 'Illuminate\Support\Facades\Route',
		'Schema'          => 'Illuminate\Support\Facades\Schema',
		'Seeder'          => 'Illuminate\Database\Seeder',
		'Session'         => 'Illuminate\Support\Facades\Session',
		'Str'             => 'Illuminate\Support\Str',
		'URL'             => 'Illuminate\Support\Facades\URL',
		'Validator'       => 'Illuminate\Support\Facades\Validator',
		'View'            => 'Illuminate\Support\Facades\View',

		// Additional Plugins
		'Sentry' => 'Cartalyst\Sentry\Facades\Laravel\Sentry', // Sentry

	),

	/*
	|--------------------------------------------------------------------------
	| Website Infos
	|--------------------------------------------------------------------------
	|
	|
	*/

	'settings' => array(
		'fr' => array(
			'title' => 'Julien \'Tyloo\' Bonvarlet, Ingénieur en développement Web & Mobile à Paris',
			'meta_title' => 'Julien \'Tyloo\' Bonvarlet, Ingénieur en développement Web & Mobile à Paris',
			'meta_description' => 'Tyloo.fr est la vitrine de Julien Bonvarlet, Ingénieur en développement Web & Mobile. Je suis spécialisé en PHP (framework Symphony 2 et Laravel). Je travaille actuellement chez NRX, entreprise partenaire officielle de Google. Vous trouverez sur ce site des informations me concernant (Portfolio, CV, Compétences) et un blog technique.',
			'meta_keywords' => 'tyloo, tyloo.fr, ingénieur, web, mobile, iphone, ios, android, google, google apps, google search appliance, php, java, j2ee, css, html5, javascript, framework, laravel, laravel 4, symfony, symfony 2, jquery, bootstrap, photoshop',
		),
		'en' => array(
			'title' => 'Julien \'Tyloo\' Bonvarlet, Engineer in Web & Mobile development at Paris (France)',
			'meta_title' => 'Julien \'Tyloo\' Bonvarlet, Engineer in Web & Mobile development at Paris (France)',
			'meta_description' => 'Tyloo.fr is the showcase of Julien Bonvarlet, Engineer in Web & Mobile development. I specialize in PHP (framework Symphony 2 and Laravel). I am currently working at NRX, an official Google partner company. You will find here information about me (Portfolio, CV, Skills) and technical blog.',
			'meta_keywords' => 'tyloo, tyloo.fr, engineer, web, mobile, iphone, ios, android, google, google apps, google search appliance, php, java, j2ee, css, html5, javascript, framework, laravel, laravel 4, symfony, symfony 2, jquery, bootstrap, photoshop',
		),
	),

	/*
	|--------------------------------------------------------------------------
	| Admin Email Infos
	|--------------------------------------------------------------------------
	|
	| This allows you to set an Admin Email & Name information. Then you'll be
	| abke to send emails to this person.
	| (TODO : Send it to Website SuperAdmin)
	|
	*/
	'admin' => array(
		'email'	=> 'jbonva@gmail.com',
		'name'	=> 'Julien Bonvarlet',
	),

);
