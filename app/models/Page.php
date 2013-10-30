<?php

/**
 * An Eloquent Model: 'Page'
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property boolean $draft
 * @property boolean $in_menu
 * @property string $lang
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property integer $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \User $author
 */
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