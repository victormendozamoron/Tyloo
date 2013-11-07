<?php

class Blogpost extends Polyglot {

    protected $guarded = array();

	protected $polyglot = array('created_at', 'title', 'slug', 'content', 'lang', 'user_id', 'meta_title', 'meta_keywords', 'meta_description');

	protected $fillable = array('title', 'slug', 'content', 'lang', 'user_id', 'meta_title', 'meta_keywords', 'meta_description');

	public $timestamps = false;

    public function tags()
    {
        return $this->belongsToMany('BlogTag', 'blogpost_blogtag', 'blogpost_id', 'blogtag_id');
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