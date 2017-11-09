<?php

namespace Mec\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Mec\Models\Collection;
use Mec\Models\CollectionType;
use File;
class CollectionTypesController extends Controller
{
  public function getCollectiontype($slug)
  {
      if (isset($slug) && $slug != '') {
          $collections = Collection::where('slug', '=', $slug)
              ->with('types')->get();
          return view('collectiontype/collection-type')->withCollections($collections);
      }
  }
}
