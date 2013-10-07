<?php

class BlogPostsTableSeeder extends Seeder {

	public function run()
	{
		$this->command->info('Deleting existing BlogPost table...');
		DB::table('blog_posts')->truncate();

		$count = 20;
		$lang = array('fr', 'en');
		$faker = Faker\Factory::create('fr_FR');
		$this->command->info('Inserting ' . $count . ' sample Blog Posts...');

		for ($i = 0; $i < $count; $i++)
        {
        	$title = substr($faker->sentence(8), 0, -1);
        	BlogPost::create(array(
                'title' => $title,
                'slug' => Str::slug($title),
                'content' => '<p>'.  implode('</p><p>', $faker->paragraphs(5)) .'</p>',
                'draft' => rand(0, 1),
                'lang' => $lang[rand(0, 1)],
                'image' => null,
                'user_id' => 1,
                'meta_title' => 1,
                'meta_keywords' => 1,
                'meta_description' => 1,
            ));
        }

        $this->command->info('Blog Posts inserted successfully!');
	}

}
