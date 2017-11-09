<?php
namespace Mec\Http\Controllers;
use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Http\Request;


class SiteMapController extends Controller
{
    public function __invoke()
    {
		SitemapGenerator::create('http://mecartworks.com')->writeToFile("Sitemap.xml");
		return redirect('Sitemap.xml');
	}
}
?>
