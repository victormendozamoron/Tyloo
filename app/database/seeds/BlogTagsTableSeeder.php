<?php

class BlogTagsTableSeeder extends Seeder {

	public function run()
	{
		$this->command->info('Deleting existing BlogTag table...');
		DB::table('blogtags')->truncate();

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

        $this->command->info('Blog Tags inserted successfully!');
	}

}
