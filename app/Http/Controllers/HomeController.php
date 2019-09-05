<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\MenuType;
use App\Page;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    /* common function to get header footer values */

    public function getHeaderFooter() {

        $getHeaderMenus = Menu:: select('id', 'name_en', 'name_ar', 'menu_type_id', 'page_id', 'order')
        ->with(['getSubMenu' => function($q) {
            $q->select('id', 'menu_id', 'name_en', 'name_ar', 'page_id');
        }, 'getSubMenu.getPage'  => function($q) {
            $q->select('id', 'name_en', 'name_ar', 'slug');
        }, 'getPage'  => function($q) {
            $q->select('id', 'name_en', 'name_ar', 'slug');
        }])->where('menu_type_id', MenuType::where('name', 'header')->first()->id)->get();

        $getFooterMenus = Menu:: select('id', 'name_en', 'name_ar', 'menu_type_id', 'page_id', 'order')
        ->with(['getSubMenu' => function($q) {
            $q->select('id', 'menu_id', 'name_en', 'name_ar', 'page_id');
        }, 'getSubMenu.getPage'  => function($q) {
            $q->select('id', 'name_en', 'name_ar', 'slug');
        }, 'getPage'  => function($q) {
            $q->select('id', 'name_en', 'name_ar', 'slug');
        }])->where('menu_type_id', MenuType::where('name', 'footer')->first()->id)->get();

        $data['header'] = $getHeaderMenus;
        $data['footer'] = $getFooterMenus;

        return $data;

    }

    public function index($lang = null)
    {

        $getHeaderFooter = $this->getHeaderFooter();
        $getHeaderMenus =  $getHeaderFooter['header'];
        $getFooterMenus = $getHeaderFooter['footer'];

        $lang = $lang;
        //  i have commente dthsi because its redirection to home page return view('home', compact('getHeaderMenus', 'getFooterMenus', 'lang'));
        return redirect('/login');
    }

    /*get page details using slug*/
    public function pages($slug, $lang = null) {

        $getPageDetail = Page::where('slug', $slug)->first();

        $getHeaderFooter = $this->getHeaderFooter();
        $getHeaderMenus =  $getHeaderFooter['header'];
        $getFooterMenus = $getHeaderFooter['footer'];

        if($lang == 'ar') {

            $meta_tags['meta_title'] = $getPageDetail['meta_title_ar'];
            $meta_tags['meta_desc'] = $getPageDetail['meta_desc_ar'];
            $meta_tags['meta_keywords'] = $getPageDetail['meta_keyword_ar'];

        } else {

            $meta_tags['meta_title'] = $getPageDetail['meta_title_en'];
            $meta_tags['meta_desc'] = $getPageDetail['meta_desc_en'];
            $meta_tags['meta_keywords'] = $getPageDetail['meta_keyword_en'];

        }

        $lang = $lang;
        return view('page', compact('getHeaderMenus', 'getFooterMenus', 'lang', 'getPageDetail', 'meta_tags'));
    }
}
