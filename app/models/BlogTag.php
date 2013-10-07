<?php

class BlogTag extends Eloquent {

	protected $table = 'blog_tags';
	public $timestamps = false;

	public function posts()
    {
        return $this->belongsToMany('BlogPost', 'blog_post_tags', 'tag_id', 'post_id');
    }

}