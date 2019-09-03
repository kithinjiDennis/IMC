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
use App\Helpers;

use App\HealthTip;
use App\News;
class NewsController extends Controller implements PageInterface
{
    use CommonTrait, UserTrait;

    /*
    This controller includes page create, store, listing, editPage,
    deleteMultiplePages, deleteSinglePage  functions

    */


    /*this function will redirect to create page section*/

    public function create()
    {
      $templates = News::get();


      return view('news.create', compact('templates'));

    }

   // save page and its details from this function
    public function store(Request $request)
    {

      $helper = new Helpers();
        $this->validate($request,[
            'title_en' => 'required|regex:/^[a-zA-Z]+$/u|max:50',
            'title_ar' => 'required|regex:/^[a-zA-Z]+$/u|max:50',
            'description_en' => 'required|max:500',
            'description_ar' => 'required|max:500',
            'icon' => 'required|mimes:jpeg,jpg,png,gif|max:10000' //
        ],[
            'title_en.required' => 'Please enter title',
            'title_ar.required' => 'Please enter title',
            'description_en.required' => 'Please enter description',
            'description_ar.required' => 'Please enter description',
            'icon.required' => 'Please upload the icon',
        ]);


        $array = [
            'title_en' => $request->get('title_en'),
            'title_ar' => $request->get('title_ar'),
            'description_en' => $request->get('description_en'),
            'description_ar' => $request->get('description_ar'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];




        if(isset($request->id)) {
              $existingdata = News::where('id',$request->id)->first();
              if($request->hasFile('icon')) {
                 $oldimage = !empty($existingdata['icon'])?$existingdata['icon']:'none';
                 $image= $helper->upload_image($request->file('icon'),'images/news/',$oldimage);
                 $array['icon'] = $image;
              }
            $result = News::where('id', $request->id)->update($array);
            if($result) {
                Session::flash('message', 'News updated successfully');
                Session::flash('alert-class', 'alert-success');
            } else {
                Session::flash('message', 'Unable to update News!');
                Session::flash('alert-class', 'alert-danger');
            }
        } else {
          if($request->hasFile('icon')) {
             $image= $helper->upload_image($request->file('icon'),'images/news/','none');
             $array['icon'] = $image;
          }
            $result =  News::create($array);
            if($result) {
                Session::flash('message', 'News added successfully');
                Session::flash('alert-class', 'alert-success');
            } else {
                Session::flash('message', 'Unable to add News!');
                Session::flash('alert-class', 'alert-danger');
            }
        }
        return redirect('news/listing');

    }

    /* Pages listing will get through this function */
    public function listing(Request $request)
    {

        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record')); //Config::get('variable.page_per_record');
        session(['sort_by' => 'asc']); // set default sorting
        $pages = News::select('id','title_en','icon','description_en','title_ar','description_ar','created_at');
        if(isset($request->q)) { // search by name
            $pages = $pages->where(function($query) use($request) {
               $query->where('title_en','LIKE','%'.$request->q."%");
            });
        }

        if(isset($request->sort_by)) {

            if($request->key == 'title') { // sort by name
                $pages = $pages->orderBy('title_en', $request->sort_by);
            }

            if($request->key == 'date') { // sort by date
                $pages = $pages->orderBy('created_at', $request->sort_by);
            }

            if($request->key == 'description') { // sort by status
                $pages = $pages->orderBy('description_en', $request->sort_by);
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
        return view('news.view', compact('pages'));

    }


    /*go to edit page from this function*/
    public function editPage($id) {
      $helper = new Helpers();
        $page = News::where('id', $id)->first();
        $templates = News::get();
        if(isset($id)) {
            $editmenu = News::where('id', $id)->first();
            if(!empty($editmenu)){
                $editmenu->icon = !empty($editmenu->icon)?($helper->publicpath()."/images/news/".$editmenu->icon):"";
            }
        }else{
            $editmenu = [];
        }
        return view('news.create', compact('page', 'templates','editmenu'));
    }

    /*delete multiple pages*/

    public function deleteMultiplePages(Request $request) {

        $result = News::whereIn('id', $request->ids)->delete();

        if($result) {
			$message 		= "New(s) deleted successfully";
            $returnStatus 	= 1;

        } else {
			$message 		= "Unable to delete New(s)";
			$returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));
    }


    /* delete single page from this function */
    public function deleteSinglePage(Request $request)
    {
        $page = \App\News::find($request->id);
        $result = $page->delete();

        if($result) {
			$message 		= "News deleted successfully";
            $returnStatus 	= 1;

        } else {
			$message 		= "Unable to delete this New";
			$returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));
    }

}
