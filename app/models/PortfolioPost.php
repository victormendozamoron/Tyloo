<?php

class PortfolioPost extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	protected $table = 'portfolio_posts';

	/**
	 * Return the URL to the blog post.
	 *
	 * @return string
	 */
	public function url()
	{
		return URL::route('portfolio.show', $this->slug);
	}

	public function tags()
    {
        return $this->belongsToMany('PortfolioTag', 'portfolio_post_tags', 'post_id', 'tag_id');
    }
}
