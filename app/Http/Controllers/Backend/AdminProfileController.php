<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;


class AdminProfileController extends Controller
{
    // admin profile
    public function AdminProfile(){

        $adminProfile = Admin::find(1);

        return view('admin.admin_profile_view', compact('adminProfile'));
    } // end method


   // admin profile  edit
   public function AdminProfileEdit(){

    $adminProfileEdit = Admin::find(1);

    return view('admin.admin_profile_edit', compact('adminProfileEdit'));
} // end method



     // admin profile Update
     public function AdminProfileUpdate(Request $request)
     {
         $data = Admin::find(1);
         $data->name = $request->name;
         $data->email = $request->email;

         if ($request->file('profile_photo_path')) {
             $file = $request->file('profile_photo_path');
             // for auto replace old img 
             @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
             // end rep..
             $filename = date('YmdHi').$file->getClientOriginalName();
             $file->move(public_path('upload/admin_images'),$filename);
             $data['profile_photo_path'] = $filename;
         }
         $data->save();

     // update sms
         $notification = array(
             'message' =>  ' Profile Update Sucessyfuly',
             'alert-type' => 'success'
         ); 
         return redirect()->route('admin.profile')->with($notification);

     }// end method


        // admin Password change
        public function AdminChnagePassword(){
            return view('admin.admin_password_change');
        }// end method



               
        // admin password update
        public function AdminUpdatePassword(Request $request){

            $validateData = $request->validate([
                'oldpassword' => 'required',
                'password' => 'required|confirmed',
            ]);

            $hashedPassword = Admin::find(1)->password;
            if (Hash::check($request->oldpassword,$hashedPassword)) {
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();

         // update sms
         $notification = array(
            'message' =>  ' Admin Password Update Sucessyfuly',
            'alert-type' => 'success'
        ); 

            return redirect()->route('admin.logout')->with($notification);

            }else{
                return redirect()->back();
            }


        } // end method





}  // main end
