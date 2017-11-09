<?php

namespace Mec\Http\Controllers;

use Mec\Models\Career;

class CareersController extends Controller {
	public function index() {
		$careers = Career::orderBy('priority_order', 'asc')->where('isActive', 1)->paginate(5);

		return view('careers.index')->withCareers($careers);
	}
	public function showDescription($slug) {

		$career = Career::where('slug', $slug)->first();
		return view('careers.showDescription')->withCareer($career);
	}
}
