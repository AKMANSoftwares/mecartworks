<?php

namespace Mec\Http\Controllers;
use Request;

class ShowExploreUsController extends Controller
{
    public function index()
    {
        return view('showExploreUs.index');
    }

    public function ourStory()
    {
        return view('showExploreUs.ourStory');
    }
}
