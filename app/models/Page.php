<?php

class Page extends Eloquent {

	protected $guarded = array();

	public static $rules = array();

	protected $table = 'pages';

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
		return URL::route('page.show', $this->slug);
	}

}