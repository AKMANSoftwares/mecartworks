<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function ()
{
    return view('welcome');
});
Auth::routes();
Route::post('search', 'SearchController@search')->name('search');
Route::get('contact', 'ContactController@getcontact');
Route::post('contact', 'ContactController@postMessage');
Route::post('contact/uploadFiles', 'ContactController@uploadFiles');
Route::post('welcome/contact/stayconnected', 'ContactController@subscribeUserToMailList');
Route::get('contact/getpricequote/{collectionitemid}', 'ContactController@getPriceQuote');
Route::get('contact/getpricequote/pixelimage/{pixelimageid}', 'ContactController@getPriceQuoteForPixelImage');
Route::get('contact/newcustomproject', 'ContactController@newCustomProject');
Route::get('our-story', 'ShowExploreUsController@index');
Route::get('our-story/our-story', 'ShowExploreUsController@ourStory');
Route::get('catalogues', 'ShowCataloguesController');
Route::get('pixl/introduction', 'PixlMosaicController@introduction');
Route::get('pixl/journey', 'PixlMosaicController@journey');
Route::get('custom-design-process', 'ShowCustomDesignProcessController');
Route::post('catalogues/setcookies', 'ShowCataloguesController@setCookies');
Route::get('catalogues/getcookies', 'ShowCataloguesController@getcookies');
Route::get('/sitemap', 'SiteMapController');
//MEC Collections
Route::get('/collections/collection', 'CollectionsController@getCollection');
///Careers
Route::resource('admin/careers', 'CareerController');
///////
///careers user views
Route::get('/careers', 'CareersController@index');
Route::get('/careers/{slug}', 'CareersController@showDescription');
//////
//MEC COllectionTypes
Route::get('/{slug}/collectiontypes', 'CollectionTypesController@getCollectiontype')->name('collectiontypes.show');
//MEC PixelItems
Route::get('/pixl/{collection_slug}/{collection_type_slug}', 'PixelController@showPixelitems');
Route::get('/pixl/{slug}', 'PixelController@showSinglePixelItem');
Route::resource('pixelitem', 'PixelController', ['except' => ['create', 'show', 'store', 'edit', 'update', 'destroy']]);
//MEC CollectionItems
Route::get('{collectionslug}/{collectiontypeslug}/collectionitems', ['as' => 'collectionitems.collection-items', 'uses' => 'CollectionItemsController@getCollectionitems']);
Route::get('{collectionslug}/{collectiontypeslug}/collectionitems/{collectionitemslug}', 'CollectionItemsController@getCollectionItem')->name('collectionitems.collection-item');
//MEC Material -> filtering based on size and color
Route::post('materials/color', 'MaterialsController@color');
Route::resource('materials', 'MaterialsController');
Route::post('admin/material/materialcolor', 'MaterialAdminController@color');
Route::post('admin/material/updatecolor/', 'MaterialAdminController@updateColor');
Route::get('admin/material/viewmaterial/{materialid}', 'MaterialAdminController@viewMaterial');
Route::resource('admin/material', 'MaterialAdminController');
//MEC Diary
Route::get('/diary/{slug}', ['as' => 'diary.single', 'uses' => 'DiaryController@getSingle']);
Route::get('/diary', 'DiaryController@getIndex');
//catalogue
Route::resource('admin/catalogue', 'CatalogueController');
//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin'], function ()
{
    Route::resource('posts', 'PostController');
    Route::resource('/collection', 'CollectionController');
    Route::resource('/collectiontype', 'CollectionTypeController');
    Route::resource('/collectionitem', 'CollectionItemController');
    //pixelitem
    Route::resource('pixelitems', 'PixelAdminController', ['names' => ['index' => 'admin.pixelitems.index', 'store' => 'admin.pixelitems.store', 'create' => 'admin.pixelitems.create', 'destroy' => 'admin.pixelitems.destroy', 'update' => 'admin.pixelitems.update', 'show' => 'admin.pixelitems.show', 'edit' => 'admin.pixelitems.edit', ], ]);
    //pixelcolor
    Route::post('/pixelitem/store/color', 'PixelAdminController@storeColor')->name('admin.pixelitem.store.color');
    Route::get('/pixelitem/create/color', 'PixelAdminController@createColor')->name('admin.pixelitem.create.color');
    Route::get('/pixelitem/show/color/{pixelcolor}', 'PixelAdminController@showColor')->name('admin.pixelitem.show.color');
    Route::get('/pixelitem/color/{pixelcolor}/edit', 'PixelAdminController@editColor')->name('admin.pixelitem.edit.color');
    Route::put('/pixelitem/update/color/{pixelcolor}', 'PixelAdminController@updateColor')->name('admin.pixelitem.update.color');
    Route::delete('/pixelitem/delete/color/{pixelcolor}', 'PixelAdminController@destroyColor')->name('admin.pixelitem.destroy.color');
    Route::get('/pixelitem/color', 'PixelAdminController@indexColor')->name('admin.pixelitem.index.color');
    //pixeldesign
    Route::post('/pixelitem/store/design', 'PixelAdminController@storeDesign')->name('admin.pixelitem.store.design');
    Route::get('/pixelitem/create/design', 'PixelAdminController@createDesign')->name('admin.pixelitem.create.design');
    Route::get('/pixelitem/show/design/{pixeldesign}', 'PixelAdminController@showDesign')->name('admin.pixelitem.show.design');
    Route::get('/pixelitem/design/{pixeldesign}/edit', 'PixelAdminController@editDesign')->name('admin.pixelitem.edit.design');
    Route::put('/pixelitem/update/design/{pixeldesign}', 'PixelAdminController@updateDesign')->name('admin.pixelitem.update.design');
    Route::delete('/pixelitem/delete/design/{pixeldesign}', 'PixelAdminController@destroyDesign')->name('admin.pixelitem.destroy.design');
    Route::get('/pixelitem/design', 'PixelAdminController@indexDesign')->name('admin.pixelitem.index.design');
    //Material Color
    Route::resource('material-color', 'MaterialColorController');
    //Material size
    Route::resource('material-size', 'MaterialSizeController');
    //Dashboard
    Route::get('dashboard', 'AdminController@getDashboard')->name('admin.dashboard');
});
