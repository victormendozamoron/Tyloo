<?php

class Blogtag extends Polyglot {

	protected $polyglot = array('name', 'slug', 'lang');

	protected $fillable = array('name', 'slug', 'lang');

	public $timestamps = false;

	public function posts()
    {
        return $this->belongsToMany('Blogpost', 'blogpost_blogtag', 'blogpost_id', 'blogtag_id');
    }

}