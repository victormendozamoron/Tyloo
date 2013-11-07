<?php

use Illuminate\Database\Eloquent\Model;

class BlogpostLang extends Model
{
    protected $guarded = array();

    protected $fillable = array('title', 'slug', 'content', 'lang', 'user_id', 'meta_title', 'meta_keywords', 'meta_description');

	/**
     * Return the post's author.
     *
     * @return User
     */
    public function author()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany('BlogTag', 'blogpost_blogtag', 'blogpost_id', 'blogtag_id');
    }
    
}