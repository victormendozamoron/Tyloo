<?php

/**
 * An Eloquent Model: 'PortfolioPost'
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property boolean $draft
 * @property string $lang
 * @property string $image
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property integer $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\PortfolioTag[] $tags
 */
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
