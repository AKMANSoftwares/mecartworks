<?php

namespace Mec\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Mec\Models\Collection;
use Mec\Models\CollectionCollectionType;
use Mec\Models\CollectionType;
use File;
class CollectionsController extends Controller
{
    public function getCollection()
    {
        $collections = Collection::all();
        return view('collections.collection')->withCollections($collections);
    }
}
