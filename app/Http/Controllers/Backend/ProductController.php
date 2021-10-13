<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;

use Carbon\Carbon;
use App\Models\Multi_Img;
use Image;

class ProductController extends Controller
{
    // Add Product 
    Public Function AddProduct(){

        $category = Category::latest()->get();  
        $brands = Brand::latest()->get(); 
        $subcategory = SubCategory::latest()->get(); 

        $subsubcategory = SubSubCategory::latest()->get(); 
        
     
         return view('backend.product.product_add', compact('category','brands','subcategory','subsubcategory'));

    }// end method



// Store Product
	public function StoreProduct(Request $request){

        $image = $request->file('product_thambnail');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$name_gen);
    	$save_url = 'upload/products/thambnail/'.$name_gen;

      // Product::insert([
          $product_id = Product::insertGetId([
      	'brand_id' => $request->brand_id,
      	'category_id' => $request->category_id,
      	'subcategory_id' => $request->subcategory_id,
      	'subsubcategory_id' => $request->subsubcategory_id,
      	'product_name' => $request->product_name,
      	'product_slug_name' =>  strtolower(str_replace(' ', '-', $request->product_name)),   
      	'product_code' => $request->product_code,
      	'product_qty' => $request->product_qty,
      	'product_tags' => $request->product_tags,
      	'product_size' => $request->product_size,    
      	'product_color' => $request->product_color,
      	'selling_price' => $request->selling_price,
      	'discount_price' => $request->discount_price,
      	'product_short_descp' => $request->product_short_descp,  
      	'product_long_descp' => $request->product_long_descp, 
      	'hot_deals' => $request->hot_deals,
      	'featured' => $request->featured,
      	'special_offer' => $request->special_offer,
      	'special_deals' => $request->special_deals,
      	'product_thambnail' => $save_url,
      	'status' => 1,
      	'created_at' => Carbon::now(),   	 

    ]);


        //////////  Multiple Image ///////////        
        $images = $request->file('multi_img');
      foreach ($images as $img) {
        $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
      Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
      $uploadPath = 'upload/products/multi-image/'.$make_name;





        Multi_Img::insert([

                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(), 

              ]);

              }


               $notification = array(
              'message' => 'Product Inserted Successfully',
              'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);





  


	} // end method




 // product view

 public function ProductView(){
 		

 	$products = Product::latest()->get();

 	return view('backend.product.product_view', compact('products'));

 }// end method

 public function ProductInfoView($id){

  $products = Product::with('Brand','Category','SubCategory','subsubcategory')->find($id);
  return view('backend.product.product_view_info', compact('products'));

 }





// product edit
public function EditProduct($id){


$multiImgs = Multi_Img::where('product_id',$id)->get();


    $categories = Category::latest()->get();
    $brands = Brand::latest()->get();
    $subcategory = SubCategory::latest()->get();
    $subsubcategory = SubSubCategory::latest()->get();
    $products = Product::findOrFail($id);
    return view('backend.product.product_edit',compact('categories','brands','subcategory','subsubcategory','products','multiImgs'));

  }





// Product Update Data
public function ProductUpdate(Request $request){

    $product_id = $request->id;

         Product::findOrFail($product_id)->update([
        'brand_id' => $request->brand_id,
        'category_id' => $request->category_id,
        'subcategory_id' => $request->subcategory_id,
        'subsubcategory_id' => $request->subsubcategory_id,
        'product_name' => $request->product_name,        
        'product_slug_name' =>  strtolower(str_replace(' ', '-', $request->product_name)),    
        'product_code' => $request->product_code,
        'product_qty' => $request->product_qty,
        'product_tags' => $request->product_tags,
        'product_size' => $request->product_size,       
        'product_color' => $request->product_color, 
        'selling_price' => $request->selling_price,
        'discount_price' => $request->discount_price,
        'product_short_descp' => $request->short_descp,    
        'product_long_descp' => $request->long_descp,  
        'hot_deals' => $request->hot_deals,
        'featured' => $request->featured,
        'special_offer' => $request->special_offer,
        'special_deals' => $request->special_deals,        
        'status' => 1,
        'created_at' => Carbon::now(),   

      ]);

          $notification = array(
      'message' => 'Product Updated Without Image Successfully',
      'alert-type' => 'success'
    );

    return redirect()->route('all.product')->with($notification);


  } // end method






// /// Multiple Image Update
//   public function MultiImageUpdate(Request $request){
//     $imgs = $request->multi_img;

//     foreach ($imgs as $id => $img) {
//       $imgDel = Multi_Img::findOrFail($id);
//       unlink($imgDel->photo_name);

//       $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
//       Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
//       $uploadPath = 'upload/products/multi-image/'.$make_name;

//       Multi_Img::where('id',$id)->update([
//         'photo_name' => $uploadPath,
//         'updated_at' => Carbon::now(),

//       ]);

//       }// end foreach 



//        $notification = array(
//       'message' => 'Product Image Updated Successfully',
//       'alert-type' => 'info'
//     );

//     return redirect()->back()->with($notification);

//   } // end mehtod



// // Multiple Image Update
//         public function UpdateProductMultiImg(Request $request){




//             $imgs = $request->multi_img;

//             foreach ($imgs as $id => $img) {
//             $imgDel = Multi_Img::findOrFail($id);
//             unlink($imgDel->photo_name);

//             $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
//             Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
//             $uploadPath = 'upload/products/multi-image/'.$make_name;

//             MultiImg::where('id',$id)->update([
//                 'photo_name' => $uploadPath,
//                 'updated_at' => Carbon::now(),

//             ]);

//         } // end foreach

//         $notification = array(
//                 'message' => 'Product Image Updated Successfully',
//                 'alert-type' => 'info'
//             );

//             return redirect()->back()->with($notification);



//     } // end mathod 




/// Multiple Image Update
  public function MultiImageUpdate(Request $request){
    $imgs = $request->multi_img;

    foreach ($imgs as $id => $img) {
      $imgDel = Multi_Img::findOrFail($id);
      unlink($imgDel->photo_name);

      $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
      Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
      $uploadPath = 'upload/products/multi-image/'.$make_name;

      Multi_Img::where('id',$id)->update([
        'photo_name' => $uploadPath,
        'updated_at' => Carbon::now(),

      ]);

   } // end foreach

       $notification = array(
      'message' => 'Product Image Updated Successfully',
      'alert-type' => 'info'
    );

 return redirect()->route('all.product')->with($notification);

  } // end mehtod 









/// Product Main Thambnail Update /// 
 public function ThambnailImageUpdate(Request $request){
      $pro_id = $request->id;
      $oldImage = $request->old_img;
      unlink($oldImage);

    $image = $request->file('product_thambnail');
      $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
      Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$name_gen);
      $save_url = 'upload/products/thambnail/'.$name_gen;

      Product::findOrFail($pro_id)->update([
        'product_thambnail' => $save_url,
        'updated_at' => Carbon::now(),

      ]);

         $notification = array(
      'message' => 'Product Image Thambnail Updated Successfully',
      'alert-type' => 'info'
    );

    return redirect()->back()->with($notification);

     } // end method
     //product delete
     public function DeleteProduct($id){

      Product::findOrFail($id)->delete();
      
       $notification = array(
          'message' => 'Product Deleted Successfully',
          'alert-type' => 'error'
      );

      return redirect()->back()->with($notification);

  }



}// main end
