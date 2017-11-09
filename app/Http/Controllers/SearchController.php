<?php

namespace Mec\Http\Controllers;

use Illuminate\Http\Request;
use Mec\Models\Catalogue;
use Mec\Models\CollectionType;
use Mec\Models\Material;
use Mec\Models\Post;
class SearchController extends Controller
{
    public function search(Request $request)
    {
      $catalogues      = Catalogue::where('name','LIKE','%'.$request->search.'%')->get();
      $collectiontypes = CollectionType::where('name','LIKE','%'.$request->search.'%')->with('collections')->get();
      $materials       = Material::where('name','LIKE','%'.$request->search.'%')->get();
      $diaries         = Post::where('title','LIKE','%'.$request->search.'%')->get();
      return view('/search/results')->withCatalogues($catalogues)
                                                ->withCollectiontypes($collectiontypes)
                                                ->withMaterials($materials)
                                                ->withDiaries($diaries);

    }
}
