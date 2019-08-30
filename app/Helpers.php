<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use DB;
class Helpers
{
    /*
    Method : upload images 
    parameters : token in headers
    Created by : sarabjit singh
    purpose :  upload images
    */

    function upload_image($file,$path,$old_image) {
        //dd($file);
    $oldimage = $path.$old_image;
    $url = getcwd()."/".$oldimage ;
    $urls = str_replace("\\","/",$url);
    if (is_file($urls)){
        // remove the old image and upload new images
        unlink(str_replace("\\","/",getcwd().'/'.$oldimage));
        $trimmeds = str_replace(' ','_' ,$file->getClientOriginalName());
        $trimmed = str_replace('/','_' ,$trimmeds);

        if(strlen($trimmed) > 15){
        $name= md5(rand(1,1000)).date('dmYhis').'_'.substr($trimmed,0,15).'.'.$file->getClientOriginalExtension();
        } else {
        $name= md5(rand(1,1000)).date('dmYhis').'_'.$trimmed;
        }

    } else{
        // upload the new image
        $trimmeds = str_replace(' ','_' ,$file->getClientOriginalName());
        $trimmed = str_replace('/','_' ,$trimmeds);

        if(strlen($trimmed) > 15){
        $name= md5(rand(1,1000)).md5('xyz').date('dmYhis').'_'.substr($trimmed,0,15).'.'.$file->getClientOriginalExtension();
        } else {
        $name= md5(rand(1,1000)).md5('xyz').date('dmYhis').'_'.$trimmed;
        }

    }
    $name=substr($name,-90);
    $file->move($path,$name); // move to the desired folder
        return $name;
    }

      // To get the public path of the server.
   public static function publicpath($path = null)
   {
       
       return url('/');
   // return rtrim(basePath('public/' . $path), '/');
   }

}
