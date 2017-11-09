<?php

namespace Mec\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Mec\Models\Color;
use Mec\Models\ColorMaterial;
use Mec\Models\Material;
use Mec\Models\MaterialSize;
use Mec\Models\Pdffile;
use Mec\Models\Size;

class MaterialAdminController extends Controller
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

        $materials = Material::orderBy('priority_order', 'asc')->simplepaginate(5);

        return view('materialAdmin/index',
            [
                'materials' => $materials,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sizes = Size::pluck('size', 'id');
        $color_codes = Color::pluck('color_code', 'id');
        return view('materialAdmin.create')->withColors($color_codes)->withSizes($sizes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, array(
            'name' => 'required|max:255',
            'description' => 'required',
            'slug'  => "required|min:4|max:255|unique:materials,slug",
            'image' => 'sometimes|image',

        ));
        $material = new Material;
        $material->name = $request->name;
        $material->description = $request->description;
        $material->slug = $request->slug;
        $material->priority_order = $request->priorityOrder;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/materials/' . $filename);
            Image::make($image)->resize(400, 400)->save($location);
            $material->image = $filename;
        }
        $material->save();
        if ($request->hasFile('pdf')) {
            foreach ($request->file('pdf') as $pdf) {
                $filename = $pdf->getClientOriginalName();
                $location = public_path('files/materials/pdfs/' . $filename);
                $pdf->move($location, $filename);
                $pdf_save = new Pdffile;
                $materials_id = Material::select('id')->where('slug', '=', $request->slug)->get();
                foreach ($materials_id as $key => $material_id) {
                    $pdf_save->material_id = $material_id->id;
                    $pdf_save->pdf_name = $filename;
                    $pdf_save->save();
                }
            }
        }
        if (isset($request->color_code)) {
            foreach ($request->color_code as $color) {
                $color_id = Color::find($color);
                $material->color()->save($color_id);
            }
        }
        if (isset($request->size)) {
            foreach ($request->size as $size) {
                $size_id = Size::find($size);
                $material->size()->save($size_id);
            }
        }

        return redirect()->route('material.show', $material->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $material_ids = Material::where('slug', '=', $id)->pluck('id');

        $array = array();
        foreach ($material_ids as $material_id) {
            $color_ids = ColorMaterial::where('material_id', '=', $material_id)->pluck('color_id');
            foreach ($color_ids as $color_id) {
                $color_codes = Color::where('id', '=', $color_id)->pluck('color_code', 'id');
                array_push($array, $color_codes);
            }
        }
        return view('materialAdmin.create-color')->withColorid($array)->withMaterialid($material_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $sizes = Size::pluck('size', 'id');
        $color_codes = Color::pluck('color_code', 'id');
        $materialColors = ColorMaterial::where('material_id', $id)->get();
        $materialSizes = MaterialSize::where('material_id', $id)->get();
        $material = Material::find($id);
        $pdfFiles = Pdffile::where('material_id',$id)->get();

        $materialColorIds = [];
        foreach ($materialColors as $materialColor) {
            array_push($materialColorIds, $materialColor->color_id);
        }
        $materiaSizeIds = [];
        foreach ($materialSizes as $materialSize) {
            array_push($materiaSizeIds, $materialSize->size_id);
        }

        return view('materialAdmin.edit')
            ->withColors($color_codes)
            ->withSizes($sizes)
            ->withMaterialsizes($materiaSizeIds)
            ->withMaterialcolors($materialColorIds)
            ->withMaterial($material)
            ->withPdffiles($pdfFiles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        {
            //  dd($id);
            $this->validate($request, array(
                'name' => 'required|max:255',
                'description' => 'required',
                'slug'  => "required|min:4|max:255|unique:materials,slug,$id",
                'image' => 'sometimes|image',

            ));
            $material = Material::find($id);
            $material->name = $request->name;
            $material->description = $request->description;
            $material->slug = $request->slug;
            $material->priority_order = $request->priorityOrder;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/materials/' . $filename);
                Image::make($image)->resize(400, 400)->save($location);
                $oldFilename = $material->image;
                $material->image = $filename;

                File::delete(public_path('images/materials/' . $oldFilename));
            }
            $material->save();
            if ($request->hasFile('pdf')) {
                $material_pffiles = Pdffile::where('material_id', $id)->get();
//delete previous pdfs
                foreach ($material_pffiles as $pdffile) {
                    $filename = $pdffile->pdf_name;

                    // $location = public_path('files/materials/pdfs/'. $filename.'/'.$filename);

                    $oldFilename = $filename;
                    $pdffile->delete();
                    File::delete(public_path('files/materials/pdfs/' . $oldFilename . '/' . $oldFilename));
                }
//save new pdfs
                foreach ($request->file('pdf') as $pdf) {
                    $filename = $pdf->getClientOriginalName();
                    $location = public_path('files/materials/pdfs/' . $filename);
                    $pdf->move($location, $filename);
                    $pdf_update = new Pdffile();
                    // dd($pdf_update);
                    // $materials_id = Material::select('id')->where('slug','=',$request->slug)->get();
                    // foreach ($pdf_update as $pdf) {
                    //    $pdf_save->material_id=$material_id->id;
                    $pdf_update->pdf_name = $filename;
                    $pdf_update->material_id = $id;
                    $pdf_update->save();
                    //  }
                }
            }
            $previouslySelectedImages=ColorMaterial::where('material_id',$id)->get();

            if (isset($request->color_code)) {

                $material->color()->detach();
                foreach ($request->color_code as $color) {
                    $color_id = Color::find($color);

                    $material->color()->save($color_id);

                }
            }
            if (isset($request->size)) {
                $material->size()->detach();
                foreach ($request->size as $size) {
                    $size_id = Size::find($size);

                    $material->size()->save($size_id);
                }
            }

            return $this->showNext($id,$previouslySelectedImages);
        }

    }

    //for update
    public function showNext($id,$previouslySelectedImages)
    {

        $array = array();

        $color_ids = ColorMaterial::where('material_id', '=', $id)->pluck('color_id');

        foreach ($color_ids as $color_id) {
            $color_names = Color::where('id', '=', $color_id)->pluck('name', 'id');
            array_push($array, $color_names);
        }

        return view('materialAdmin.edit-color')
            ->withColorid($array)
            ->withMaterialid($id)
            ->withPreviouslyselectedimages($previouslySelectedImages);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = Material::find($id);

        File::delete(public_path('images/materials/' . $material->image));
        $material->delete();
        return redirect()->route('material.index');

    }

    public function color(Request $request)
    {

        $color_ids = $request->colorid;
        foreach ($color_ids as $key => $color_id) {
            $file = $request->file('image');

            if (isset($file[$key])) {
                $material_id = $request->materialid;
                $image = $file[$key];
                $filename = $color_id . '_' . time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/materials/colors/' . $filename);
                Image::make($image)->resize(400, 400)->save($location);
                $material = ColorMaterial::where('material_id', '=', $material_id)->where('color_id', '=', $color_id)->first();
                //    dd($material);
                $material->image = $filename;
                $material->save();
            } else {
                $file = $request->file('default');
                $material_id = $request->materialid;
                $image = $file;
                $filename = $color_id . '_' . time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/materials/colors/' . $filename);
                Image::make($image)->resize(400, 400)->save($location);
                $material = ColorMaterial::where('material_id', '=', $material_id)->where('color_id', '=', $color_id)->first();
                $material->image = $filename;
                $material->save();
            }

        }
        return redirect()->route('material.index');
    }

    public function updateColor(Request $request)
    {
        if (count($request->files) > 0) {

            $color_ids = $request->colorid;
            foreach ($color_ids as $key => $color_id) {
                $file = $request->file('image');

                if (isset($file[$key])) {

                    $material_id = $request->materialid;
                    $image = $file[$key];
                    $filename = $color_id . '_' . time() . '.' . $image->getClientOriginalExtension();
                    $location = public_path('images/materials/colors/' . $filename);
                    Image::make($image)->resize(400, 400)->save($location);
                    $material = ColorMaterial::where('material_id', '=', $material_id)->where('color_id', '=', $color_id)->first();

                    $material->image = $filename;
                    $material->save();
                } else {
                    $file = $request->file('default');
                    $material_id = $request->materialid;
                    $image = $file;
                    $filename = $color_id . '_' . time() . '.' . $image->getClientOriginalExtension();
                    $location = public_path('images/materials/colors/' . $filename);
                    Image::make($image)->resize(400, 400)->save($location);
                    $material = ColorMaterial::where('material_id', '=', $material_id)->where('color_id', '=', $color_id)->first();
                    $material->image = $filename;
                    $material->save();
                }

            }
        }
        return redirect()->route('material.index');
    }

    public function viewMaterial($materialId)
    {
        $material = Material::find($materialId);
        return view('materialAdmin/show',
            [
                'material' => $material,

            ]);
    }
}
