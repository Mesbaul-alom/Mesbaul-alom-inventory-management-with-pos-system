<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
        public function AdminChangePassword(){

            return view('admin.admin_change_password');

 }

    // admin password update
            public function AdminUpdateChangePassword(Request $request){
                
                $admin = auth()->user();
                $hashedPassword = $admin->password;
               
                
            $validateData = $request->validate([
                'oldpassword' => 'required',
                'password' => 'required|confirmed',
            ]);
            
            
            if (Hash::check($request->oldpassword,$hashedPassword)) {
            
            $admin->password = Hash::make($request->password);
            $admin->save();
           

            }else{
                return redirect()->back();
            }


        } // main method end

       
}


