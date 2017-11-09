<?php

namespace Mec\Http\Controllers;

use Illuminate\Http\Request;
use Mec\Models\Size;
use Intervention\Image\ImageManagerStatic as Image;
use File;
class MaterialSizeController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth',['except'=>['logout'] ]);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $sizes = Size::orderBy('id','desc')->simplepaginate(5);
      return view('admin.materialsize.index')->withSizes($sizes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.materialsize.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,array(
              'size'       => 'required',
          ));
      $size = new Size;
      $size->size = $request->size;
      $size->save();
      return redirect()->route('material-size.show', $size->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $size = Size::find($id);
      return view('admin.materialsize.show')->withSize($size);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $size = Size::find($id);
      return view('admin.materialsize.edit')->withSize($size);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request,array(
              'size'       => 'required',
          ));
      $size = Size::find($id);
      $size->size = $request->size;
      $size->save();
      return redirect()->route('material-size.show', $size->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $size = Size::find($id);
      $size->delete();
      return redirect()->route('material-size.index');
    }
}
