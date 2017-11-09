<?php

namespace Mec\Http\Controllers;

use Illuminate\Http\Request;
use Mec\Models\Career;

class CareerController extends Controller {

	public function __construct() {
		$this->middleware('auth', ['except' => ['logout']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$careers = Career::orderBy('priority_order', 'asc')->paginate(5);

		return view('admin.careers.index')->withCareers($careers);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		return view('admin.careers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$this->validate($request, array(
			'title' => 'required|max:255',
			'body' => 'required',
			'slug' => 'required|min:5|max:255|unique:posts,slug',

		));

		$career = new Career;
		$career->title = $request->title;
		$career->slug = $request->slug;
		$career->description = $request->body;
		$career->priority_order = $request->priorityOrder;
		$career->save();
		// return redirect()->back();
		return redirect()->route('careers.show', $career->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$career = Career::find($id);
		return view('admin.careers.show')->withCareer($career);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$career = Career::find($id);
		return view('admin.careers.edit')->withCareer($career);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//

		$this->validate($request, array(
			'title' => 'required|max:255',
			'body' => 'required',
			'slug' => 'required|min:5|max:255|unique:posts,slug',
			'priorityOrder' => 'required',

		));
		//institleert into database
		$career = Career::find($id);
		$career->title = $request->title;
		$career->slug = $request->slug;
		$career->description = $request->body;
		$career->priority_order = $request->priorityOrder;
		if (isset($request->isActive)) {
			$career->isActive = 1;
		} else {
			$career->isActive = 0;
		}
		$career->save();
		// return redirect()->back();
		return redirect()->route('careers.show', $id);
		//return redirect()->route('catalogue.show', $catalogue->id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$career = Career::find($id);
		$career->delete();
		return redirect()->route('careers.index');
	}
}
