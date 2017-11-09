<?php

namespace Mec\Http\Controllers;

use Illuminate\Http\Request;
use Mec\Models\Collection;
use Mec\Models\CollectionType;
use Mec\Models\CollectionItem;
use Mec\Models\Catalogue;
use Mec\Models\CollectionCollectionType;
use Intervention\Image\ImageManagerStatic as Image;
use File;

class CollectionItemController extends Controller
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

      $collectionitems = CollectionItem::orderBy('priority_order','asc')->simplepaginate(15);

      return view('collectionitem.index')->withCollectionitems($collectionitems);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $catalogue       = Catalogue::pluck('name','id');
      $collections     = Collection::with('types')->get();
      $collectiontypes = CollectionType::all();
      return view('collectionitem/create')->withCollections($collections)
                                          ->withCatalogue($catalogue)
                                          ->withCollectiontypes($collectiontypes);
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
          'code_number'  => 'required|max:255',
          'title' => 'required|max:255',
          'catalogue_id' => 'max:255',
          'slug'  => "required|min:5|max:255|unique:collection_items,slug",
          'image' => 'sometimes|image',
        ));
        $collection_item = new CollectionItem;
        $collection_item->code_number = $request->code_number;
        $collection_item->title = $request->title;
        $collection_item->catalogue_id = $request->catalogue_id;
        $collection_item->slug = $request->slug;
        $collection_item->description = $request->description;
        $collection_item->priority_order = $request->priorityOrder;
        if ($request->hasFile('image')) {
            $image    = $request->file('image');
            $filename = $request->slug.'_'.time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/collectionitem/'.$filename);
            Image::make($image)->save($location);
            $collection_item->image = $filename;
        }
        $col_coltype_id =\DB::table('collection_collection_type')->where([['collection_id', '=', $request->collection], ['collection_type_id','=',$request->collectiontype]])->pluck('id');
        foreach ($col_coltype_id as $key => $value) {
          $collection_item->col_coltype_id = $value;
        }
        $collection_item->save();
        return redirect()->route('collectionitem.show',$collection_item->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $collection_item = CollectionItem::find($id);
        return view('collectionitem.show')->withCollectionitem($collection_item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($collectionItemId)
    {
        $catalogue = Catalogue::pluck('name', 'id');
        $collections = Collection::with('types')->get();
        $collectiontypes = CollectionType::all();
        $collectionItem = CollectionItem::find($collectionItemId);
        $collectionColType = CollectionCollectionType::find($collectionItem->col_coltype_id);

        $collectionItemCollection = Collection::find($collectionColType->collection_id);
        $collectionTypeId = $collectionColType->collection_type_id;
        $catalogue_id = Catalogue::pluck('name', 'id');

        return view('collectionitem/edit')->withCollections($collections)
            ->withCatalogue($catalogue)
            ->withCollectiontypes($collectiontypes)
            ->withCollectionitem($collectionItem)
            ->withCatalogueid($catalogue_id)
            ->withCollectionitemcollection($collectionItemCollection)
            ->withCollectiontypeid($collectionTypeId);

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
            'code_number'  => 'required|max:255',
            'title' => 'required|max:255',
            'catalogue_id' => 'max:255',
            'slug'  => "required|min:5|max:255|unique:collection_items,slug,$id",
            'image' => 'sometimes|image',
        ));
        $collection_item = CollectionItem::find($request->collectionItemId);
        //dd($collection_item);
        $collection_item->code_number = $request->code_number;
        $collection_item->title = $request->title;
        $collection_item->catalogue_id = $request->catalogue_id;
        $collection_item->slug = $request->slug;
        $collection_item->description = $request->description;
        $collection_item->priority_order = $request->priorityOrder;
        if ($request->hasFile('image')) {

            $image    = $request->file('image');
            $filename = $request->slug.'_'.time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/collectionitem/'.$filename);
            Image::make($image)->save($location);
            $oldFilename = $collection_item->image;
            $collection_item->image = $filename;

            File::delete(public_path('images/collectionitem/'.$oldFilename));

        }
        $col_coltype_id =\DB::table('collection_collection_type')->where([['collection_id', '=', $request->collection], ['collection_type_id','=',$request->collectiontype]])->pluck('id');
        foreach ($col_coltype_id as $key => $value) {
            $collection_item->col_coltype_id = $value;
        }
        $collection_item->save();
        return redirect()->route('collectionitem.show',$collection_item->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $collection_item = CollectionItem::find($id);
        File::delete(public_path('images/collectionitem/' . $collection_item->image));
        $collection_item->delete();

        return redirect()->route('collectionitem.index');

    }

}
