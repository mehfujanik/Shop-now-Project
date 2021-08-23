<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    //admin Profile
    public function AdminProfile(){
    //  $adminProfile = Admin::find(1);

      return view('admin.admin_profile_view');
    } //end method
}
