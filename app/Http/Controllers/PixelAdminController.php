<?php

namespace Mec\Http\Controllers;

use Illuminate\Http\Request;
use Mec\Models\Collection;
use Mec\Models\CollectionType;
use Mec\Models\CollectionItem;
use Mec\Models\Catalogue;
use Mec\Models\CollectionCollectionType;
use Mec\Models\PixelColor;
use Mec\Models\PixelDesign;
use Mec\Models\PixelImage;
use Mec\Models\Pixel;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use DB;
class PixelAdminController extends Controller
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
      $pixelitems = Pixel::orderBy('id','desc')->with('catalogue')->simplepaginate(5);
      return view('admin.pixelitems.index')->withPixelitems($pixelitems);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $pixelrelations  = Pixel::all();
      $catalogue       = Catalogue::pluck('name','id');
      $collectiontypes = CollectionType::where('ispixel','=','1')->get();
      $collections     = Collection::with('types')->get();
      $array = array();
      foreach ($collections as $key => $collection) {
        foreach ($collection->types as $key => $types) {
          foreach ($collectiontypes as $key => $collectiontype) {
            if($types->id == $collectiontype->id)
            {
              $collectionarray[$collection->id]=$collection->name;
            }
          }
        }
      }
      $pixelcolor      = PixelColor::all();
      $pixeldesign     = PixelDesign::all();
      return view('admin.pixelitems.create')->withCollections($collectionarray)
                                          ->withCatalogue($catalogue)
                                          ->withCollectiontypes($collectiontypes)
                                          ->withPixelcolors($pixelcolor)
                                          ->withPixeldesigns($pixeldesign)
                                          ->withPixelrelations($pixelrelations);
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
              'code_number' => 'required|max:255',
              'title'       => 'required',
              'catalogue_id'=> 'required',
              'slug'  => "required|min:5|max:255|unique:pixels,slug",
              'description'       => 'required'
          ));
         $pixel_item = new Pixel;
         $pixel_item->code_number = $request->code_number;
         $pixel_item->orderby = $request->orderby;
         $pixel_item->slug = $request->slug;
         $pixel_item->catalogue_id = $request->catalogue_id;
         $pixel_item->title = $request->title;
         $pixel_item->description = $request->description;
         if($request->hasFile('featured_image'))
         {
               $image=$request->file('featured_image');
               $filename = $request->title.'-'.$image->getClientOriginalName();
               $location = public_path('images/collectionitem/'.$filename);
               Image::make($image)->save($location);
               $pixel_item->featured_image =$filename;
         }
         $col_coltype_id =\DB::table('collection_collection_type')->where([['collection_id', '=', $request->collection], ['collection_type_id','=',$request->collectiontype]])->pluck('id');
         //col_coltype_id
         foreach ($col_coltype_id as $key => $value) {
           $pixel_item->col_coltype_id = $value;
         }
         if(isset($request->featured))
         {
           $pixel_item->featured = 1;
         }
         else {
           $pixel_item->featured = 0;
         }
         $pixel_item->save();
         //pixelcolor
         if(isset($request->color))
         {
            $pixel_item->pixelcolor()->sync($request->color,false);
         }
         //pixeldesign
         if(isset($request->design))
         {
           foreach($request->design as $design)
           {
             $pixel_item->pixeldesign()->sync($request->design,false);
           }
         }
         //images
         if($request->hasFile('image'))
         {
           foreach ($request->file('image') as $key => $image) {
             $pixelimage = new PixelImage;
             $filename = $request->title .'_'.$image->getClientOriginalName();
             $location = public_path('images/collectionitem/pixelimages/'.$filename);
             Image::make($image)->save($location);
             $pixelimage->image =$filename;
             $pixel_item->pixelimage()->save($pixelimage);
           }
         }
         if(isset($request->relations))
         {
             $pixel_item->pixel()->sync($request->relations,false);
             $pixel_item->associatedpixel()->sync($request->relations,false);
         }
         return redirect()->route('admin.pixelitems.show', $pixel_item->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $pixelitem = Pixel::with('pixeldesign')->with('pixelcolor')->with('pixelimage')->with('catalogue')->find($id);
      return view('admin.pixelitems.show')->withPixelitem($pixelitem);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $pixelitem = Pixel::with('pixeldesign')->with('pixelcolor')->with('pixelimage')->with('pixel')->with('catalogue')->find($id);
      $catalogues = Catalogue::pluck('name','id');
      $collection_collection_type = CollectionCollectionType::find($pixelitem->col_coltype_id);
      $pixelitems = Pixel::pluck('title','id');
      $collections = Collection::with('types')->pluck('name','id');
      $collectiontypes = CollectionType::pluck('name','id');
      $pixelcolors = PixelColor::pluck('name','id');
      $pixeldesigns     = PixelDesign::pluck('name','id');
      return view('admin.pixelitems.edit')->withPixelitem($pixelitem)
                                          ->withCollections($collections)
                                          ->withCatalogues($catalogues)
                                          ->withCollectiontypes($collectiontypes)
                                          ->withPixelcolors($pixelcolors)
                                          ->withPixeldesigns($pixeldesigns)
                                          ->withPixelitems($pixelitems)
                                          ->withCollectioncollectiontype($collection_collection_type);

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
              'code_number' => 'required|max:255',
              'title'       => 'required',
              'catalogue_id'=> 'required',
              'slug'  => "required|min:5|max:255|unique:pixels,slug,$id",
              'description'       => 'required'
          ));
         $pixel_item = Pixel::find($id);
         $pixel_item->code_number = $request->code_number;
         $pixel_item->orderby = $request->orderby;
         $pixel_item->catalogue_id = $request->catalogue_id;
         $pixel_item->slug = $request->slug;
         $pixel_item->title = $request->title;
         $pixel_item->description = $request->description;

         if($request->hasFile('featured_image'))
         {
               $image=$request->file('featured_image');
               $filename = $request->title.'-'.$image->getClientOriginalName();
               $location = public_path('images/collectionitem/'.$filename);
               Image::make($image)->save($location);
               $oldFilename = $pixel_item->featured_image;
               $pixel_item->featured_image =$filename;
               //delete old image
               File::delete(public_path('images/collectionitem/'. $oldFilename));
         }

         $col_coltype_id =\DB::table('collection_collection_type')->where([['collection_id', '=', $request->collection], ['collection_type_id','=',$request->collectiontype]])->pluck('id');
         //col_coltype_id
         foreach ($col_coltype_id as $key => $value) {
           $pixel_item->col_coltype_id = $value;
         }
         if(isset($request->featured))
         {
           $pixel_item->featured = 1;
         }
         else {
           $pixel_item->featured = 0;
         }
         $pixel_item->save();
         //pixelcolor
         if(isset($request->color))
         {
            $pixel_item->pixelcolor()->sync($request->color);
         }
         //pixeldesign
         if(isset($request->design))
         {
             $pixel_item->pixeldesign()->sync($request->design);
         }
         //images
         if($request->hasFile('image'))
         {
           foreach ($request->file('image') as $key => $image) {
             $pixelimage = new PixelImage;
             $filename = $request->title .'_'.$image->getClientOriginalName();
             $location = public_path('images/collectionitem/pixelimages/'.$filename);
             Image::make($image)->save($location);
             $pixelimage->image =$filename;
             $pixel_item->pixelimage()->save($pixelimage);
           }
         }
         if(isset($request->relations))
         {
             $pixel_item->pixel()->sync($request->relations);
             $pixel_item->associatedpixel()->sync($request->relations);
         }
         return redirect()->route('admin.pixelitems.show', $pixel_item->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $pixelitem = Pixel::find($id);
      $pixelitem->delete();
      return redirect()->route('admin.pixelitems.index');
    }
    public function indexColor()
    {
      $pixelcolors = PixelColor::paginate(5);
      return view('admin.pixelitems.color')->withPixelcolors($pixelcolors);
    }
    public function createColor()
    {
      return view('admin.pixelitems.create-color');
    }
    public function storeColor(Request $request)
    {
      $color = new PixelColor;
      $color->name = $request->name;
      if($request->hasFile('image'))
      {
        $image    = $request->file('image');
        $filename = $request->name.'_'.time().'.'. $image->getClientOriginalExtension();
        $location = public_path('images/pixel/colors/'. $filename);
        Image::make($image)->resize(400,400)->save($location);
        $color->image = $filename;
      }
      $color->save();
      return redirect()->route('admin.pixelitem.show.color',$color->id);
    }

    public function showColor($id)
    {
      $pixelcolor = PixelColor::find($id);
      return view('admin.pixelitems.show-color')->withPixelcolor($pixelcolor);
    }

    public function editColor($id)
    {
      $pixelcolor = PixelColor::find($id);
      return view('admin.pixelitems.edit-color')->withPixelcolor($pixelcolor);
    }

    public function updateColor(Request $request, $id)
    {
      $this->validate($request, array(
          'name'          => 'required|max:255',
          'image' => 'image',
          ));
      //instantiate
      $pixelcolor = PixelColor::find($id);
      //get the values
      $pixelcolor->name = $request->input('name');
      if ($request->hasFile('image')) {
          //create new image
          $image    = $request->file('image');
          $filename = $request->name.'_'.time().'.'. $image->getClientOriginalExtension();
          $location = public_path('images/pixel/colors/'. $filename);
          Image::make($image)->resize(400,400)->save($location);
          //store in database
          $oldFilename = $pixelcolor->image;
          $pixelcolor->image = $filename;
          //delete old image
          File::delete(public_path('images/posts/'. $oldFilename));
      }
      //save
      $pixelcolor->save();
      //redirect
      return redirect()->route('admin.pixelitem.show.color',$pixelcolor->id);
    }

    public function destroyColor($id)
    {
      $pixelcolor = PixelColor::find($id);
      $pixelcolor->delete();
      return redirect()->route('admin.pixelitem.index.color');
    }

    public function indexDesign()
    {
      $designs = PixelDesign::paginate(5);
      return view('admin.pixelitems.design')->withDesigns($designs);
    }

    public function createDesign()
    {
      return view('admin.pixelitems.create-design');
    }

    public function storeDesign(Request $request)
    {
      $design = new PixelDesign;
      $design->name = $request->name;
      $design->save();
      return redirect()->route('admin.pixelitem.show.design',$design->id);
    }

    public function showDesign($id)
    {
      $design = PixelDesign::find($id);
      return view('admin.pixelitems.show-design')->withDesign($design);
    }

    public function editDesign($id)
    {
      $design = PixelDesign::find($id);
      return view('admin.pixelitems.edit-design')->withDesign($design);
    }

    public function updateDesign(Request $request, $id)
    {
      $this->validate($request, array(
          'name'          => 'required|max:255',
          ));
      //instantiate
      $design = PixelDesign::find($id);
      //get the values
      $design->name = $request->input('name');
      //save
      $design->save();
      //redirect
      return redirect()->route('admin.pixelitem.show.design',$design->id);
    }

    public function destroyDesign($id)
    {
      $design = PixelDesign::find($id);
      $design->delete();
      return redirect()->route('admin.pixelitem.index.design');
    }

}
