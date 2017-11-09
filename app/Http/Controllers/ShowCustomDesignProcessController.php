<?php

namespace Mec\Http\Controllers;

use Illuminate\Http\Request;

class ShowCustomDesignProcessController extends Controller
{
    public function __invoke()
    {
        return view('showCustomDesignProcess.index');
    }
}