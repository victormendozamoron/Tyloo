#Tyloo

Tyloo is a Web Application writen in Laravel 4, the best PHP framework. It contains a Blog, a Portfolio and many CMS tools for a production website.

`Version: 0.8.0 Beta` [![ProjectStatus](http://stillmaintained.com/Tyloo/Tyloo.png)](http://stillmaintained.com/Tyloo/Tyloo)
[![Build Status](https://api.travis-ci.org/Tyloo/Tyloo.png)](https://travis-ci.org/Tyloo/Tyloo)

##Features
* Twitter Bootstrap 3
* Custom Error Pages
	* 403 (Forbidden Access)
	* 404 (Not Found)
	* 500 (Internal Server Errors)
* Sentry (Authentication and Authorization)
* Admin Panel
	* Users, Groups and Roles management
	* Blog management (with dynamic sorting and comments with Disqus)
	* Portfolio management (with categories for sorting)
	* Pages management (with dynamic content and menu)
	* WYSIWYG editor for easy content writing
* Frontend
	* User login, registration and password recovery
	* Profile and statistics area
	* Blog, Portfolio and CMS fonctionalities
* Packages included
	* [Sentry]

## Issues
See [github issue list](https://github.com/Tyloo/Tyloo/issues) for current list.

## Roadmap
* (OK) Créer le Backend (authent, modules d'admin) -> Sentry
* (OK) Créer le Blog (avec un wysiwyg).
* (OK) Créer le Portfolio (avec un wysiwyg).
* (OK) Créer un module de gestion de contenu dynamique.
* (OK) Ajout d'un filtre par tags (blog).
* (OK) Rework gestion des erreurs.
* (OK) Rework des vues et de la structure (lang & views).
* Création d'un panel admin chef d'orchestre.
* Tests unitaires au fur et à mesure.

-----

##Requirements
	* PHP >= 5.3.7
	* MCrypt PHP Extension

##How to install
### Step 1: Get the code
#### Option 1: Git Clone
	git clone git://github.com/Tyloo/Tyloo.git laravel

#### Option 2: Download the repository
    https://github.com/Tyloo/Tyloo/archive/master.zip

### Step 2: Use Composer to install dependencies
#### Option 1: Composer is not installed globally
    cd laravel
	curl -s http://getcomposer.org/installer | php
	php composer.phar install

#### Option 2: Composer is installed globally
    cd laravel
	composer install

If you haven't already, you might want to make [composer be installed globally](http://getcomposer.org/doc/00-intro.md#globally) for future ease of use.

Some packages used are required on the development environment. When you deploy your project on a production environment you will want to upload the ***composer.lock*** file used on the development environment and only run `php composer.phar install` on the production server.

This will skip the development packages and ensure the version of the packages installed on the production server match those you developped on.

NEVER run `php composer.phar update` on your production server.

### Step 3: Configure Database
Now that you have the environment configured, you need to create a database configuration for it. Edit the file ***app/config/database.php*** to match your local database settings.

### Step 4: Configure Mailer
In the same fashion, edit the ***app/config/mail.php*** mail configuration file. You'll have to set the `address` and `name` from the `from` array. Those will be used to send account confirmation and password reset emails to the users.
If you don't set that registration will fail because it cannot send the confirmation email.

### Step 5: Initialize the Application
Run this command to create and populate Users table:

	php artisan tyloo:app:setup

### Step 6 (optional): Make sure app/storage is writable by your web server.
If permissions are set correctly:

    chmod -R 775 app/storage

Should work, if not try

    chmod -R 777 app/storage

## Application Structure
The structure of this application is the same as default Laravel 4 with one exception.

## Production Launch
By default debugging is enabled. Before you go to production you should disable debugging in `app/config/app.php`

```
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

    'debug' => false,
```

## License
This is free software distributed under the terms of the MIT license