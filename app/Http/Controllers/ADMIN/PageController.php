<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use App\Page;
use App\Template;
use Config;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Lcobucci\JWT\Parser;
use Mail;
use Response;
use App\Interfaces\PageInterface;
use App\Http\Traits\CommonTrait;
use App\Http\Traits\UserTrait;
use Session;

class PageController extends Controller implements PageInterface
{
    use CommonTrait, UserTrait;

    /*
    This controller includes page create, store, listing, editPage, 
    deleteMultiplePages, deleteSinglePage  functions
    
    */


    /*this function will redirect to create page section*/

    public function create()
    {
      $templates = Template::get(); 
      return view('pages.create', compact('templates'));

    }

   // save page and its details from this function
    public function store(Request $request)

    {       

        $this->validate($request,[
            'name_en' => 'required|max:50',
            'name_ar' => 'required|max:50',
        ],[
            'name_en.required' => 'Please enter name',
            'name_ar.required' => 'Please enter name'
        ]);

       
        $array = [
            'name_en' => $request->get('name_en'),
            'name_ar' => $request->get('name_ar'),

            'meta_title_en' => $request->get('meta_title_en'),
            'meta_title_ar' => $request->get('meta_title_ar'),

            'meta_desc_en' => $request->get('meta_desc_en'),
            'meta_desc_ar' => $request->get('meta_desc_ar'),

            'meta_keyword_en' => $request->get('meta_keyword_en'),
            'meta_keyword_ar' => $request->get('meta_keyword_ar'),

            'slug' => str_slug($request->get('name_en'), '-'),

            'content_en' => $request->get('content_en'),
            'content_ar' => $request->get('content_ar'),

            'created_at' => time(),
            'updated_at' => time(),

        ];


        if(isset($request->id)) {

            $result = Page::where('id', $request->id)->update($array);
            
            if($result) {
                Session::flash('message', 'Page updated successfully'); 
                Session::flash('alert-class', 'alert-success'); 
            } else {
                Session::flash('message', 'Unable to update page!'); 
                Session::flash('alert-class', 'alert-danger'); 
            }

        } else {

            $result =  Page::create($array);

            if($result) {
                Session::flash('message', 'Page added successfully'); 
                Session::flash('alert-class', 'alert-success'); 
            } else {
                Session::flash('message', 'Unable to add page!'); 
                Session::flash('alert-class', 'alert-danger'); 
            }
        }

        return redirect('pages/listing');

    }

    /* Pages listing will get through this function */
    public function listing(Request $request)
    {         
        
        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record')); //Config::get('variable.page_per_record');
        session(['sort_by' => 'asc']); // set default sorting
        $pages = Page::select('id', 'name_en', 'name_ar', 'meta_title_en', 'meta_title_ar', 'meta_desc_en', 'meta_desc_ar', 'meta_keyword_en' ,'meta_keyword_ar', 'slug', 
        'content_en', 'content_ar', 'status', 'created_at');
        
        if(isset($request->q)) { // search by name

            $pages = $pages->where(function($query) use($request) {
               $query->where('name_en','LIKE','%'.$request->q."%");
            });            
        }

        if(isset($request->sort_by)) {

            if($request->key == 'name') { // sort by name
                $pages = $pages->orderBy('name_en', $request->sort_by); 
            }

            if($request->key == 'metadesc') { // sort by metadesc
                $pages = $pages->orderBy('meta_desc_en', $request->sort_by); 
            }

            if($request->key == 'date') { // sort by date
                $pages = $pages->orderBy('created_at', $request->sort_by); 
            }

            if($request->key == 'status') { // sort by status
                $pages = $pages->orderBy('status', $request->sort_by); 
            }

        } else {
            $pages = $pages->orderBy('id', 'desc');
            
        }
        
        $pages = $pages->paginate($per_page);


        // append search params
        if(isset($request->q)) {
           $pages = $pages->appends(['q' => $request->q]);  /*keywords will append to url using append*/
           session(['q' => $request->q]);
        } else {
           session()->forget('q');
        }       

        // append sort_by params
        if(isset($request->sort_by)) {
            $pages = $pages->appends(['key' => $request->key, 'sort_by' => $request->sort_by]);
            session(['key' => $request->key, 'sort_by' =>( $request->sort_by == 'asc') ? 'desc' : 'asc']);
        } 

         // append recordvalue params
         if(isset($request->recordvalue)) {
            $pages = $pages->appends(['recordvalue' => $request->recordvalue]);
            session(['recordvalue' => $request->recordvalue]);
        } else {
            session()->forget('recordvalue');
        }

        return view('pages.view', compact('pages'));

    }


    /*go to edit page from this function*/
    public function editPage($id) {

        $page = Page::select('id', 'name_en', 'name_ar', 'meta_title_en', 'meta_title_ar', 'meta_desc_en', 'meta_desc_ar', 'meta_keyword_en' ,'meta_keyword_ar', 'slug', 
        'content_en', 'content_ar', 'status', 'created_at')->where('id', $id)->first();

        $templates = Template::get(); 
        return view('pages.create', compact('page', 'templates'));
    }
    
    /*delete multiple pages*/

    public function deleteMultiplePages(Request $request) {
		
        $result = Page::whereIn('id', $request->ids)->delete();
        
        if($result) {
			$message 		= "Page(s) deleted successfully";
            $returnStatus 	= 1;
            
        } else {
			$message 		= "Unable to delete page(s)";
			$returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message)); 
    }
    
    
    /* delete single page from this function */
    public function deleteSinglePage(Request $request)
    {
        $page = \App\Page::find($request->id);
        $result = $page->delete();
        
        if($result) {
			$message 		= "Page deleted successfully";
            $returnStatus 	= 1;
            
        } else {
			$message 		= "Unable to delete this page";
			$returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));        
    }
    
}
