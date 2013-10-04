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
}
