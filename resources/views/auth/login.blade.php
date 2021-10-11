@extends('frontend.main_master')

@section('content')


<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 

        <div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			
                    <div class="col-md-6 col-sm-6 sign-in">
                    <h4 class="">Sign in</h4>
                    <p class="">Hello, Welcome to your account.</p>
                    <div class="social-sign-in outer-top-xs">
                        <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
                        <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
                    </div>


                    <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                            <input type="email" class="form-control unicase-form-control text-input" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                            <input type="password" class="form-control unicase-form-control text-input" id="password" name="password">
                        </div>
                        <div class="radio outer-xs">
                            <label>
                                <input type="radio" name="remember" id="remember_me" >Remember me!
                            </label>
                            <a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot your Password?</a>
                        </div>


                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>

                    </form>	

                    </div>
                    <!-- Sign-in -->




                    <!-- create a new account -->
                    <div class="col-md-6 col-sm-6 create-new-account">
                    <h4 class="checkout-subtitle">Create a new account</h4>
                    <p class="text title-tag-line">Create your new account.</p>



                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                            <input type="text" class="form-control unicase-form-control text-input" id="name" name="name">
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                            <input type="email" class="form-control unicase-form-control text-input" id="email" name="email">
                        </div>
                       
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
                            <input type="number" class="form-control unicase-form-control text-input" id="phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
                            <input type="password" class="form-control unicase-form-control text-input" id="password" name="password">
                        </div>
                            <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
                            <input type="password" class="form-control unicase-form-control text-input" id="password_confirmation" name="password_confirmation" >
                        </div>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
                    </form>


                    </div>	
                    <!-- create a new account -->
		   </div><!-- /.row -->
		</div>
    </div> <!-- end row -->
</div> <!-- end container -->
</div> <!-- end body-content -->


@endsection