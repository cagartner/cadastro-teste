<?php

class PeoplesController extends \BaseController {

	/**
	 * Display a listing of peoples
	 *
	 * @return Response
	 */
	public function index()
	{
		$peoples = People::all();

		return View::make('peoples.index', compact('peoples'));
	}

	/**
	 * Show the form for creating a new people
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('peoples.create');
	}

	/**
	 * Store a newly created people in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), People::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		People::create($data);

		return Redirect::route('peoples.index');
	}

	/**
	 * Display the specified people.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$people = People::findOrFail($id);

		return View::make('peoples.show', compact('people'));
	}

	/**
	 * Show the form for editing the specified people.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$people = People::find($id);

		return View::make('peoples.edit', compact('people'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$people = People::findOrFail($id);

		$validator = Validator::make($data = Input::all(), People::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$people->update($data);

		return Redirect::route('peoples.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		People::destroy($id);

		return Redirect::route('peoples.index');
	}

}