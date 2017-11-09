<?php
namespace Mec\Http\Controllers;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['logout']]);
    }

    public function getDashboard()
    {
        return view('admin.dashboard');
    }
}
