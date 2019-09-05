<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Config;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Lcobucci\JWT\Parser;
use Mail;
use Response;
use App\Interfaces\UserInterface;
use App\Http\Traits\CommonTrait;
use App\Http\Traits\UserTrait;
use Session;
use DB;
use App\Setting;
use App\Page;
class UserController extends Controller implements UserInterface
{
    use CommonTrait, UserTrait;

    /*
    This controller includes user  create, store, listing, deleteSingleUser, changeStatus,  editUser, SaveEditUser, deleteMultiple,
  updateMultiUserStatus, ChangePassword, ChangePasswordSubmit, forgotpassword, resetPassword, resetPasswordSubmit functions

    */

  public function logout(Request $request) {
          return redirect('/login');

  }

    /*create function create user in website*/

    public function dashboard()
    {
$allpages= Page::get();
      return view('users.dashboard')->with('allpages',$allpages)->with('pageid','');

    }


    /*create function create user in website*/

    public function create()
    {

      return view('users.create');

    }

   // save newly created users from this function
    public function store(Request $request)

    {

        $this->validate($request,[
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email'
        ],[
            'name.required' => 'Please enter name',
            'email.required' => 'Email is required',
            'email.email' => 'Invalid email',
            'email.unique' => 'This email is already registered with us.'
        ]);

        $randomkey = $this->getVerificationCode();
        $user_password = substr(time().$randomkey, 0, 15);

        DB::beginTransaction();

        $user = new \App\User([
            'role_id' => Role::where('name', 'sub_admin')->first()->id,
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($user_password),
            'created_at' => time(),
            'updated_at' => time(),

        ]);


        $status = $user->save();

        if($status) {

            try {

                $data['name'] = $request->get('name');
                $data['email'] = $request->get('email');
                $data['password'] = $user_password;
                $data['admin'] = Config::get('variable.ADMIN_EMAIL');

                \Mail::send('emails.users.new_user', ['data' => $data],
                function ($message) use ($data)
                {
                    $message
                        ->from($data['admin'])
                        ->to( $data['email'] )->subject('New User');
                });

                DB::commit();

                Session::flash('message', 'User created successfully');
                Session::flash('alert-class', 'alert-success');

              } catch (\Exception $e) {

                  DB::rollback();

                  Session::flash('message', $e->getMessage());
                  Session::flash('alert-class', 'alert-danger');
              }



        } else {
            Session::flash('message', 'Unable to create user!');
            Session::flash('alert-class', 'alert-danger');
        }
        return redirect('/users/listing');

    }

    /* User listing can be view by this function */
    public function listing(Request $request)
    {

        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record')); //Config::get('variable.page_per_record');
        session(['sort_by' => 'asc']); // set default sorting
        $users = User::select('id', 'name', 'email', 'status', 'created_at');

        if(isset($request->q)) { // search by name and email

            $users = $users->where(function($query) use($request) {
               $query->where('name','LIKE','%'.$request->q."%");
               $query->orWhere('email','LIKE','%'.$request->q."%");
            });
        }

        if(isset($request->sort_by)) {

            if($request->key == 'user') { // sort by user
                $users = $users->orderBy('name', $request->sort_by);
            }

            if($request->key == 'email') { // sort by email
                $users = $users->orderBy('email', $request->sort_by);
            }

            if($request->key == 'date') { // sort by date
                $users = $users->orderBy('created_at', $request->sort_by);
            }

            if($request->key == 'status') { // sort by status
                $users = $users->orderBy('status', $request->sort_by);
            }

        } else {
            $users = $users->orderBy('id', 'desc');

        }

        $users = $users->where('role_id', Role::where('name', 'sub_admin')
        ->first()->id);
        $users = $users->paginate($per_page);


        // append search params
        if(isset($request->q)) {
           $users = $users->appends(['q' => $request->q]);  /*keywords will append to url using append*/
           session(['q' => $request->q]);
        } else {
           session()->forget('q');
        }

        // append sort_by params
        if(isset($request->sort_by)) {
            $users = $users->appends(['key' => $request->key, 'sort_by' => $request->sort_by]);
            session(['key' => $request->key, 'sort_by' =>( $request->sort_by == 'asc') ? 'desc' : 'asc']);
        }

         // append recordvalue params
         if(isset($request->recordvalue)) {
            $users = $users->appends(['recordvalue' => $request->recordvalue]);
            session(['recordvalue' => $request->recordvalue]);
        } else {
            session()->forget('recordvalue');
        }

        return view('users.view', compact('users'));

    }

    /* User record can be delete by this function */
    public function deleteSingleUser(Request $request)
    {
        $user = \App\User::find($request->id);
        $status = $user->delete();

        if($status) {
			$message 		= "User deleted successfully";
            $returnStatus 	= 1;

        } else {
			$message 		= "Unable to delete this user";
			$returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));
    }

    /* Update user status from this function */
    public function changeStatus(Request $request)
    {

        $result = User::where('id', $request->id)->update(['status' => $request->status ]);//$user->save();

        if($request->status ==  1) {
            $message 		= "User un-blocked successfully";

           } else {
            $message 		= "User blocked successfully";

        }

        if($result) {
			$returnStatus 	= 1;
        } else {
			$returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));
    }

    /*go to edit user page from this function*/
    public function editUser($id) {

        $user = User::select('id', 'name', 'email')->where('id', $id)->first();
        return view('users.edit', compact('user'));
    }

    /*update user detail*/
    public function SaveEditUser(Request $request) {

        $result = User::where('id', $request->id)->update(['name' => $request->name ]);

        if($result) {
            Session::flash('message', 'User updated successfully');
            Session::flash('alert-class', 'alert-success');

        } else {
            Session::flash('message', 'Unable to update user!');
            Session::flash('alert-class', 'alert-danger');

        }
        return redirect('/users/listing');
    }

    /*delete multiple users*/

    public function deleteMultiple(Request $request) {

        $result = User::whereIn('id', $request->ids)->delete();

        if($result) {
			$message 		= "User(s) deleted successfully";
            $returnStatus 	= 1;

        } else {
			$message 		= "Unable to delete user(s)";
			$returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));
    }

    /*update multi users status*/
    public function updateMultiUserStatus(Request $request) {

        $result = User::whereIn('id', $request->ids)->update(['status' => $request->status]);

        if($result) {

            if($request->status == 1) {
                $message 		= "User(s) activated successfully";
            } else {
                $message 		= "User(s) blocked successfully";
            }

            $returnStatus 	= 1;

        } else {

            if($request->status == 1) {
                $message 		= " Unable to activate user(s)";
            } else {
                $message 		= "Unable to block user(s)";
            }
			$returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));
    }

    /*redirect to change password section*/

    public function ChangePassword() {

        return view('users.change_password');

    }


    /*change password funtion*/

    public function ChangePasswordSubmit(Request $request) {

        $this->validate($request,[
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'min:6'
        ],[
            'old_password.required' => 'Old  password is required',
            'password.required' => 'New password is required',
            'password.confirmed' => 'New password and confirm password does not matched.'
        ]);

        if (Hash::check($request->old_password, Auth::user()->password)) {
            $user = User::where('id', Auth::id())->update(['password' => Hash::make($request->password)]);

            if($user) {

                Session::flash('message', 'Password change successfully!');
                Session::flash('alert-class', 'alert-success');

            } else {
                Session::flash('message', 'Unable to change password!');
                Session::flash('alert-class', 'alert-danger');
            }
            return redirect('/users/listing');

        } else {

            Session::flash('message', 'Incorrect old password!');
            Session::flash('alert-class', 'alert-danger');

            return redirect('/users/change-password');
        }


    }

    /*forgot password function*/

    public function forgotpassword(Request $request) {

        $randomkey = $this->getVerificationCode();
        $forgot_password_token 	 = substr(time().$randomkey, 0, 15);

        $result = User::where('email', $request->email)->update(['forgot_password_token' => $forgot_password_token, 'updated_at' => time()]);

        if($result) {

            try {

                $data['email'] = $request->get('email');
                $data['forgot_password_token'] = $forgot_password_token;
                $data['admin'] = Config::get('variable.ADMIN_EMAIL');
                $data['server_url'] =url('/');

                \Mail::send('emails.users.forgot_password', ['data' => $data],
                function ($message) use ($data)
                {
                    $message
                        ->from($data['admin'])
                        ->to( $data['email'] )->subject('Reset password');
                });

                Session::flash('message', 'An email has been sent to you in your email id! Please check');
                Session::flash('alert-class', 'alert-success');

              } catch (\Exception $e) {

                  Session::flash('message', $e->getMessage());
                  Session::flash('alert-class', 'alert-danger');
              }

        } else {
            Session::flash('message', 'Unable to send email!');
            Session::flash('alert-class', 'alert-danger');
        }

        return redirect('/login');
    }

    /*redirect to reset password page*/
    public function resetPassword($token) {

        $user = User::select('id', 'forgot_password_token', 'updated_at')->where('forgot_password_token', $token)->first();

        if($user) {

            $add30 = strtotime("+10 minutes", $user->updated_at); // link will expire after 30 minute
            $current_time = time();

            if($current_time <  $add30) {

                $token = $token;
                return view('auth.passwords.reset', compact('token'));

            } else {

                Session::flash('message', 'Token expire!');
                Session::flash('alert-class', 'alert-danger');

                return redirect('/login');
            }


          } else {

              Session::flash('message', 'Token expire!');
              Session::flash('alert-class', 'alert-danger');

              return redirect('/login');
        }
    }

    /*reset password submit function*/

    public function resetPasswordSubmit(Request $request) {

        $this->validate($request,[
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'min:6'
        ],[
            'password.required' => 'New password is required',
            'password.confirmed' => 'New password and confirm password does not matched.'
        ]);

        $user = User::select('id', 'email', 'forgot_password_token', 'updated_at')->where('email', $request->email)->where('forgot_password_token', $request->token)->first();

        if($user) {

            $result = User::where('email', $request->email)->update(['forgot_password_token' => '', 'password' => Hash::make($request->password)]);

            if($result) {

                Session::flash('message', 'Password has been reset successfully');
                Session::flash('alert-class', 'alert-success');

            } else {

                Session::flash('message', 'Unable to reset password');
                Session::flash('alert-class', 'alert-danger');
            }

            return redirect('/login');

        } else {

            Session::flash('message', 'To reset password please enter same email id for which you have requested to reset password!');
            Session::flash('alert-class', 'alert-danger');

            return redirect('/users/reset-password/'.$request->token);

        }

    }

}
