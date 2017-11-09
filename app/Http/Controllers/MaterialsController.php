<?php

namespace Mec\Http\Controllers;

use Illuminate\Http\Request;
use Mec\Models\Material;
use Mec\Models\Color;
use Mec\Models\Size;
use Mec\Models\ColorMaterial;
use Mec\Models\MaterialSize;
use Mec\Models\Pdffile;
use Intervention\Image\ImageManagerStatic as Image;
use File;

class MaterialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $colors    = Color::all();
      $sizes     = Size::all();
      $material = Material::all();
      $materials = Material::with('size')->with('color')->with('pdf')->get();
      return view('materials.index')     ->withSizes($sizes)
                                         ->withColors($colors)
                                         ->withMaterials($materials)
                                         ->withMaterial($material);
    }

    /**
     * Show the form for creating a new resource.
     *ima
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $sizes = Size::pluck('size','id');
//        $color_codes = Color::pluck('color_code','id');
//        return view('materials.create')->withColors($color_codes)->withSizes($sizes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd("here");

//        $this->validate($request , array(
//          'name'        => 'required|max:255',
//          'description' => 'required',
//          'slug'        => 'required|max:255',
//          'image'       => 'sometimes|image',
//
//        ));
//        $material = new Material;
//        $material->name        = $request->name;
//        $material->description = $request->description;
//        $material->slug        = $request->slug;
//        $material->priority_order = $request->priorityOrder;
//        if($request->hasFile('image'))
//        {
//          $image    = $request->file('image');
//          $filename = time() . '.' . $image->getClientOriginalExtension();
//          $location = public_path('images/materials/'. $filename);
//          Image::make($image)->resize(400,400)->save($location);
//          $material->image = $filename;
//        }
//        $material->save();
//        if($request->hasFile('pdf'))
//        {
//          foreach ($request->file('pdf') as $pdf) {
//          $filename = $pdf->getClientOriginalName();
//          $location=public_path('files/materials/pdfs/'. $filename);
//          $pdf->move($location, $filename);
//          $pdf_save =new Pdffile;
//          $materials_id = Material::select('id')->where('slug','=',$request->slug)->get();
//            foreach ($materials_id as $key => $material_id) {
//                $pdf_save->material_id=$material_id->id;
//                $pdf_save->pdf_name =$filename;
//                $pdf_save->save();
//            }
//          }
//        }
//        if(isset($request->color_code))
//        {
//            foreach ($request->color_code as $color)
//            {
//                $color_id = Color::find($color);
//                $material->color()->save($color_id);
//            }
//        }
//        if(isset($request->size))
//        {
//            foreach ($request->size as $size)
//            {
//                $size_id = Size::find($size);
//                $material->size()->save($size_id);
//            }
//        }
//
//        return redirect()->route('materials.show' , $material->slug);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

//      $material_ids = Material::where('slug', '=' , $id)->pluck('id');
//      $array = array();
//      foreach ($material_ids as $material_id) {
//        $color_ids  = ColorMaterial::where('material_id' , '=' , $material_id)->pluck('color_id');
//        foreach ($color_ids as $color_id) {
//        $color_codes = Color::where('id' , '=' , $color_id)->pluck('color_code','id');
//        array_push($array,$color_codes);
//        }
//      }
//      return view('materials.color')->withColorid($array)->withMaterialid($material_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function color(Request $request)
    {

     $color_ids = $request->colorid;
     foreach($color_ids as $key=>$color_id)
     {
       $file = $request->file('image');
         if(isset($file[$key]))
           {
             $material_id = $request->materialid;
             $image    =$file[$key];
             $filename = $color_id.'_'.time() . '.' . $image->getClientOriginalExtension();
             $location = public_path('images/materials/colors/'. $filename);
             Image::make($image)->resize(400,400)->save($location);
             $material = ColorMaterial::where('material_id','=',$material_id)->where('color_id','=',$color_id)->first();
             $material->image = $filename;
             $material->save();
           }
         else
           {
             $file = $request->file('default');
             $material_id = $request->materialid;
             $image    =$file;
             $filename = $color_id.'_'.time() . '.' . $image->getClientOriginalExtension();
             $location = public_path('images/materials/colors/'. $filename);
             Image::make($image)->resize(400,400)->save($location);
             $material = ColorMaterial::where('material_id','=',$material_id)->where('color_id','=',$color_id)->first();
             $material->image = $filename;
             $material->save();
           }
     }
     return redirect()->route('material.index');
    }
}
