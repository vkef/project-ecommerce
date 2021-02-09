<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use Illuminate\Support\Facades\DB;


class SubCategoryController extends Controller
{
    public function __construct(){

        $this->middleware('auth:admin');

    }
    public function SubCategories(){
        $category = DB::table('categories')->get();
        $subcat = DB::table('subcategories')
                    ->join('categories','subcategories.category_id','categories.id')
                    ->select('subcategories.*','categories.category')
                    ->get();
        return view('admin.category.subcategory',compact('category','subcat'));           
    }

    public function StoreSubcat(Request $request){

        $validateData = $request->validate([

            'category_id' => 'required',
            'subcategory_name' => 'required',

        ]);

        $data = array();
        $data['category_id']= $request->category_id;
        $data['subcategory_name']=$request->subcategory_name;
        DB::table('subcategories')->insert($data);

        $notification = array(

            'message'=> 'Subcategory Inserted Successfully.',
            'alert-type'=> 'success'

        );
        return Redirect()->back()->with($notification);

    }

    public function DeleteSubCat($id){

        DB::table('subcategories')->where('id',$id)->delete();
        $notification = array(

            'message'=> 'Subcategory Deleted Successfully.',
            'alert-type'=> 'error'

        );
        return Redirect()->back()->with($notification);

    }

    public function EditSubCat($id){

        $subcat = DB::table('subcategories')->where('id',$id)->first();
        $category = DB::table('categories')->get();
        return view('admin.category.edit_subcategory',compact ('subcat','category'));
         
    }

    public function UpdateSubcat(Request $request, $id){

        $data = array();
        $data['category_id']= $request->category_id;
        $data['subcategory_name']=$request->subcategory_name;
        DB::table('subcategories')->where('id',$id)->update($data);

        $notification = array(

            'message'=> 'Subcategory Updated Successfully.',
            'alert-type'=> 'success'

        );
        return Redirect()->route('admin.subcategory')->with($notification);
    }
}
