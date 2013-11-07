<?php

class BlogPostsTableSeeder extends Seeder {

	public function run()
	{
		$this->command->info('Deleting existing BlogPost table...');
		DB::table('blogposts')->truncate();
        DB::table('blogpost_langs')->truncate();
        DB::table('blogpost_blogtag')->truncate();

        $count = 5;
        $tags = Blogtag::get();
        $tagz = array();
        foreach ($tags as $tag) {
            array_push($tagz, $tag->id);
        }

        for ($i = 1; $i <= $count; $i++) {
            $nb_occur = rand(1, 5);
            shuffle($tagz);

            Blogpost::create(array(
                'title' => 'Article ' . $i,
                'slug' => 'article-' . $i,
                'content' => 'C larticle ' . $i . ' lolz',
                'lang' => 'fr',
                'user_id' => 1,
                'meta_title' => 'Article ' . $i,
                'meta_keywords' => 'article ' . $i,
                'meta_description' => 'C larticle ' . $i . ' lolz',
            ));

            $article = Blogpost::orderBy('id', 'desc')->first();
            
            for ($j = 0; $j < $nb_occur; $j++) {
                $article->tags()->attach($tagz[$j]);
            }

            $article = Blogpost::find($article->id);
            $article->fill(array(
                'title' => 'Article ' . $i . ' (EN)',
                'slug' => 'en-article-' . $i . '',
                'content' => 'C larticle ' . $i . ' lolz (EN)',
                'lang' => 'en',
                'user_id' => 1,
                'meta_title' => 'Article ' . $i . ' (EN)',
                'meta_keywords' => 'article ' . $i . ' en',
                'meta_description' => 'C larticle ' . $i . ' lolz (EN)',
            ))->save();
        }

        $this->command->info('Blog Posts inserted successfully!');
	}

}
