<?php

namespace Mec\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Mec\Models\Catalogue;
use File;
class CatalogueController extends Controller
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
        $catalogues = Catalogue::orderBy('priority_order','asc')->simplepaginate(5);
        // dd($catalogues);
        return view('catalogue.index',
            [
                'catalogues' => $catalogues,

            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('catalogue.create');
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
            'priorityOrder'=>'required',
            'image' => 'sometimes|image',
        ));
        $catalogue = new Catalogue();
        $catalogue->name = $request->name;
        $catalogue->priority_order = $request->priorityOrder;
        $catalogue->description = $request->description;
        $catalogue->catalogue_link = $request->catalogueLink;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/catalogues/' . $filename);
            Image::make($image)->resize(400, 400)->save($location);
            $catalogue->image = $filename;
        }
        $catalogue->save();
        return redirect()->route('catalogue.show',$catalogue->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $catalogue = Catalogue::find($id);
        return view('catalogue.show')->withCatalogue($catalogue);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catalogue = Catalogue::find($id);

        return view('catalogue/edit')->withCatalogue($catalogue);

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

        $this->validate($request, array(
            'name' => 'required|max:255',
            'priorityOrder' => 'required',
            'image' => 'sometimes|image',
        ));
        $catalogue = Catalogue::find($id);

        $catalogue->name = $request->name;
        $catalogue->description = $request->description;
        $catalogue->catalogue_link = $request->catalogueLink;
        $catalogue->priority_order = $request->priorityOrder;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/catalogues/' . $filename);
            Image::make($image)->resize(400, 400)->save($location);
            $oldFilename = $catalogue->image;
            $catalogue->image = $filename;
            File::delete(public_path('images/catalogues/' . $oldFilename));
        }
        $catalogue->save();
        return redirect()->route('catalogue.show',$catalogue->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catalogue = Catalogue::find($id);
        File::delete(public_path('images/catalogues/' . $catalogue->image));
        $catalogue->delete();
        return redirect()->route('catalogue.index');

    }
}
