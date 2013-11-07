<?php

use Illuminate\Database\Eloquent\Model;

class BlogtagLang extends Model
{
	protected $guarded = array();

	protected $fillable = array('name', 'slug', 'lang');

	public function posts()
    {
        return $this->belongsToMany('Blogpost', 'blogpost_blogtag', 'blogtag_id', 'blogpost_id');
    }
    
}