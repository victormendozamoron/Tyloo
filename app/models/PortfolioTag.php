<?php

class PortfolioTag extends Eloquent {

	protected $table = 'portfolio_tags';
	public $timestamps = false;

	public function posts()
    {
        return $this->belongsToMany('PortfolioPost', 'portfolio_post_tags', 'tag_id', 'post_id');
    }

}