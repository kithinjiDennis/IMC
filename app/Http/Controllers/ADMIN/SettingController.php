<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use App\Page;
use App\Menu;
use App\MenuType;
use App\SubMenu;
use App\Topmenu;
use App\Middlemenu;
use App\Mainmenu;
use Config;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Lcobucci\JWT\Parser;
use Mail;
use Response;
use App\Http\Traits\CommonTrait;
use App\Http\Traits\UserTrait;
use Session;
use App\Helpers;
use DB;
use App\BottomFooter;
use App\Footermenu;
use App\Follow;
use App\Contact;
use App\Setting;
use App\Section;

use Illuminate\Validation\Validator;
class SettingController extends Controller
{
    use CommonTrait, UserTrait;



    /* menus listing will get through this function */
    public function follow_list(Request $request)
    {

        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        session(['sort_by' => 'asc']);

        $menus = Follow::select('id','main_title_en','main_title_ar','description_en','description_ar');
        $menus = $menus->orderBy('id','ASC');
        $menus = $menus->paginate($per_page);
        $helper = new Helpers();
               // append recordvalue params
         if(isset($request->recordvalue)) {
            $menus = $menus->appends(['recordvalue' => $request->recordvalue]);
            session(['recordvalue' => $request->recordvalue]);
        } else {
            session()->forget('recordvalue');
        }
        if(isset($request->id)) {
            $editmenu = Follow::where('id', $request->id)->first();
             $pageid=[];
        }else{
            $editmenu = [];
            $pageid=[];
        }
         $allpages=Page::get();

        return view('settings.list', compact('menus','editmenu','allpages','pageid'));

    }

    // save and update menu and its details from this function
    public function follow_create(Request $request)
    {
      $helper = new Helpers();
    $input = $request->all();
    $request['main_title_en'] = trim($request['main_title_en']);
    $request['main_title_ar'] = trim($request['main_title_ar']);
    $request['description_en'] = trim($request['description_en']);
    $request['description_ar'] = trim($request['description_ar']);

    $this->validate($request,[
           'main_title_en' =>'required|regex:/^[\pL\s\-]+$/u|min:3|max:50',
           'main_title_ar' =>'required|regex:/^[\pL\s\-]+$/u|min:3|max:50',
            'description_en' => 'required|min:3|max:500',
            'description_ar' => 'required|min:3|max:500',
        ],[
           'main_title_en.required' => 'Please enter the title',
           'main_title_ar.required' => 'Please enter the title',
           'description_en.required' => 'Please enter the description',
           'description_ar.required' => 'Please enter the description'
       ]);
        $array = [
            'main_title_en' => $request->get('main_title_en'),
            'main_title_ar' => $request->get('main_title_ar'),
            'description_en' => $request->get('description_en'),
            'description_ar' => $request->get('description_ar'),
            'created_at' => date('Y-m-d H:i:s',time()),
            'updated_at' => date('Y-m-d H:i:s',time())
        ];

        if(isset($request->id)) {
              $result = Follow::where('id', $request->id)->update($array);
              if($result) {
                  Session::flash('message', 'Follow us updated successfully');
                  Session::flash('alert-class', 'alert-success');
              } else {
                  Session::flash('message', 'Unable to update Follow us!');
                  Session::flash('alert-class', 'alert-danger');
              }
          }
            return redirect('follow/list/1');

    }

// ============== CONTACT US =============


    /* menus listing will get through this function */
    public function contact_list(Request $request)
    {

        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        session(['sort_by' => 'asc']);

        $menus = Contact::select('id','main_title_en','main_title_ar','phone','email','address','time');
        $menus = $menus->orderBy('id','ASC');
        $menus = $menus->paginate($per_page);
        $helper = new Helpers();
               // append recordvalue params
         if(isset($request->recordvalue)) {
            $menus = $menus->appends(['recordvalue' => $request->recordvalue]);
            session(['recordvalue' => $request->recordvalue]);
        } else {
            session()->forget('recordvalue');
        }
        if(isset($request->id)) {
            $editmenu = Contact::where('id', $request->id)->first();
             $pageid=[];
        }else{
            $editmenu = [];
            $pageid=[];
        }
          $allpages=Page::get();
         return view('settings.contactlist', compact('menus','editmenu','allpages','pageid'));

    }

    // save and update menu and its details from this function
    public function contact_create(Request $request)
    {
        $helper = new Helpers();
        $input = $request->all();
        $request['main_title_en'] = trim($request['main_title_en']);
        $request['main_title_ar'] = trim($request['main_title_ar']);
        $request['phone'] = trim($request['phone']);
        $request['address'] = trim($request['address']);
        $request['time'] = trim($request['time']);

        $data=  $this->validate($request,[
            'main_title_en' =>'required|regex:/^[\pL\s\-]+$/u|min:3|max:50',
            'main_title_ar' =>'required|regex:/^[\pL\s\-]+$/u|min:3|max:50',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:3|max:15',
            'email' => 'required|email|max:100',
            'address' => 'required|min:3|max:100',
            'time' => 'required|min:3|max:100',

        ],[
           'main_title_en.required' => 'Please enter the title',
           'main_title_ar.required' => 'Please enter the title',
           'phone.required' => 'Please enter the Phone',
           'email.required' => 'Please enter the email',
           'address.required' => 'Please enter the address',
           'time.required' => 'Please enter the time',
       ]);

        $array = [
            'main_title_en' => $request->get('main_title_en'),
            'main_title_ar' => $request->get('main_title_ar'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'time' => $request->get('time'),
            'created_at' => date('Y-m-d H:i:s',time()),
            'updated_at' => date('Y-m-d H:i:s',time())
        ];

        if(!empty($request->id)) {
              $result = Contact::where('id',$request->id)->update($array);
              if($result) {
                  Session::flash('message', 'Contact us updated successfully');
                  Session::flash('alert-class', 'alert-success');
              } else {
                  Session::flash('message', 'Unable to update contact us!');
                  Session::flash('alert-class', 'alert-danger');
              }
          }
            return redirect('contact/list/1');

    }

// ================= Logo SEttings =====================


    /* menus listing will get through this function */
    public function logo_list(Request $request)
    {

        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        session(['sort_by' => 'asc']);
        $menus = Setting::select('id','icon');
        $menus = $menus->orderBy('id','ASC');
        $menus = $menus->paginate($per_page);
        $helper = new Helpers();
               // append recordvalue params
         if(isset($request->recordvalue)) {
            $menus = $menus->appends(['recordvalue' => $request->recordvalue]);
            session(['recordvalue' => $request->recordvalue]);
        } else {
            session()->forget('recordvalue');
        }
        if(isset($request->id)) {
            $editmenu = Setting::where('id', $request->id)->first();
             $pageid=[];
        }else{
            $editmenu = [];
            $pageid=[];
        }
         $allpages=Page::get();
        return view('settings.settinglogo', compact('menus','editmenu','allpages','pageid'));
    }

    // save and update menu and its details from this function
    public function logoupdate(Request $request)
    {
      $helper = new Helpers();

      $data=  $this->validate($request,[
         'icon' => 'required|mimes:jpeg,jpg,png,gif|max:10000' //
      ],[
         'icon.required' => 'Please upload the logo',
     ]);
        $array = [
            'created_at' => date('Y-m-d H:i:s',time()),
            'updated_at' => date('Y-m-d H:i:s',time())
        ];

             if($request->hasFile('icon')){
                   $file=$request->file('icon');
                   $extenstion=  $file->getMimeType();
                   $RealName=$file->getClientOriginalName();
                   $trimmeds = str_replace(' ','_' ,$file->getClientOriginalName());
                   $trimmed = str_replace('/','_' ,$trimmeds);
                  $image= 'logo.'.$file->getClientOriginalExtension();
                  $file->move('images/',$image); // move to the desired folder
                  $array['icon'] = $image;
              }

        if(isset($request->id)) {
              $result = Setting::where('id', $request->id)->update($array);
              if($result) {
                  Session::flash('message', 'Follow us updated successfully');
                  Session::flash('alert-class', 'alert-success');
              } else {
                  Session::flash('message', 'Unable to update Follow us!');
                  Session::flash('alert-class', 'alert-danger');
              }
          }
            return redirect('settings/logo/1');
    }



        //      SECTIONS ENABLE OR DISABLE

        public function section_list(Request $request)
        {

          $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record')); //Config::get('variable.page_per_record');
          session(['sort_by' => 'asc']); // set default sorting
          $pages = Section::select('id','name','is_enable');
          $pages = $pages->orderBy('id', 'asc');
          $pages = $pages->paginate($per_page);

           if(isset($request->recordvalue)) {
              $pages = $pages->appends(['recordvalue' => $request->recordvalue]);
              session(['recordvalue' => $request->recordvalue]);
          } else {
              session()->forget('recordvalue');
          }
          return view('settings.sectionlist', compact('pages'));

      }


          public function disablemultiple(Request $request) {
              $result = Section::whereIn('id',$request->ids)->update(['is_enable'=>'0']);
              if($result) {
      			$message 		= "Section(s) disabled successfully";
                  $returnStatus 	= 1;

              } else {
      			$message 		= "Unable to disabled Section(s)";
      			$returnStatus 	= 0;
              }
              return json_encode(array('status' => $returnStatus, 'message' => $message));
          }

          public function updatemultiple(Request $request) {
              $result = Section::whereIn('id',$request->ids)->update(['is_enable'=>'1']);
              if($result) {
      			$message 		= "Section(s) enabled successfully";
                  $returnStatus 	= 1;

              } else {
      			$message 		= "Unable to enabled Section(s)";
      			$returnStatus 	= 0;
              }
              return json_encode(array('status' => $returnStatus, 'message' => $message));
          }


          /* delete single page from this function */
          public function updatesingle(Request $request)
          {
              $page = \App\Section::find($request->id);
              $result = $page->update('is_enable',$request->status);
              if($result) {
      			$message 		= "Section deleted successfully";
                  $returnStatus 	= 1;

              } else {
      		    	$message 		= "Unable to delete this Section";
      		    	$returnStatus 	= 0;
              }
              return json_encode(array('status' => $returnStatus, 'message' => $message));
          }

    // ============== CONTACT US =============


}
