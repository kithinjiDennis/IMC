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
class ComponentController extends Controller
{
    use CommonTrait, UserTrait;

    /* menus listing will get through this function */
    public function topmenu_list(Request $request)
    {         
        
        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        session(['sort_by' => 'asc']); // set default sorting
        $menus = Topmenu::select('topmenus.id', 'topmenus.title_en', 'topmenus.title_ar','topmenus.icon','topmenus.type','topmenus.link','topmenus.page_id','topmenus.order','pages.slug');
        if(isset($request->q)) { // search by name
            $menus = $menus->where(function($query) use($request) {
               $query->where('topmenus.title_en','LIKE','%'.$request->q."%");
            });            
        }

        if(isset($request->sort_by)) {

        } else {
            $menus = $menus->orderBy('topmenus.order','ASC');
            
        }
        $menus = $menus->leftJoin('pages','pages.id','topmenus.page_id');
        $menus = $menus->paginate($per_page);
        $helper = new Helpers();
        if(!empty($menus)){
            foreach($menus as $k=>$v){
                $menus[$k]->icon = !empty($v->icon)?($helper->publicpath()."/images/topmenu/".$v->icon):"";
            }
        }

        // append search params
        if(isset($request->q)) {
           $menus = $menus->appends(['q' => $request->q]);  /*keywords will append to url using append*/
           session(['q' => $request->q]);
        } else {
           session()->forget('q');
        }       

        // append sort_by params
        if(isset($request->sort_by)) {
            $menus = $menus->appends(['key' => $request->key, 'sort_by' => $request->sort_by]);
            session(['key' => $request->key, 'sort_by' =>( $request->sort_by == 'asc') ? 'desc' : 'asc']);
        } 

         // append recordvalue params
         if(isset($request->recordvalue)) {
            $menus = $menus->appends(['recordvalue' => $request->recordvalue]);
            session(['recordvalue' => $request->recordvalue]);
        } else {
            session()->forget('recordvalue');
        }
        $order = Topmenu::orderBy('order', 'DESC')->pluck('order')->first();
        if(isset($request->id)) {

            $editmenu = Topmenu::where('id', $request->id)->first();
            if(!empty($editmenu)){                
                $editmenu->icon = !empty($editmenu->icon)?($helper->publicpath()."/images/topmenu/".$editmenu->icon):"";                
            }

        }else{
            $editmenu = [];
            $order = $order+1;
        }
        $page = Page::select('id','name_en')->get();
        
        
        return view('components.topmenu.list', compact('menus','editmenu','page','order'));

    }

    // save and update menu and its details from this function
    public function topmenu_create(Request $request)
    {       
        $helper = new Helpers();
        $this->validate($request,[
            'title_en' => 'required|max:50',
            'title_ar' => 'required|max:50',
            'type' => 'required'
        ],[
            'title_en.required' => 'Please enter title in english',
            'title_ar.required' => 'Please enter title in arabic'
        ]);
        $highestOrder = Topmenu::orderBy('order', 'DESC')->pluck('order')->first();
        if(!empty($request->id)){
            $topmenu = Topmenu::select('order','icon')->where('id', $request->id)->first();
            if($topmenu->order!=$request->order){                
                $sourceOrder = $topmenu->order;
                $destinationOrder = $request->order;
                if($sourceOrder<$destinationOrder){
                    $menusPositionToMoveDown = Topmenu::where('order','>',$sourceOrder)->where('order', '<=',$destinationOrder)->get();
                    if(!empty($menusPositionToMoveDown)){
                        foreach($menusPositionToMoveDown as $k=>$v){
                            Topmenu::where('id', $v->id)->decrement('order');
                        }
                    }
                }
                if($sourceOrder>$destinationOrder){
                    $menusPositionToMoveDown = Topmenu::where('order','<',$sourceOrder)->where('order', '>=',$destinationOrder)->get();
                    if(!empty($menusPositionToMoveDown)){
                        foreach($menusPositionToMoveDown as $k=>$v){
                            Topmenu::where('id', $v->id)->increment('order');
                        }
                    }
                }
            }
        } 
        if(empty($request->id)){
            $menusPositionToMoveDown = Topmenu::where('order', '>=',$request->order)->get();
            if(!empty($menusPositionToMoveDown)){
                foreach($menusPositionToMoveDown as $k=>$v){
                    Topmenu::where('id', $v->id)->increment('order');
                }
            }
        }
        $array = [
            'order' => $request->get('order'),
            'title_en' => $request->get('title_en'),
            'title_ar' => $request->get('title_ar'),
            'type' => $request->get('type'),
            'link' => !empty($request->link)?$request->link:NULL,
            'page_id' => !empty($request->page_id)?$request->page_id:NULL,
            'created_at' => date('Y-m-d H:i:s',time()),
            'updated_at' => date('Y-m-d H:i:s',time())
        ];
        if($request->hasFile('icon')) {
            $oldimage = !empty($topmenu['icon'])?$topmenu['icon']:'none';
            $image= $helper->upload_image($request->file('icon'),'images/topmenu/',$oldimage);
            $array['icon'] = $image;
       }

        if(isset($request->id)) {
            unset($array['created_at']);
            $result = Topmenu::where('id', $request->id)->update($array);
            
            if($result) {
                Session::flash('message', 'Menu updated successfully'); 
                Session::flash('alert-class', 'alert-success'); 
            } else {
                Session::flash('message', 'Unable to update menu!'); 
                Session::flash('alert-class', 'alert-danger'); 
            }

        } else {

            $result =  Topmenu::create($array);

            if($result) {
                Session::flash('message', 'Menu added successfully'); 
                Session::flash('alert-class', 'alert-success'); 
            } else {
                Session::flash('message', 'Unable to add menu!'); 
                Session::flash('alert-class', 'alert-danger'); 
            }
        }

        return redirect('admin/topmenu/list');

    }

    /* delete single menu */

    public function topmenu_delete(Request $request)
    {
        $menu = \App\Topmenu::find($request->id);
        $unlinkIcon = $menu->icon;
        $result = $menu->delete();
        
        if($result) {
            if(!empty($unlinkIcon) && file_exists(base_path('public').'/images/topmenu/'.$unlinkIcon)) {
                unlink(base_path('public').'/images/topmenu/'.$unlinkIcon);
            }
			$message 		= "Menu deleted successfully";
            $returnStatus 	= 1;            
        } else {
			$message 		= "Unable to delete this menu";
			$returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));        
    }

    /* sort menu*/

    public function updateTopmenuOrder(Request $request) {
        $selectedData = $request->selectedData;

        $i = 1;
        foreach($selectedData as $selectedValue) {
            TopMenu::where('id', $selectedValue)->update(['order' =>  $i]);
            $i++;
        }

     return json_encode(array('status' => 1, 'message' => 'Sequence updated succcessfully')); 
    }








     /* menus listing will get through this function */
     public function middlemenu_list(Request $request)
     {         
         
         $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
         session(['sort_by' => 'asc']);

         $menus = Middlemenu::select('id', 'type', 'icon','link','order');
         $menus = $menus->orderBy('order','ASC');         
         $menus = $menus->paginate($per_page);
         $helper = new Helpers();
         if(!empty($menus)){
             foreach($menus as $k=>$v){
                 $menus[$k]->icon = !empty($v->icon)?($helper->publicpath()."/images/middlemenu/".$v->icon):"";
             }
         }
 
         // append search params
         if(isset($request->q)) {
            $menus = $menus->appends(['q' => $request->q]);  /*keywords will append to url using append*/
            session(['q' => $request->q]);
         } else {
            session()->forget('q');
         }       
 
         // append sort_by params
         if(isset($request->sort_by)) {
             $menus = $menus->appends(['key' => $request->key, 'sort_by' => $request->sort_by]);
             session(['key' => $request->key, 'sort_by' =>( $request->sort_by == 'asc') ? 'desc' : 'asc']);
         } 
 
          // append recordvalue params
          if(isset($request->recordvalue)) {
             $menus = $menus->appends(['recordvalue' => $request->recordvalue]);
             session(['recordvalue' => $request->recordvalue]);
         } else {
             session()->forget('recordvalue');
         }
         $order = Middlemenu::orderBy('order', 'DESC')->pluck('order')->first();
         if(isset($request->id)) {
 
             $editmenu = Middlemenu::where('id', $request->id)->first();
             if(!empty($editmenu)){                
                 $editmenu->icon = !empty($editmenu->icon)?($helper->publicpath()."/images/middlemenu/".$editmenu->icon):"";                
             }
 
         }else{
             $editmenu = [];
             $order = $order+1;
         }         
         
         return view('components.middlemenu.list', compact('menus','editmenu','order'));
 
     }
 
     // save and update menu and its details from this function
     public function middlemenu_create(Request $request)
     {       
         $helper = new Helpers();
         $this->validate($request,[
            'type' => 'required',
             'link' => 'required',
             'order' => 'required'
         ],[
            'type.required' => 'Please select icon',
            'link.required' => 'Please enter link'
        ]);
        
        
         $highestOrder = Middlemenu::orderBy('order', 'DESC')->pluck('order')->first();
         if(!empty($request->id)){
             $topmenu = Middlemenu::select('order','icon')->where('id', $request->id)->first();
             if($topmenu->order!=$request->order){
                 $sourceOrder = $topmenu->order;
                 $destinationOrder = $request->order;
                 if($sourceOrder<$destinationOrder){
                    $menusPositionToMoveDown = Middlemenu::where('order','>',$sourceOrder)->where('order', '<=',$destinationOrder)->get();
                    if(!empty($menusPositionToMoveDown)){
                        foreach($menusPositionToMoveDown as $k=>$v){
                           Middlemenu::where('id', $v->id)->decrement('order');
                        }
                    }
                 }
                 if($sourceOrder>$destinationOrder){
                    $menusPositionToMoveDown = Middlemenu::where('order','<',$sourceOrder)->where('order', '>=',$destinationOrder)->get();
                    if(!empty($menusPositionToMoveDown)){
                        foreach($menusPositionToMoveDown as $k=>$v){
                           Middlemenu::where('id', $v->id)->increment('order');
                        }
                    }
                 }
                 
             }
         } 
         if(empty($request->id)){
             $menusPositionToMoveDown = Middlemenu::where('order', '>=',$request->order)->get();
             if(!empty($menusPositionToMoveDown)){
                 foreach($menusPositionToMoveDown as $k=>$v){
                    Middlemenu::where('id', $v->id)->increment('order');
                 }
             }
         }
         $array = [
             'order' => $request->get('order'),
             'type' => $request->get('type'),
             'link' => !empty($request->link)?$request->link:NULL,
             'created_at' => date('Y-m-d H:i:s',time()),
             'updated_at' => date('Y-m-d H:i:s',time())
         ];
         if($request->hasFile('icon') && $request->get('type')=="custom") {
             $oldimage = !empty($topmenu['icon'])?$topmenu['icon']:'none';
             $image= $helper->upload_image($request->file('icon'),'images/middlemenu/',$oldimage);
             $array['icon'] = $image;
        }elseif($request->get('type')!="custom"){
            $array['icon'] = NULL;
        }
       
         if(isset($request->id)) {
             unset($array['created_at']);
             $result = Middlemenu::where('id', $request->id)->update($array);
             
             if($result) {
                 Session::flash('message', 'Menu updated successfully'); 
                 Session::flash('alert-class', 'alert-success'); 
             } else {
                 Session::flash('message', 'Unable to update menu!'); 
                 Session::flash('alert-class', 'alert-danger'); 
             }
 
         } else {
 
             $result =  Middlemenu::create($array);
 
             if($result) {
                 Session::flash('message', 'Menu added successfully'); 
                 Session::flash('alert-class', 'alert-success'); 
             } else {
                 Session::flash('message', 'Unable to add menu!'); 
                 Session::flash('alert-class', 'alert-danger'); 
             }
         }
 
         return redirect('admin/middlemenu/list');
 
     }
 
     /* delete single menu */
 
     public function middlemenu_delete(Request $request)
     {
         $menu = \App\Middlemenu::find($request->id);
         $unlinkIcon = $menu->icon;
         $result = $menu->delete();
         
         if($result) {
             if(!empty($unlinkIcon) && file_exists(base_path('public').'/images/middlemenu/'.$unlinkIcon)) {
                 unlink(base_path('public').'/images/middlemenu/'.$unlinkIcon);
             }
             $message 		= "Menu deleted successfully";
             $returnStatus 	= 1;            
         } else {
             $message 		= "Unable to delete this menu";
             $returnStatus 	= 0;
         }
         return json_encode(array('status' => $returnStatus, 'message' => $message));        
     }
 
     /* sort menu*/
 
     public function updateMiddlemenuOrder(Request $request) {
         $selectedData = $request->selectedData;
 
         $i = 1;
         foreach($selectedData as $selectedValue) {
            Middlemenu::where('id', $selectedValue)->update(['order' =>  $i]);
             $i++;
         }
 
      return json_encode(array('status' => 1, 'message' => 'Sequence updated succcessfully')); 
     }




     
    /* menus listing will get through this function */
    public function mainmenu_list(Request $request)
    {      
        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        session(['sort_by' => 'asc']); // set default sorting
        $menus = Mainmenu::select('mainmenus.id', 'mainmenus.title_en', 'mainmenus.title_ar','mainmenus.type','mainmenus.link','mainmenus.page_id','mainmenus.order','mainmenus.parent_id','pages.slug',
        DB::raw("count(submenu.id) as submenu_count"));
        
        if(!empty($request->id) && !empty($request->type) && $request->type=="submenu"){
            $menus = $menus->where('mainmenus.parent_id',$request->id);
            $width="25"; $submenu = 1;
        }else{
            $width="20"; $submenu = 0;
            $menus = $menus->where('mainmenus.parent_id',0);
        }
        
        if(isset($request->q)) { // search by name
            $menus = $menus->where(function($query) use($request) {
               $query->where('mainmenus.title_en','LIKE','%'.$request->q."%");
            });            
        }

        if(isset($request->sort_by)) {

        } else {
            $menus = $menus->orderBy('mainmenus.order','ASC');
            
        }

        $menus = $menus->leftJoin('pages','pages.id','mainmenus.page_id');
        $menus = $menus->leftJoin('mainmenus as submenu','submenu.parent_id','mainmenus.id')->groupBy('mainmenus.id', 'mainmenus.title_en', 'mainmenus.title_ar','mainmenus.type','mainmenus.link','mainmenus.page_id','mainmenus.order','mainmenus.parent_id','pages.slug');
        $menus = $menus->paginate($per_page);
        
        $helper = new Helpers();

        // append search params
        if(isset($request->q)) {
           $menus = $menus->appends(['q' => $request->q]);  /*keywords will append to url using append*/
           session(['q' => $request->q]);
        } else {
           session()->forget('q');
        }       

        // append sort_by params
        if(isset($request->sort_by)) {
            $menus = $menus->appends(['key' => $request->key, 'sort_by' => $request->sort_by]);
            session(['key' => $request->key, 'sort_by' =>( $request->sort_by == 'asc') ? 'desc' : 'asc']);
        } 

         // append recordvalue params
         if(isset($request->recordvalue)) {
            $menus = $menus->appends(['recordvalue' => $request->recordvalue]);
            session(['recordvalue' => $request->recordvalue]);
        } else {
            session()->forget('recordvalue');
        }
        if($submenu==1 && !empty($request->id)){
            $order = Mainmenu::where('parent_id',$request->id)->orderBy('order', 'DESC')->pluck('order')->first();
        }else{
            $order = Mainmenu::where('parent_id',0)->orderBy('order', 'DESC')->pluck('order')->first();
        }

        $parentId = 0;
        if(isset($request->id)) {            
            if($submenu==1 && !empty($request->submenuid)){
                $editmenu = Mainmenu::where('id', $request->submenuid)->first();             
                $parentId = $request->id;   
            }else{
                $editmenu = Mainmenu::where('id', $request->id)->first();
                $order = $order+1;
                $parentId = 0;
            }
            
        }else{
            $editmenu = [];
            $order = $order+1;
        }

        $page = Page::select('id','name_en')->get();
        $parent = Mainmenu::select('id','title_en')->where('parent_id',0)->get();
        
        
        if($submenu==1 && !empty($request->id) && empty($request->submenuid)){
            $parentId = $request->id;
            $request->id = NULL;
            $editmenu = new \stdClass();
            $editmenu->parent_id = $parentId;
        }

        
        
        return view('components.mainmenu.list', compact('menus','editmenu','page','order','parent','width','submenu','parentId'));

    }

    // save and update menu and its details from this function
    public function mainmenu_create(Request $request)
    {       
        $helper = new Helpers();
        $this->validate($request,[
            'title_en' => 'required',
            'title_ar' => 'required',
            'type' => 'required'
        ],[
            'title_en.required' => 'Please enter title in english',
            'title_ar.required' => 'Please enter title in arabic'
        ]);
        $highestOrder = Mainmenu::where('parent_id',$request->parent_id)->orderBy('order', 'DESC')->pluck('order')->first();                
        if(!empty($request->id)){
            $topmenu = Mainmenu::select('order')->where('id', $request->id)->first();
            if($topmenu->order!=$request->order){                
                $sourceOrder = $topmenu->order;
                $destinationOrder = $request->order;
                if($sourceOrder<$destinationOrder){
                    $menusPositionToMoveDown = Mainmenu::where('parent_id',$request->parent_id)->where('order','>',$sourceOrder)->where('order', '<=',$destinationOrder)->get();
                    if(!empty($menusPositionToMoveDown)){
                        foreach($menusPositionToMoveDown as $k=>$v){
                            Mainmenu::where('id', $v->id)->decrement('order');
                        }
                    }
                }
                if($sourceOrder>$destinationOrder){
                    $menusPositionToMoveDown = Mainmenu::where('parent_id',$request->parent_id)->where('order','<',$sourceOrder)->where('order', '>=',$destinationOrder)->get();
                    if(!empty($menusPositionToMoveDown)){
                        foreach($menusPositionToMoveDown as $k=>$v){
                            Mainmenu::where('id', $v->id)->increment('order');
                        }
                    }
                }
            }
        } 
        if(empty($request->id)){
            $menusPositionToMoveDown = Mainmenu::where('parent_id',$request->parent_id)->where('order', '>=',$request->order)->get();
            if(!empty($menusPositionToMoveDown)){
                foreach($menusPositionToMoveDown as $k=>$v){
                    Mainmenu::where('id', $v->id)->increment('order');
                }
            }
        }
        $array = [
            'order' => $request->get('order'),
            'parent_id' => !empty($request->parent_id)?$request->parent_id:0,
            'title_en' => $request->get('title_en'),
            'title_ar' => $request->get('title_ar'),
            'type' => $request->get('type'),
            'link' => !empty($request->link)?$request->link:NULL,
            'page_id' => !empty($request->page_id)?$request->page_id:NULL,
            'created_at' => date('Y-m-d H:i:s',time()),
            'updated_at' => date('Y-m-d H:i:s',time())
        ];

        if(isset($request->id)) {
            unset($array['created_at']);
            $result = Mainmenu::where('id', $request->id)->update($array);
            
            if($result) {
                Session::flash('message', 'Menu updated successfully'); 
                Session::flash('alert-class', 'alert-success'); 
            } else {
                Session::flash('message', 'Unable to update menu!'); 
                Session::flash('alert-class', 'alert-danger'); 
            }

        } else {

            $result =  Mainmenu::create($array);

            if($result) {
                Session::flash('message', 'Menu added successfully'); 
                Session::flash('alert-class', 'alert-success'); 
            } else {
                Session::flash('message', 'Unable to add menu!'); 
                Session::flash('alert-class', 'alert-danger'); 
            }
        }
        if(!empty($request->parent_id)){
            return redirect('admin/mainmenu/list/'.$request->parent_id.'/submenu');
        }else{
            return redirect('admin/mainmenu/list');
        }
        

    }

    /* delete single menu */

    public function mainmenu_delete(Request $request)
    {
        $menu = \App\Mainmenu::find($request->id);
        $result = $menu->delete();
        
        if($result) {
			$message 		= "Menu deleted successfully";
            $returnStatus 	= 1;            
        } else {
			$message 		= "Unable to delete this menu";
			$returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));        
    }

    /* sort menu*/

    public function updateMainmenuOrder(Request $request) {
        $selectedData = $request->selectedData;

        $i = 1;
        foreach($selectedData as $selectedValue) {
            Mainmenu::where('id', $selectedValue)->update(['order' =>  $i]);
            $i++;
        }

     return json_encode(array('status' => 1, 'message' => 'Sequence updated succcessfully')); 
    }

    
}
