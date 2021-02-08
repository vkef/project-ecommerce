<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Carbon;
use Image;


class BrandController extends Controller
{

    public function __construct(){

        $this->middleware('auth:admin');

    }

    public function Brand(){

        $brand = Brand::all();
        return view('admin.category.brand', compact ('brand'));

    }

    public function StoreBrand(Request $request){

        $validateData = $request->validate([

            'brand_name' => 'required|unique:brands|max:55'

        ]);


            $data = array();
            $data['brand_name'] = $request->brand_name;
            $image = $request->file('brand_image');

        


            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('upload/brand/'.$name_gen);
            $last_img = 'upload/brand/'.$name_gen;

            Brand::insert([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_img,
                'created_at' => Carbon::now()
            ]);
        
            $notification = array(

                'message'=> 'Brand Inserted Successfully',
                'alert-type'=> 'success'
    
            );
    
            return Redirect()->back()->with($notification);

    }
    public function DeleteBrand($id){

        $image = Brand::find($id);
        $old_image = $image->brand_image;
        unlink($old_image);

        Brand::find($id)->delete();

        $notification = array(

            'message'=> 'Brand Deleted Successfully.',
            'alert-type'=> 'error'

        );

        return Redirect()->back()->with($notification);

    }

    public function EditBrand($id){

        $brands=Brand::find($id);
        return view('admin.category.edit_brand',compact('brands'));

    }

    public function UpdateBrand(Request $request, $id){ 

        $validateData = $request->validate([

            'brand_name' => 'unique:brands|max:55'

        ]);

            $old_image=$request->old_image;

            $image = $request->file('brand_image');
        
        if($image){

            unlink($old_image);
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('upload/brand/'.$name_gen);
            $last_img = 'upload/brand/'.$name_gen;

            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_img,
                'created_at' => Carbon::now()
            ]);
        
            $notification = array(

                'message'=> 'Brand Updated Successfully',
                'alert-type'=> 'success'
    
            );
    
            return Redirect()->route('admin.brands')->with($notification);
        }
        else{

            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now()
            ]);

            $notification = array(

                'message'=> 'Brand Image Name Updated Successfully',
                'alert-type'=> 'success'
    
            );
    
    
            return Redirect()->route('admin.brands')->with($notification);
        }

    }
}