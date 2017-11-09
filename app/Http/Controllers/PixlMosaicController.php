<?php

namespace Mec\Http\Controllers;
use Request;
use Mec\Models\Pixel;

class PixlMosaicController extends Controller
{
    public function introduction()
    {
        $featured = Pixel::where('featured','=',true)->get();
        return view('pixl.pixlIntroduction')->withFeatured($featured);
    }

    public function journey()
    {
        $featured = Pixel::where('featured','=',true)->get();
        return view('pixl.pixlJourney')->withFeatured($featured);
    }
}
