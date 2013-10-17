<?php

class PortfolioController extends BaseController {
	private $destinationPath = 'public/uploads/portfolio_posts/';

	/**
	 * Initializer.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->beforeFilter('admin-auth', array('except' => array('index', 'show')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('modules.portfolio.posts.index')
			->with('portfolio_posts', PortfolioPost::paginate(10));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function admin()
	{
		$portfolio_posts = PortfolioPost::all();
		return View::make('modules.portfolio.posts.admin', compact('portfolio_posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('modules.portfolio.posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Declare the rules for the form validation
		$rules = array(
			'title'   => 'required|min:3',
			'content' => 'required|min:3|not_in:<p></p>',
			'image' => 'image|max:30000000',
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}

		// Create a new portfolio post
		$post = new PortfolioPost;

		// Update the portfolio post data
		$post->title            = e(Input::get('title'));
		if (empty($post->slug))
			$post->slug         = e(Str::slug(Input::get('title')));
		else
			$post->slug         = e(Str::slug(Input::get('slug')));
		$post->content          = e(Input::get('content'));
		$post->draft            = e(Input::get('draft'));
		$post->lang             = e(Input::get('lang'));
		$post->content          = e(Input::get('content'));
		$post->meta_title       = e(Input::get('meta-title'));
		$post->meta_description = e(Input::get('meta-description'));
		$post->meta_keywords    = e(Input::get('meta-keywords'));
		$post->user_id          = Sentry::getId();

		$image = Input::file('image');
        if ( ! empty($image)) {
	        $filename = $post->slug . '_' . date('d-m-Y') . '.' . $image->getClientOriginalExtension();
	        $uploadSuccess = Input::file('image')->move($this->destinationPath, $filename);
	        $post->image            = e($filename);
	    }

		// Was the portfolio post created?
		if($post->save())
		{
			$tags = explode(',', Input::get('portfoliotags'));
			foreach ($tags as $tag) {
				if (PortfolioTag::where('name', '=', $tag)->count() == 0) {
					$newTag = new PortfolioTag;
					$newTag->name = ucwords($tag);
					$newTag->slug = Str::slug($tag);
					$newTag->save();
				}
				else {
					$newTag = PortfolioTag::where('name', '=', $tag)->first();
				}
				$post->tags()->attach($newTag->id);
			}

			// Redirect to the new portfolio post page
			return Redirect::route('portfolio.show', array('portfolio' => $post->slug))->with('success', Lang::get('portfolios/message.create.success'));
		}

		// Redirect to the portfolio post create page
		return Redirect::route('portfolio.create')->with('error', Lang::get('portfolios/message.create.error'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  string  $slug
	 * @return Response
	 */
	public function show($slug)
	{
		return View::make('modules.portfolio.posts.show')
			->with('portfolio_post', PortfolioPost::where('slug', $slug)->first());
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = PortfolioPost::find($id);
		$tags = null;
		foreach ($post->tags as $tag) {
			$tags .= ',' . $tag->name;
		}
		$tags = substr($tags, 1);
		return View::make('modules.portfolio.posts.edit', compact('post', 'tags'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// Declare the rules for the form validation
		$rules = array(
			'title'   => 'required|min:3',
			'content' => 'required|min:3|not_in:<p></p>',
			'image' => 'image|max:3000000',
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}

		// Create a new portfolio post
		$post = PortfolioPost::find($id);

		// Update the portfolio post data
		$post->title            = e(Input::get('title'));
		if (empty($post->slug))
			$post->slug         = e(Str::slug(Input::get('title')));
		else
			$post->slug         = e(Str::slug(Input::get('slug')));
		$post->content          = e(Input::get('content'));
		$post->draft            = e(Input::get('draft'));
		$post->lang             = e(Input::get('lang'));
		$post->content          = e(Input::get('content'));
		$post->meta_title       = e(Input::get('meta-title'));
		$post->meta_description = e(Input::get('meta-description'));
		$post->meta_keywords    = e(Input::get('meta-keywords'));

		$image = Input::file('image');
		if ( ! empty($image)) {
			unlink($this->destinationPath . $post->image);
	        $filename = $post->slug . '_' . date('d-m-Y') . '.' . $image->getClientOriginalExtension();
	        $uploadSuccess = Input::file('image')->move($this->destinationPath, $filename);
	        $post->image            = e($filename);
	    }

		// Was the portfolio post created?
		if($post->save())
		{
			$post->tags()->detach();
			$tags = explode(',', Input::get('portfoliotags'));
			foreach ($tags as $tag) {
				if (PortfolioTag::where('name', '=', $tag)->count() == 0) {
					$newTag = new PortfolioTag;
					$newTag->name = ucwords($tag);
					$newTag->slug = Str::slug($tag);
					$newTag->save();
				}
				else {
					$newTag = PortfolioTag::where('name', '=', $tag)->first();
				}
				$post->tags()->attach($newTag->id);
			}

			// Redirect to the new portfolio post page
			return Redirect::route('portfolio.show', array('portfolio' => $post->slug))->with('success', Lang::get('portfolios/message.edit.success'));
		}

		// Redirect to the portfolio post create page
		return Redirect::route('portfolio.create')->with('error', Lang::get('portfolios/message.edit.error'));
	}

	/**
	 * Remove the specified resource from storage (GET).
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id) {
		$this->destroy($id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// Get the page data
		if (is_null($post = PortfolioPost::find($id)))
		{
			// Redirect to Page management page
			return Redirect::to('portfolio.admin')->with('error', Lang::get('portfolio/message.not_found'));
		}

		if ( ! empty($post->image)) {
			unlink($this->destinationPath . $post->image);
		}
		$post->tags()->detach();
		foreach (PortfolioTag::all() as $tag) {
			if ( ! $tag->posts->count()) {
				$tag->delete();
			}
		}
		// Was the page created?
		if($post->delete())
		{
			// Redirect to the new page page
			return Redirect::route('portfolio.admin')->with('success', Lang::get('portfolio/message.edit.success'));
		}

		// Redirect to the page admin page
		return Redirect::route('portfolio.admin')->with('error', Lang::get('portfolio/message.publish.error'));
	}

	/**
	 * Publish or UnPublish a post.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function publish($id, $state)
	{
		// Get the page data
		if (is_null($post = PortfolioPost::find($id)))
		{
			// Redirect to Portfolio management page
			return Redirect::to('portfolio.admin')->with('error', Lang::get('portfolio/message.not_found'));
		}

		$post->draft = $state;

		// Was the page created?
		if($post->save())
		{
			// Redirect to the Portfolio management page
			return Redirect::route('portfolio.admin')->with('success', Lang::get('portfolio/message.edit.success'));
		}

		// Redirect to the Portfolio management page
		return Redirect::route('portfolio.admin')->with('error', Lang::get('portfolio/message.publish.error'));
	}

}