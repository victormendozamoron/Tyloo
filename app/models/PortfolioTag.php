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

	protected $table = 'portfoliotags';
	public $timestamps = false;

	public function posts()
    {
        return $this->belongsToMany('PortfolioPost');
    }

}