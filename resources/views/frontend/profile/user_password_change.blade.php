@extends('frontend.main_master')

@section('content')


<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 

        <div class="col-lg-2">

               <img class="rounded-circle" src="{{  (!empty($user->profile_photo_path))? url('upload/users_images/' . 
               $user->profile_photo_path):url('upload/avatar-1.png') }}" alt="User Avatar" height="150px" weight="150px">

               <br> <br>

                <ul>
                    <li><a href="{{ url('/') }}"  class="btn btn-success btn-sm btn-block" >Home</a></li>
                    <li><a href="{{ route('dashboard') }}"  class="btn btn-info btn-sm btn-block" >Profile</a></li>
                    <li><a href="{{ route('user.profile.update') }}"  class="btn btn-info btn-sm btn-block" >Update Profile</a></li>
                    <li><a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a></li>  

                </ul>

                <br> <br>

        </div>
     
        <div class="col-lg-10">

          <h2 style="text-align: center"> <strong> Change Your Password</strong></h2>  




              
          <form method="POST" action="{{ route('user.password.update') }}"  >
            @csrf


            
            <div class="form-group">
                <label class="info-title" for="exampleInputPassword1">Current Password <span>*</span></label>
                <input type="password"  name="oldpassword"  class="form-control unicase-form-control text-input" id="current_password">
            </div>

            <div class="form-group">
                <label class="info-title" for="exampleInputPassword1">New Password <span>*</span></label>
                <input type="password"  name="password"   class="form-control unicase-form-control text-input" id="password">
            </div>

            <div class="form-group">
                <label class="info-title" for="exampleInputPassword1">Confirm Password <span>*</span></label>
                <input type="password"  name="password_confirmation"   class="form-control unicase-form-control text-input" id="password_confirmation">
            </div>    




                <!-- /.col -->
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-success btn-rounded mt-10">Update Password</button>
                </div>
                <!-- /.col -->
                </div>
              </form>		

        </div>


    </div> <!-- end row -->
</div> <!-- end container -->
</div> <!-- end body-content -->


@endsection





