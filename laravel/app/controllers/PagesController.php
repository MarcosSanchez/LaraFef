<?php

class PagesController extends \BaseController {

	/**
	 * Display a listing of pages
	 *
	 * @return Response
	 */
	public function index()
	{
		$pages = Page::all();

		return View::make('pages.index', compact('pages'));
	}

	/**
	 * Show the form for creating a new page
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pages.create');
	}

	/**
	 * Store a newly created page in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Page::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		
		$page = new Page;
		
		$page->title = e(Input::get('title'));
		
		$page->slug = e(Str::slug(Input::get('slug')));
		
		$page->content = Input::get('content');
		
		$page->author = Sentry::getUser()->id;
		
		if(Input::has('main')) DB::table('pages')->update(array('main' => 0));
		
		$page->main = Input::has('main') ? 1 : 0;
		
		if($page->save())
		{
			
			return Redirect::to('admin/pages')->with('message','Pagina '.$page->title.' con el ID: '.$page->id.' creada');
			
		}
		
		return Redirect::to('admin/pages/create')->withInput()->with('message','No hemos podido crear la pagina');
	}

	/**
	 * Display the specified page.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$page = Page::findOrFail($id);

		return View::make('pages.show', compact('page'));
	}

	/**
	 * Show the form for editing the specified page.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$page = Page::find($id);

		return View::make('pages.edit', compact('page'));
	}

	/**
	 * Update the specified page in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$page = Page::findOrFail($id);
		
		$page->title = e(Input::get('title'));
		
		$page->slug = e(Str::slug(Input::get('slug')));
		
		$page->content = Input::get('content');
		
		if(Input::has('main')) DB::table('pages')->update(array('main' => 0));
		
		$page->main = Input::has('main') ? 1 : 0;
		
		if($page->save())
		{
			
			return Redirect::to('admin/pages')->with('message','Pagina '.$page->title.' con el ID: '.$page->id.' esta actualizada');
			
		}
		
		return Redirect::to('admin/pages/'.$page->id.'/edit')->withInput()->with('message','No hemos podido crear la pagina');
	}
	/**
	 * Remove the specified page from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Page::destroy($id);

		return Redirect::to('admin/pages')->with('message','Pagina '.$id.' actualizado');
	}

}
