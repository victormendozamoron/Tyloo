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

        $count = BlogTag::all()->count();

		for ($i = 0; $i < $count; $i++)
        {
        	$title = e(substr($faker->sentence(8), 0, -1));
            $content = '<p>'.  implode('</p><p>', $faker->paragraphs(5)) .'</p>';
        	$post = BlogPost::create(array(
                'title' => $title,
                'slug' => Str::slug($title),
                'content' => e($content),
                'draft' => rand(0, 1),
                'lang' => $lang[rand(0, 1)],
                'image' => null,
                'user_id' => 1,
                'meta_title' => e($title),
                'meta_keywords' => str_replace(' ', ', ', strtolower($title)),
                'meta_description' => strip_tags($content),
            ));

            $nb_occur = rand(1, 4);
            $range = range(1, 5);
            shuffle($range);

            for ($j = 0; $j < $nb_occur; $j++) {
                echo $post->tags()->attach($range[$j]);
            }
        }

        $this->command->info('Blog Posts inserted successfully!');
	}

}
