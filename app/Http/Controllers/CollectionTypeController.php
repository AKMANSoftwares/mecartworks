<?php

namespace Mec\Http\Controllers;


use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Mec\Models\Collection;
use Mec\Models\CollectionType;
use File;
class CollectionTypeController extends Controller
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

        $collectiontypes = CollectionType::orderBy('priority_order','asc')->simplepaginate(5);
        return view('collectiontype.index')->withCollectiontypes($collectiontypes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('collectiontype.create');
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
            'slug'  => 'required|min:4|max:255|unique:collection_types,slug',
            'image' => 'sometimes|image',
        ));

        $collection_type = new CollectionType;
        $collection_type->name = $request->name;
        $collection_type->slug = $request->slug;
        $collection_type->priority_order = $request->priorityOrder;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/collectiontype/' . $filename);
            Image::make($image)->resize(400, 600)->save($location);
            $collection_type->image = $filename;
        }
        if(isset($request->ispixel))
        {
            $collection_type->ispixel = $request->ispixel;
        }
        else {
          $collection_type->ispixel = 0;
        }
        $collection_type->save();
        return redirect()->route('collectiontype.show', $collection_type->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $collection_type = CollectionType::find($id);
        return view('collectiontype.show')->withCollectiontype($collection_type);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $collection_type = CollectionType::find($id);
        return view('collectiontype.edit')->withCollectiontype($collection_type);
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
          'slug'  => "required|min:4|max:255|unique:collection_types,slug,$id",
          'image' => 'sometimes|image',
      ));
        $collection_type = CollectionType::find($id);
        $collection_type->name = $request->name;
        $collection_type->slug = $request->slug;
        $collection_type->priority_order = $request->priorityOrder;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/collectiontype/' . $filename);
            Image::make($image)->resize(400, 600)->save($location);
            $oldFilename = $collection_type->image;
            $collection_type->image = $filename;
            File::delete(public_path('images/collectiontype/' . $oldFilename));

        }
        if(isset($request->ispixel))
        {
            $collection_type->ispixel = $request->ispixel;
        }
        else {
          $collection_type->ispixel = 0;
        }
        $collection_type->save();
        return redirect()->route('collectiontype.show', $collection_type->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $collection_type = CollectionType::find($id);
        File::delete(public_path('images/collectiontype/' . $collection_type->image));
        $collection_type->delete();
        return redirect()->route('collectiontype.index');
    }

}
