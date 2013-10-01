<?php

class BlogPostsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('blog_posts')->truncate();

		$blog_posts = [
		    ['title' => 'Test 1', 'slug' => 'test-1', 'content' => 'Test Blog post content 1', 'draft' => 0, 'lang' => 'fr'],
		    ['title' => 'Test 2', 'slug' => 'test-2', 'content' => 'Test Blog post content 2', 'draft' => 0, 'lang' => 'fr'],
		    ['title' => 'Test 3', 'slug' => 'test-3', 'content' => 'Test Blog post content 3', 'draft' => 1, 'lang' => 'en'],
		    ['title' => 'Test 4', 'slug' => 'test-4', 'content' => 'Test Blog post content 4', 'draft' => 0, 'lang' => 'en'],
		    ['title' => 'Test 5', 'slug' => 'test-5', 'content' => 'Test Blog post content 5', 'draft' => 1, 'lang' => 'fr'],
		];

		// Uncomment the below to run the seeder
		DB::table('blog_posts')->insert($blog_posts);
	}

}
