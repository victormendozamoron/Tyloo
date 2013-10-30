<?php

/**
 * An Eloquent Model: 'PortfolioTag'
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property-read \Illuminate\Database\Eloquent\Collection|\PortfolioPost[] $posts
 */
class PortfolioTag extends Eloquent {

	protected $table = 'portfolio_tags';
	public $timestamps = false;

	public function posts()
    {
        return $this->belongsToMany('PortfolioPost', 'portfolio_post_tags', 'tag_id', 'post_id');
    }

}