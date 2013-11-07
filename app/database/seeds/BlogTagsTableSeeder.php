<?php

class BlogTagsTableSeeder extends Seeder {

	public function run()
	{
		$this->command->info('Deleting existing BlogTag table...');
		DB::table('blogtags')->truncate();
        DB::table('blogtag_langs')->truncate();

		$count = 5;
        for ($i = 1; $i <= $count; $i++) {
            Blogtag::create(array(
                'name' => 'Tag ' . $i,
                'slug' => 'tag-' . $i,
                'lang' => 'fr',
            ));

            $id = Blogtag::orderBy('id', 'desc')->first()->id;
            $tag = Blogtag::find($id);
            $tag->fill(array(
                'name' => 'Tag ' . $i . ' EN',
                'slug' => 'tag-' . $i . '-en',
                'lang' => 'en',
            ))->save();
        }

        $this->command->info('Blog Tags inserted successfully!');
	}

}
