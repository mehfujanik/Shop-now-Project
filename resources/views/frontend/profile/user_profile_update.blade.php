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

          <h2 style="text-align: center"> Profile Update</h2>  




              
        <form method="POST" action="{{ route('user.profile.store') }}"  enctype="multipart/form-data" >
            @csrf

            
            <div class="form-group">
                <label class="info-title" for="exampleInputPassword1">Name <span>*</span></label>
                <input type="text"  name="name" value="{{ $user->name }}" class="form-control unicase-form-control text-input" id="name">
            </div>

            <div class="form-group">
                <label class="info-title" for="exampleInputPassword1">Email <span>*</span></label>
                <input type="email"  name="email" value="{{ $user->email }}"  class="form-control unicase-form-control text-input" id="email">
            </div>

            <div class="form-group">
                <label class="info-title" for="exampleInputPassword1">Phone <span>*</span></label>
                <input type="number"  name="phone"  value="{{ $user->phone }}" class="form-control unicase-form-control text-input" id="phone">
            </div>    

            <div class="form-group">
                <label class="info-title" for="exampleInputPassword1">Img <span>*</span></label>
                <input type="file"  name="profile_photo_path"  class="form-control unicase-form-control text-input" >
            </div>    



                <!-- /.col -->
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-success btn-rounded mt-10">Update Profile</button>
                </div>
                <!-- /.col -->
                </div>
              </form>		

        </div>   <br> <br>


    </div> <!-- end row -->
</div> <!-- end container -->
</div> <!-- end body-content -->


@endsection





