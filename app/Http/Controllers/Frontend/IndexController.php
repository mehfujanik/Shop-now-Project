<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\Product;
use App\Models\Multi_Img;

class IndexController extends Controller
{
    // Home Page view

    public function index(){

        // to show product
        $products=Product::where('status',1)->orderBy('id','DESC')->get();
        

        // to show category 
        $categories=Category::orderBy('category_name','ASC')->get();

        $featureds = Product::where('featured', 1)->orderBy('id', 'DESC')->limit(6)->get(); 

        $hot_deals = Product::where('hot_deals', 1)->where('discount_price','!=',NULL)->orderBy('id', 'DESC')->limit(6)->get(); 

        $special_offers = Product::where('special_offer', 1)->orderBy('id', 'DESC')->limit(6)->get(); 

        $special_deals = Product::where('special_deals', 1)->orderBy('id', 'DESC')->limit(6)->get();

        return view('frontend.index', compact('categories','products','featureds','hot_deals','special_offers','special_deals'));
    } // end method


    // User logout 
     public function UserLogout(){
        
        Auth::logout();
        return Redirect()->route('login');

     } // end method 


     // User Profile Update 
     public function UserProfileUpdate(){

        $id = Auth::user()->id;
        $user = User::find($id);

        return view('frontend.profile.user_profile_update', compact('user'));
     }// end mathod



      // user profile store    
    public function UserProfileStore(Request $request){

        $data = User::find(Auth::user()->id);
  
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone =$request->phone;
  
  
        if ($request->file('profile_photo_path')) {
          $file = $request->file('profile_photo_path');
          // for auto replace old img 
          @unlink(public_path('upload/users_images/'.$data->profile_photo_path));
          // end rep..
          $filename = date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/users_images'),$filename);
          $data['profile_photo_path'] = $filename;
  
            }
            $data->save();
  
        // update notification
            $notification = array(
                'message' =>  ' Profile Update Sucessyfuly',
                'alert-type' => 'success'
            ); 
            return redirect()->route('dashboard')->with($notification);
       
  
  
      }// end method


         // user Password change
         public function UserChangePassword(){
            $id = Auth::user()->id;
            $user = User::find($id);
        return view('frontend.profile.user_password_change', compact('user'));
        }// end method
  


          // user password update
          public function UserPasswordUpdate(Request $request){

            $validateData = $request->validate([
                'oldpassword' => 'required',
                'password' => 'required|confirmed',
            ]);

            $hashedPassword = Auth::User()->password;
            if (Hash::check($request->oldpassword,$hashedPassword)) {
            $user = Auth::User();
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

         // update sms
         $notification = array(
            'message' =>  ' User Password Update Sucessyfully',
            'alert-type' => 'success'
        ); 

            return redirect()->route('user.logout')->with($notification);

            }else{
                return redirect()->back();
            }


        } // end method


         // product_detalis  
       public function ProductDetails($id){
        // for multi img show
        $product = Product::findOrFail($id);   
         $product_color = $product->product_color; 
         $product_color_all = explode (',',$product_color); 
         
         // for color and size
         $product_size = $product->product_size; 
         $product_size_all = explode (',',$product_size); 


          // for related product show
         $cat_id = $product->category_id;
         $relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();


       $multiimgs =  Multi_Img::where('product_id',$id)->get(); 
            
       return view('frontend.product.product_details', compact('product','multiimgs','product_color_all',
       'product_size_all','relatedProduct', ));

      } // end mathod   




} // main end
