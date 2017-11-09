<?php

namespace Mec\Http\Controllers;

use Illuminate\Http\Request;
use Mec\Models\Color;
use Intervention\Image\ImageManagerStatic as Image;
use File;

class MaterialColorController extends Controller
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
        $colors = Color::orderBy('id','desc')->simplepaginate(5);
        return view('admin.materialcolor.index')->withColors($colors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.materialcolor.create');
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
              'name'       => 'required',
              'color_code' => 'required|max:255',
          ));
      $color = new Color;
      $color->name = $request->name;
      $color->color_code = $request->color_code;
      if($request->hasFile('image'))
      {
            $image=$request->file('image');
            $filename = $request->name.'-'.$image->getClientOriginalName();
            $location = public_path('images/materials/general_colors/'.$filename);
            Image::make($image)->resize(400,400)->save($location);
            $color->image =$filename;
      }
      $color->save();
      return redirect()->route('material-color.show', $color->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $color = Color::find($id);
      return view('admin.materialcolor.show')->withColor($color);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $color = Color::find($id);
        return view('admin.materialcolor.edit')->withColor($color);

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
              'name'       => 'required',
              'color_code' => 'required|max:255',
          ));
      $color = Color::find($id);
      $color->name = $request->name;
      $color->color_code = $request->color_code;
      if($request->hasFile('image'))
      {
            $image=$request->file('image');
            $filename = $request->name.'-'.$image->getClientOriginalName();
            $location = public_path('images/materials/general_colors/'.$filename);
            Image::make($image)->resize(400,400)->save($location);
            $oldFilename = $color->image;
            $color->image =$filename;
            //delete old image
            File::delete(public_path('images/materials/general_colors/'. $oldFilename));
      }
      $color->save();
      return redirect()->route('material-color.show', $color->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color = Color::find($id);
        $color->delete();
        return redirect()->route('material-color.index');
    }
}
