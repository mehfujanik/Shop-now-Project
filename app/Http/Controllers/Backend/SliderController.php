<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Image;

class SliderController extends Controller
{
    public function SliderView(){

        $slider =  Slider::latest()->get();
        return View('backend.slider.slider_view', compact('slider'));

    }

     public function SliderStore(Request $request)
    {
        $request->validate([
            'slider_title' => 'required',         
            'slider_image' => 'required',       
          ],[ 
            'slider_title.required' => 'Input Slider Name'
          ]);

          // img upload and save
          $image = $request->file('slider_image');
          $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(300,300)->save('upload/slider/'.$name_gen);
          $save_url = 'upload/slider/'.$name_gen;

          Slider::insert([

            'title' => $request->slider_title,     
            'description' =>$request->slider_description ,          
            'slider_img' => $save_url,
 
           ]); 
 
           $notification = array(
             'message' =>  'Slider Added Successfully',
             'alert-type' => 'success'
            );
            
            return redirect()->back()->with($notification);  
    }

    public function SliderDelete($id){

        $slider = Slider::findOrFail($id);

          $img = $slider->slider_img;
          unlink($img);

          Slider::findOrFail($id)->delete();

        $notification = array(
            'message' =>  'Slider deleted Successfully',
            'alert-type' => 'success'
           );
        return redirect()->back()->with($notification);  
    }

    public function SliderEdit($id){

        $slider = Slider::findOrFail($id);

        return view('backend.slider.slider_edit',compact('slider')); 
    }



    public function SliderUpdate(Request $request){
        $slider_id = $request->id;
        $old_img  = $request->old_image;

        if ($request->file('slider_image')) {

            unlink($old_img);
            $image = $request->file('slider_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/slider/'.$name_gen);
            $save_url = 'upload/slider/'.$name_gen;
  
         // Brand Update    
            Slider::findOrFail($slider_id)->update([
             'title' => $request->slider_title, 
             'description' => $request->slider_description,
             'slider_img' => $save_url,
            ]);
  
            $notification = array(
              'message' =>  'Slider Update Sucessyfully',
              'alert-type' => 'success'
          ); 
  
          return redirect()->route('slider.manage')->with($notification);
  

        }else{
            Slider::findOrFail($slider_id)->update([
                'title' => $request->slider_title, 
                'description' => $request->slider_description,
               ]);
     
               $notification = array(
                 'message' =>  'Slider Update Sucessyfully',
                 'alert-type' => 'info'
             ); 
     
             return redirect()->route('slider.manage')->with($notification);
    }
 }
        public function SliderDeactive($id){
            Slider::findOrFail($id)->update([
                'status' => 0, 
            
               ]);
               $notification = array(
                'message' =>  'Slider Deactivated Successfully',
                'alert-type' => 'info'
            ); 
    
            return redirect()->back()->with($notification);

        }

        public function SliderActive($id){
            Slider::findOrFail($id)->update([
                'status' => 1, 
            
               ]);
               $notification = array(
                'message' =>  'Slider Activated Successfully',
                'alert-type' => 'info'
            ); 
    
            return redirect()->back()->with($notification);

        }

}