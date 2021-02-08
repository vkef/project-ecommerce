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
}
