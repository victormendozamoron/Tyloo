<?php

class BlogController extends BaseController {
	private $destinationPath = 'public/uploads/blog_posts/';

	/**
	 * Initializer.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->beforeFilter('admin-auth', array('except' => array('index', 'show')));

		// Call parent
		parent::__construct();
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$blog_posts = BlogPost::where('draft', '=', '0')->paginate(10);
		return View::make('modules.blog.posts.index', compact('blog_posts'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function admin()
	{
		$blog_posts = BlogPost::all();
		return View::make('modules.blog.posts.admin', compact('blog_posts'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getPostsByTag($slug)
	{
		$tag = BlogTag::where('slug', '=', $slug)->first();
		$blog_posts = $tag->posts()->where('draft', '=', '0')->paginate(10);
		return View::make('modules.blog.posts.postsByTag', compact('tag', 'blog_posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('modules.blog.posts.create');
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

		// Create a new blog post
		$post = new BlogPost;

		// Update the blog post data
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
	        $post->image = e($filename);
	    }

		// Was the blog post created?
		if($post->save())
		{
			$tags = explode(',', Input::get('blogtags'));
			foreach ($tags as $tag) {
				if (BlogTag::where('name', '=', $tag)->count() == 0) {
					$newTag = new BlogTag;
					$newTag->name = ucwords($tag);
					$newTag->slug = Str::slug($tag);
					$newTag->save();
				}
				else {
					$newTag = BlogTag::where('name', '=', $tag)->first();
				}
				$post->tags()->attach($newTag->id);
			}

			// Redirect to the new blog post page
			return Redirect::route('blog.show', array('blog' => $post->slug))->with('success', Lang::get('modules/blogs/messages.success.create'));
		}

		// Redirect to the blog post create page
		return Redirect::route('blog.create')->with('error', Lang::get('modules/blogs/messages.error.create'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  string  $slug
	 * @return Response
	 */
	public function show($slug)
	{
		if (is_null($blog_post = BlogPost::where('slug', $slug)->first()))
		{
			// Put a 404 in ur face, yo !
			return App::abort(404);
		}
		return View::make('modules.blog.posts.show', compact('blog_post'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = BlogPost::find($id);
		$tags = null;
		foreach ($post->tags as $tag) {
			$tags .= ',' . $tag->name;
		}
		$tags = substr($tags, 1);
		return View::make('modules.blog.posts.edit', compact('post', 'tags'));
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

		// Create a new blog post
		$post = BlogPost::find($id);

		// Update the blog post data
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

		// Was the blog post created?
		if($post->save())
		{
			$post->tags()->detach();
			$tags = explode(',', Input::get('blogtags'));
			foreach ($tags as $tag) {
				if (BlogTag::where('name', '=', $tag)->count() == 0) {
					$newTag = new BlogTag;
					$newTag->name = ucwords($tag);
					$newTag->slug = Str::slug($tag);
					$newTag->save();
				}
				else {
					$newTag = BlogTag::where('name', '=', $tag)->first();
				}
				$post->tags()->attach($newTag->id);
			}

			// Redirect to the new blog post page
			return Redirect::route('blog.show', array('blog' => $post->slug))->with('success', Lang::get('modules/blogs/messages.success.edit'));
		}

		// Redirect to the blog post create page
		return Redirect::route('blog.create')->with('error', Lang::get('modules/blogs/messages.error.edit'));
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
		if (is_null($post = BlogPost::find($id)))
		{
			// Redirect to BlogPost management page
			return Redirect::to('blog.admin')->with('error', Lang::get('modules/blogs/messages.error.not_found'));
		}

		if ( ! empty($post->image)) {
			unlink($this->destinationPath . $post->image);
		}
		$post->tags()->detach();
		foreach (BlogTag::all() as $tag) {
			if ( ! $tag->posts->count()) {
				$tag->delete();
			}
		}
		// Was the page created?
		if($post->delete())
		{
			// Redirect to the BlogPost management page
			return Redirect::route('blog.admin')->with('success', Lang::get('modules/blogs/messages.success.delete'));
		}

		// Redirect to the BlogPost management page
		return Redirect::route('blog.admin')->with('error', Lang::get('modules/blogs/messages.error.delete'));
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
		if (is_null($post = BlogPost::find($id)))
		{
			// Redirect to Page management page
			return Redirect::to('blog.admin')->with('error', Lang::get('modules/blogs/messages.error.not_found'));
		}

		$post->draft = $state;

		// Was the page created?
		if($post->save())
		{
			// Redirect to the new page page
			return Redirect::route('blog.admin')->with('success', Lang::get('modules/blogs/messages.success.publish'));
		}

		// Redirect to the pagecreate page
		return Redirect::route('blog.admin')->with('error', Lang::get('modules/blogs/messages.error.publish'));
	}

}