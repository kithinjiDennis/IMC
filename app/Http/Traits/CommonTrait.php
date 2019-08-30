<?php
namespace App\Http\Traits;

use Image;
use App\User;
use App\Models\AppJob;
use App\Models\Notification;
use App\Models\WebNotification;
use Auth;
use DB;
use App\Mail\NotificationEmail;
use Mail;
use Config;

trait CommonTrait
{
    public function imageDynamicName()
    {
        #Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(1000000, 9999999)
            . $characters[rand(0, 5)];
        $string = str_shuffle($pin);
        return $string;
    }               
}
