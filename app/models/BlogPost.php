<?php

class BlogPost extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	protected $table = 'blog_posts';

	/**
	 * Return the post's author.
	 *
	 * @return User
	 */
	public function author()
	{
		return $this->belongsTo('User', 'user_id');
	}

	/**
	 * Return the URL to the blog post.
	 *
	 * @return string
	 */
	public function url()
	{
		return URL::route('blog.show', $this->slug);
	}

	public function tags()
    {
        return $this->belongsToMany('BlogTag', 'blog_post_tags', 'post_id', 'tag_id');
    }
}
