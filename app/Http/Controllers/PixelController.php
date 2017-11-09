<?php
namespace Mec\Http\Controllers;

use Illuminate\Http\Request;
use Mec\Models\Collection;
use Mec\Models\CollectionCollectionType;
use Mec\Models\CollectionType;
use Mec\Models\CollectionItem;
use Mec\Models\Catalogue;
use Mec\Models\PixelColor;
use Mec\Models\PixelDesign;
use Mec\Models\PixelImage;
use Mec\Models\Pixel;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use DB;
class PixelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pixelitems = Pixelitems::orderBy('priority_order','asc')->with('pixelimage')->with('pixelcolor')->with('pixeldesign')->get();
        return view('pixelitem.index')->withPixelitems($pixelitems);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function showPixelitems($collection_slug,$collection_type_slug)
    {
      $collectionid = Collection::where('slug','=',$collection_slug)->pluck('id');
      $collectiontypeid = CollectionType::where('slug','=',$collection_type_slug)->pluck('id');
      $collections = Collection::find($collectionid);
      $collectiontypes = CollectionType::find($collectiontypeid);
      $col_coltype_id= CollectionCollectionType::where('collection_id','=',$collectionid )
                                                ->where('collection_type_id','=',$collectiontypeid)
                                                ->pluck('id');
      $pixelitems = Pixel::where('col_coltype_id','=',$col_coltype_id)
                                    ->with('pixel')
                                    ->with('pixelimage')
                                    ->with('pixeldesign')
                                    ->with('pixelcolor')
                                    ->get();
      $pixelcolor = PixelColor::all();
      $pixeldesign = Pixeldesign::all();
      return view('pixelitem.index')->withPixelitems($pixelitems)
                                    ->withPixelcolors($pixelcolor)
                                    ->withPixeldesigns($pixeldesign)
                                    ->withCollections($collections)
                                    ->withCollectiontypes($collectiontypes);
    }

    public function showSinglePixelItem($slug)
    {
      $pixelitem = Pixel::where('slug','=',$slug)
                                  ->with('pixel')
                                  ->with('pixelimage')
                                  ->with('pixelcolor')
                                  ->with('pixeldesign')
                                  ->get()->first();
        $col_col_type = CollectionCollectionType::find($pixelitem->col_coltype_id);
        $collection = Collection::find($col_col_type->collection_id);
        $collectiontype = CollectionType::find($col_col_type->collection_type_id);
      return view('pixelitem.single')->withPixelitem($pixelitem)->withCollection($collection)->withCollectiontype($collectiontype);
    }
}
