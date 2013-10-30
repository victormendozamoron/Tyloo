<?php

/**
 * An Eloquent Model: 'BlogPost'
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property boolean $draft
 * @property string $lang
 * @property string $image
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property integer $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \User $author
 * @property-read \Illuminate\Database\Eloquent\Collection|\BlogTag[] $tags
 */
class BlogPost extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	protected $table = 'blogposts';

	/**
	 * Return the post's author.
	 *
	 * @return User
	 */
	public function author()
	{
		return $this->belongsTo('User');
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
        return $this->belongsToMany('BlogTag');
    }
}
