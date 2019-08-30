<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use App\Page;
use App\Menu;
use App\MenuType;
use App\SubMenu;
use Config;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Lcobucci\JWT\Parser;
use Mail;
use Response;
use App\Interfaces\MenuInterface;
use App\Http\Traits\CommonTrait;
use App\Http\Traits\UserTrait;
use Session;

class MenuController extends Controller implements MenuInterface
{
    use CommonTrait, UserTrait;

    /*
    This controller includes getMenuTypes, getPages, getMenus,
    create, store, listing, deleteSingleMenu, deleteMultipleMenu,deleteSingleSubMenu
    deleteMultipleSubMenu, editMenu, createSubMenu, storeSubMenu, menuDetails, editSubMenu, updateMenuOrder  functions
    
    */

    /*function to get menu types*/ 

    public function getMenuTypes() {

        $menuType = MenuType::get();

        return $menuType;
        
    }

    /*function to get pages*/ 

    public function getPages() {

        $pages = Page::select('id', 'name_en', 'name_ar')->get();

        return $pages;
        
    }

    /*function to get menus*/ 

    public function getMenus() {

        $pages = Menu::select('id', 'name_en', 'name_ar')->get();

        return $pages;
        
    }


    /*this function will redirect to create menu section*/

    public function create()
    {
      $menutypes = $this->getMenuTypes();
      $pages = $this->getPages();
      return view('menu.create', compact('menutypes', 'pages'));

    }

   // save menu and its details from this function
    public function store(Request $request)
    {       

        $this->validate($request,[
            'name_en' => 'required|max:50',
            'name_ar' => 'required|max:50',
            'menu_type_id' => 'required'
        ],[
            'name_en.required' => 'Please enter name',
            'name_ar.required' => 'Please enter name'
        ]);

        $array = [
            'name_en' => $request->get('name_en'),
            'name_ar' => $request->get('name_ar'),

            'menu_type_id' => $request->get('menu_type_id'),
            'page_id' => $request->get('page_id'),

            'created_at' => time(),
            'updated_at' => time()
        ];

        if(isset($request->id)) {

            $result = Menu::where('id', $request->id)->update($array);
            
            if($result) {
                Session::flash('message', 'Menu updated successfully'); 
                Session::flash('alert-class', 'alert-success'); 
            } else {
                Session::flash('message', 'Unable to update menu!'); 
                Session::flash('alert-class', 'alert-danger'); 
            }

        } else {

            $result =  Menu::create($array);

            if($result) {
                Session::flash('message', 'Menu added successfully'); 
                Session::flash('alert-class', 'alert-success'); 
            } else {
                Session::flash('message', 'Unable to add menu!'); 
                Session::flash('alert-class', 'alert-danger'); 
            }
        }

        return redirect('menu/listing');

    }

    /* menus listing will get through this function */
    public function listing(Request $request)
    {         
        
        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        session(['sort_by' => 'asc']); // set default sorting
        $menus = Menu::with(['MenuType' => function($q) {
            $q->select('id', 'name');
        }])->select('id', 'name_en', 'name_ar', 'menu_type_id', 'status', 'created_at');
        
        if(isset($request->q)) { // search by name

            $menus = $menus->where(function($query) use($request) {
               $query->where('name_en','LIKE','%'.$request->q."%");
            });            
        }

        if(isset($request->sort_by)) {

            if($request->key == 'name') { // sort by name
                $menus = $menus->orderBy('name_en', $request->sort_by); 
            }

            if($request->key == 'menu_type') { // sor by menu id
                $menus = $menus->orderBy('menu_type_id', $request->sort_by); 
            }

            if($request->key == 'date') { // sort by date
                $menus = $menus->orderBy('created_at', $request->sort_by); 
            }

            // if($request->key == 'status') { // sort by status
            //     $menus = $menus->orderBy('status', $request->sort_by); 
            // }

        } else {
            $menus = $menus->orderBy('order');
            
        }
        
        $menus = $menus->paginate($per_page);


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

        return view('menu.view', compact('menus'));

    }

    /* delete single menu */

    public function deleteSingleMenu(Request $request)
    {
        $menu = \App\Menu::find($request->id);
        $result = $menu->delete();
        
        if($result) {

           SubMenu::whereIn('menu_id', [$request->id])->delete();

			$message 		= "Menu deleted successfully";
            $returnStatus 	= 1;
            
        } else {
			$message 		= "Unable to delete this menu";
			$returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));        
    }

     /*delete multiple menus*/

     public function deleteMultipleMenu(Request $request) {
		
        $result = Menu::whereIn('id', $request->ids)->delete();
        
        if($result) {

            SubMenu::whereIn('menu_id', $request->ids)->delete();
			$message 		= "Menu(s) deleted successfully";
            $returnStatus 	= 1;
            
        } else {
			$message 		= "Unable to delete menu(s)";
			$returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message)); 
    }

     /* delete single sub menu */

     public function deleteSingleSubMenu(Request $request)
     {
         $menu = \App\SubMenu::find($request->id);
         $result = $menu->delete();
         
         if($result) {           
 
             $message 		= "Sub menu deleted successfully";
             $returnStatus 	= 1;
             
         } else {
             $message 		= "Unable to delete this sub menu";
             $returnStatus 	= 0;
         }
         return json_encode(array('status' => $returnStatus, 'message' => $message));        
     }
 
      /*delete multiple sub menus*/
 
      public function deleteMultipleSubMenu(Request $request) {
         
         $result = SubMenu::whereIn('id', $request->ids)->delete();
         
         if($result) {
             
             $message 		= "Sub menu(s) deleted successfully";
             $returnStatus 	= 1;
             
         } else {
             $message 		= "Unable to delete sub menu(s)";
             $returnStatus 	= 0;
         }
         return json_encode(array('status' => $returnStatus, 'message' => $message)); 
     }

    /*edit menu*/

    public function editMenu($id) {

      $menutypes = $this->getMenuTypes();
      $pages = $this->getPages();
      $menuDetails = Menu::where('id', $id)->first();
      return view('menu.create', compact('menutypes', 'pages', 'menuDetails'));
      
    }

    /*this function will redirect to create sub menu section*/

    public function createSubMenu()
    {
      $menuslistings = $this->getMenus();
      $pages = $this->getPages();
      return view('menu.create_sub_menu', compact('menuslistings', 'pages'));

    }

    // save sub menu and its details from this function
    public function storeSubMenu(Request $request)
    {       

        $this->validate($request,[
            'name_en' => 'required|max:50',
            'name_ar' => 'required|max:50',
            'menu_id' => 'required',
            'page_id' => 'required'
        ],[
            'name_en.required' => 'Please enter name',
            'name_ar.required' => 'Please enter name',
            'menu_id.required' => 'Parent menu is required',
            'page_id.required' => 'Select page from list.'
        ]);

       
        $array = [
            'name_en' => $request->get('name_en'),
            'name_ar' => $request->get('name_ar'),

            'menu_id' => $request->get('menu_id'),
            'page_id' => $request->get('page_id'),

            'created_at' => time(),
            'updated_at' => time(),

        ];

        if(isset($request->id)) {

            $result = SubMenu::where('id', $request->id)->update($array);
            
            if($result) {
                Session::flash('message', 'Sub menu updated successfully'); 
                Session::flash('alert-class', 'alert-success'); 
            } else {
                Session::flash('message', 'Unable to update sub menu!'); 
                Session::flash('alert-class', 'alert-danger'); 
            }

        } else {

            $result =  SubMenu::create($array);

            if($result) {
                Session::flash('message', 'Sub menu added successfully'); 
                Session::flash('alert-class', 'alert-success'); 
            } else {
                Session::flash('message', 'Unable to add sub menu!'); 
                Session::flash('alert-class', 'alert-danger'); 
            }
        }

        return redirect('menu/listing');

    }

    /*get menu details*/

    public function menuDetails($id) {

        $menuDetails = SubMenu::select('id', 'menu_id', 'name_en', 'name_ar', 'created_at')->with(['ParentMenu' => function($q) {
            $q->select('id', 'name_en', 'name_ar');
        }])->where('menu_id', $id)->get();
        return view('menu/view_sub_menu', compact('menuDetails'));

    }

    /*edit menu*/
    
    public function editSubMenu($id) {

      $menuslistings = $this->getMenus();
      $pages = $this->getPages();
      $submenuDetails = SubMenu::where('id', $id)->first();
      return view('menu.create_sub_menu', compact('menuslistings', 'pages', 'submenuDetails'));
    }

    /* sort menu*/

    public function updateMenuOrder(Request $request) {
        $selectedData = $request->selectedData;

        $i = 1;
        foreach($selectedData as $selectedValue) {
            Menu::where('id', $selectedValue)->update(['order' =>  $i]);
            $i++;
        }

     return json_encode(array('status' => 1, 'message' => 'Order updated succcessfully')); 
    }

    
}
