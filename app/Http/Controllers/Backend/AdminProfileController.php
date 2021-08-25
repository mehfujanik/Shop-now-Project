<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminProfileController extends Controller
{
    //admin Profile
    public function AdminProfile(){
      $adminProfile = Admin::find(1);

      return view('admin.admin_profile_view', compact('adminProfile'));
    } //end method


//admin profile edit
public function AdminProfileEdit(){
  $adminProfileEdit= Admin::find(1);

  return view('admin.admin_profile_edit', compact('adminProfileEdit'));
}

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
}// main end
