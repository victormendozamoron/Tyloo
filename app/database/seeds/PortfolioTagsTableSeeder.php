<?php

class PortfolioTagsTableSeeder extends Seeder {

	public function run()
	{
		$this->command->info('Deleting existing PortfolioCat table...');
		DB::table('portfolio_tags')->truncate();

		$count = 5;
        $faker = Faker\Factory::create('fr_FR');

		for ($i = 0; $i < $count; $i++)
        {
        	$name = $faker->word;
        	PortfolioTag::create(array(
                'name' => ucwords($name),
                'slug' => Str::slug($name),
            ));
        }

        $this->command->info('Portfolio Cats inserted successfully!');
	}

}
