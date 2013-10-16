<?php

class PageTableSeeder extends Seeder {

	public function run()
	{
		$this->command->info('Deleting existing Pages table...');
		DB::table('pages')->truncate();

		$count = 5;
		$lang = array('fr', 'en');
		$faker = Faker\Factory::create('fr_FR');
		$this->command->info('Inserting ' . $count . ' sample Pages...');

		for ($i = 0; $i < $count; $i++)
        {
        	$title = e(ucfirst($faker->word));
            $content = '<p>'.  implode('</p><p>', $faker->paragraphs(5)) .'</p>';
        	$post = Page::create(array(
                'title' => $title,
                'slug' => Str::slug($title),
                'content' => e($content),
                'draft' => rand(0, 1),
                'in_menu' => rand(0, 1),
                'lang' => $lang[rand(0, 1)],
                'user_id' => 1,
                'meta_title' => e($title),
                'meta_keywords' => str_replace(' ', ', ', strtolower($title)),
                'meta_description' => strip_tags($content),
            ));
        }

        $this->command->info('Pages inserted successfully!');
	}

}
