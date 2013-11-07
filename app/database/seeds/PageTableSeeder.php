<?php

class PageTableSeeder extends Seeder {

	public function run()
	{
		$this->command->info('Deleting existing Pages table...');
		DB::table('pages')->truncate();

		$this->command->info('Inserting some sample Pages...');

        // Initialize empty array
        $pages = array();

        // Page 'Home FR'
        $pages[] = array(
            'title' => 'Accueil',
            'slug' => '',
            'content' => 'Bonjour !',
            'draft' => 0,
            'in_menu' => 1,
            'lang' => 'fr',
            'user_id' => 1,
            'meta_title' => 'Accueil',
            'meta_keywords' => 'accueil, home page',
            'meta_description' => 'Bonjour !',
        );

        // Page 'Home EN'
        $pages[] = array(
            'title' => 'Home',
            'slug' => '',
            'content' => 'Hello !',
            'draft' => 0,
            'in_menu' => 1,
            'lang' => 'en',
            'user_id' => 1,
            'meta_title' => 'Home',
            'meta_keywords' => 'home page',
            'meta_description' => 'Hello !',
        );

        // Page 'Contact FR'
        $pages[] = array(
            'title' => 'Contactez-moi',
            'slug' => 'contactez-moi',
            'content' => 'Contactez-moi !',
            'draft' => 0,
            'in_menu' => 1,
            'lang' => 'fr',
            'user_id' => 1,
            'meta_title' => 'Contactez-moi',
            'meta_keywords' => 'contact',
            'meta_description' => 'Contactez-moi !',
        );

        // Page 'Contact EN'
        $pages[] = array(
            'title' => 'Contact me',
            'slug' => 'contact-me',
            'content' => 'Contact me !',
            'draft' => 0,
            'in_menu' => 1,
            'lang' => 'en',
            'user_id' => 1,
            'meta_title' => 'Contact me',
            'meta_keywords' => 'contact',
            'meta_description' => 'Contact me !',
        );

        // Insert the pages
        Page::insert($pages);


        $this->command->info('Pages inserted successfully!');
	}

}
