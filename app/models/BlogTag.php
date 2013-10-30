<?php

/**
 * An Eloquent Model: 'BlogTag'
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property-read \Illuminate\Database\Eloquent\Collection|\BlogPost[] $posts
 */
class BlogTag extends Eloquent {

	protected $table = 'blogtags';
	public $timestamps = false;

	public function posts()
    {
        return $this->belongsToMany('BlogPost');
    }

}