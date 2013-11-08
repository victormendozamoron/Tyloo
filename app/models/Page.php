<?php

class Page extends Eloquent {
	protected $guarded = array();

	public static $rules = ['title' => 'required', 'slug' => 'unique:pages', 'content' => 'required|min:3'];

	protected $softDelete = true;

	public $caca = 'pipi';

	public function url() {
		return URL::route('pages.show', $this->slug);
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
