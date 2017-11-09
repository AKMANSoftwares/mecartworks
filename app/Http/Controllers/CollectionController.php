<?php

namespace Mec\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Mec\Models\Collection;
use Mec\Models\CollectionCollectionType;
use Mec\Models\CollectionType;
use File;
class CollectionController extends Controller
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
          $collections = Collection::orderBy('created_at', 'desc')->paginate(5);
          return view('collections.index')->withCollections($collections);
      }

      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */

      public function create()
      {
          $collectiontypes = CollectionType::pluck('name', 'id');
          return view('collections.create', [
              'collectiontypes' => $collectiontypes,
          ]);
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
              'collectiontype'=>'required',
              'slug'  => 'required|min:5|max:255|unique:collections,slug',
              'image' => 'sometimes|image'
          ));

          $collection = new Collection;
          $collection->name = $request->name;
          $collection->description = $request->description;
          $collection->slug = $request->slug;
          if ($request->hasFile('image')) {
              $image = $request->file('image');
              $filename = time() . '.' . $image->getClientOriginalExtension();
              $location = public_path('images/collection/' . $filename);
              Image::make($image)->resize(800, 400)->save($location);
              $collection->image = $filename;
          }
          $collection->save();

          if (isset($request->collectiontype)) {
              foreach ($request->collectiontype as $collection_id) {
                  $collectiontype_id = CollectionType::find($collection_id);
                  $collection->types()->save($collectiontype_id);
              }
          }
          return redirect()->route('collection.show', $collection->id);
      }

      /**
       * Display the specified resource.
       *
       * @param  int $id
       * @return \Illuminate\Http\Response
       */
      public function show($id)
      {
          $collection = Collection::find($id);
          return view('collections.show')->withCollection($collection);
      }

      /**
       * Show the form for editing the specified resource.
       *
       * @param  int $id
       * @return \Illuminate\Http\Response
       */
      public function edit($id)
      {

          $collection = Collection::find($id);
          $collectiontypes = CollectionType::all();
          $collectionColTypes = CollectionCollectionType::where('collection_id', $id)->get();;
          $collectionColTypeIds = [];
          foreach ($collectionColTypes as $collectionColType) {

              array_push($collectionColTypeIds, $collectionColType->collection_type_id);
          }

          return view('collections.edit')
              ->withCollection($collection)
              ->withCollectiontypes($collectiontypes)
              ->withCollectioncoltypeids($collectionColTypeIds);
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
            'description' => 'required',
            'slug'  => "required|min:5|max:255|unique:collections,slug,$id",
            'image' => 'sometimes|image'
        ));
          $collection = Collection::find($id);
          $collection->name = $request->name;
          $collection->description = $request->description;
          $collection->slug = $request->slug;
          if ($request->hasFile('image')) {
              $image = $request->file('image');
              $filename = time() . '.' . $image->getClientOriginalExtension();
              $location = public_path('images/collection/' . $filename);
              Image::make($image)->resize(800, 400)->save($location);
              $oldFilename = $collection->image;
              $collection->image = $filename;
              File::delete(public_path('images/collection/' . $oldFilename));
          }
          if (isset($request->collectionTypesList)) {
              $collection->types()->detach();
              foreach ($request->collectionTypesList as $collection_id) {
                  $collectiontype_id = CollectionType::find($collection_id);
                  $collection->types()->save($collectiontype_id);
              }
          }
          $collection->save();
          return redirect()->route('collection.show', $collection->id);
      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  int $id
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
          $collection = Collection::find($id);
          File::delete(public_path('images/collection/' . $collection->image));
          $collection->delete();
          return redirect()->route('collection.index');
      }

}
