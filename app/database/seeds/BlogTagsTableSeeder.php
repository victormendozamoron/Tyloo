<?php

class BlogTagsTableSeeder extends Seeder {

	public function run()
	{
		$this->command->info('Deleting existing BlogCat table...');
		DB::table('blog_tags')->truncate();

		$count = 5;
        $faker = Faker\Factory::create('fr_FR');

		for ($i = 0; $i < $count; $i++)
        {
        	$name = $faker->word;
        	BlogTag::create(array(
                'name' => ucwords($name),
                'slug' => Str::slug($name),
            ));
        }

        $this->command->info('Blog Cats inserted successfully!');
	}

}
