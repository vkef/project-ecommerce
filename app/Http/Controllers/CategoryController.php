<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

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

        $category_name = new Category();
        $category_name->category = $request->category;
        $category_name->save();

        $notification = array(
            'message' => 'Category Updated Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    
    }
}
