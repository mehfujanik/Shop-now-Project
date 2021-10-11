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
                    <li><a href="{{ route('user.change.password') }}" class="btn btn-danger btn-sm btn-block">Change Password</a></li> 
                    <li><a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a></li>  

                </ul>

                <br> <br>

        </div>
     
        <div class="col-lg-10">

          <h2 style="text-align: center"> Welcome To Shop Now <br> <strong> {{ Auth::user()->name }} </strong></h2>  

        </div>


    </div> <!-- end row -->
</div> <!-- end container -->
</div> <!-- end body-content -->


@endsection









{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Hi..{{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        This is just home page 
    </div>
</x-app-layout> --}}