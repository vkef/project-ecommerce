<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function Category(){

        $category = Category::all();
        return view('admin.category.category', compact ('category'));

    }

    public function StoreCategory(Request $request){

        $validateData = $request->validate([

            'category' => 'required|unique:categories|max:100',
        ]);

        $category= new Category();
        $category->category = $request->category;
        $category->save();

        $notification = array(
            'message' => 'Category Updated Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    
    }


    public function DelCategory($id){

        $category = Category::find($id)->forcedelete();
        $notification = array(
            'message' => 'Category Deleted Succesfully',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);

    }

    public function EditCategory($id){

        $categories=Category::where('id',$id)->first();
        return view('admin.category.edit_category',compact('categories'));

    }

    public function UpdateCategory(Request $request, $id){

        $validateData = $request->validate([

            'category' => 'required|max:100',
        ]);

            $data=array();
            $data['category']=$request->category;
            $update=DB::table('categories')->where('id',$id)->update($data);

        if ($update) {

            $notification = array(
                'message' => 'Category Updated Succesfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route ('admin.category')->with($notification);

        }else{

        $notification = array(
            'message' => 'Nothing to Update',
            'alert-type' => 'info'
        );

        return redirect()->route ('admin.category')->with($notification);
        }
    }
}
