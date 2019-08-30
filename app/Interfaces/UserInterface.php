<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface UserInterface
{
    public function create();
    public function store(Request $request);
    public function listing(Request $request);

    public function deleteSingleUser(Request $request);
    public function changeStatus(Request $request);
    public function editUser($id);
    
    public function SaveEditUser(Request $request);
    public function deleteMultiple(Request $request);
    public function updateMultiUserStatus(Request $request);

    public function ChangePassword();
    public function ChangePasswordSubmit(Request $request);
    public function forgotpassword(Request $request);

    public function resetPassword($token);
    public function resetPasswordSubmit(Request $request);  

}
