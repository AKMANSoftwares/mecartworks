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

class CollectionItemsController extends Controller
{

    public function getCollectionitems($collectionslug, $collectiontypeslug)
    {
        $collectionid = Collection::where('slug', '=', $collectionslug)->pluck('id');
        $collectiontypeid = CollectionType::where('slug', '=', $collectiontypeslug)->pluck('id');
        $collections = Collection::find($collectionid);
        $collectiontypes = CollectionType::find($collectiontypeid);
        $col_coltype_id = CollectionCollectionType::where('collection_id', '=', $collectionid)->where('collection_type_id', '=', $collectiontypeid)->pluck('id');
        $collectionitems = CollectionItem::where('col_coltype_id', '=', $col_coltype_id)->orderBy('priority_order', 'asc')->simplepaginate(15);
        return view('collectionitem.collection-items')->withCollectionslug($collectionslug)->withCollectiontypeslug($collectiontypeslug)->withCollectionitems($collectionitems)->withCollections($collections)->withCollectiontypes($collectiontypes);
    }

    public function getCollectionItem($collectionSlug, $collectionTypeSlug, $collectionItemSlug)
    {
        $collection = Collection::where('slug', '=', $collectionSlug)->get()->first();
        $collectionType = CollectionType::where('slug', '=', $collectionTypeSlug)->get()->first();
        $collectionItem = CollectionItem::where('slug', '=',$collectionItemSlug)->get()->first();
        $totalCollectionItems = CollectionItem::where('col_coltype_id', '=', $collectionItem->col_coltype_id)->orderBy('priority_order', 'asc')->get();
        $totalCollectionItemsCount = count($totalCollectionItems);

        foreach ($totalCollectionItems as $key => $totalCollectionItem)
        {

            if ($collectionItem->id == $totalCollectionItem->id)
            {

                if ($key == 0)
                {
                    $collectionItemRowNumber = $totalCollectionItemsCount - ($key+1);
                    $collectionItemRowNumber = $totalCollectionItemsCount - $collectionItemRowNumber;
                    $previousItem = $key - 1;
                    $nextItem = $key + 1;

                    if (!($previousItem <= 0))
                    {
                        $previousItem = $totalCollectionItems[$previousItem];
                    }
                    else
                    {
                        $previousItem = false;
                    }

                    if (!($nextItem >= $totalCollectionItemsCount))
                    {
                        $nextItem = $totalCollectionItems[$nextItem];
                    }
                    else
                    {
                        $nextItem = false;
                    }
                }
                else
                {
                    $collectionItemRowNumber = $totalCollectionItemsCount - $key;
                    $collectionItemRowNumber = $totalCollectionItemsCount - $collectionItemRowNumber;

                    $previousItem = $collectionItemRowNumber - 1;
                    $nextItem = $collectionItemRowNumber + 1;

                    if (!($previousItem < 0))
                    {
                        $previousItem = $totalCollectionItems[$previousItem];
                    }
                    else
                    {
                        $previousItem = false;
                    }

                    if (!($nextItem >= $totalCollectionItemsCount))
                    {
                        $nextItem = $totalCollectionItems[$nextItem];
                    }
                    else
                    {
                        $nextItem = false;
                    }
                    ++$collectionItemRowNumber;
                }
            }
        }
        return view('collectionitem.collection-item')->withCollection($collection)
                                                     ->withCollectiontype($collectionType)
                                                     ->withCollectionitem($collectionItem)
                                                     ->withPreviousitem($previousItem)
                                                     ->withNextitem($nextItem)
                                                     ->withCollectionslug($collectionSlug)
                                                     ->withCollectiontypeslug($collectionTypeSlug)
                                                     ->withTotalcollectionitemscount($totalCollectionItemsCount)
                                                     ->withCollectionitemrownumber($collectionItemRowNumber);
    }
}
