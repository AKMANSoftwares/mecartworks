<?php

namespace Mec\Http\Controllers;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Mec\Models\Catalogue;
use Newsletter;


class ShowCataloguesController extends Controller
{
//    /**
//     * Display a listing of the resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function index()
//    {
//        //
//    }

    public function __invoke()
    {
        $catalogues=Catalogue::orderBy('priority_order','asc')->simplepaginate(9);

        return view('showCatalogues.index')->withCatalogues($catalogues);
    }

    public function setCookies(Request $request)
    {
        Newsletter::subscribeOrUpdate($request->email, ['FNAME'=>$request->firstName,'LNAME'=>$request->lastName,'PROFESSION'=>$request->profession]);

        return response()->json()->withCookie(Cookie::make('signUpCatlogueFormCookie', 'true'));
    }
    public function getCookies()
    {
        $signUpCatlogueFormCookie = Cookie::get('signUpCatlogueFormCookie');

        return response()->json(
            [
                'signUpCatlogueFormCookie'=>$signUpCatlogueFormCookie,
            ]);

    }

}
