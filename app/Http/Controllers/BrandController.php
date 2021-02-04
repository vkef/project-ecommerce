<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{

    public function __construct(){

        $this->middleware('auth:admin');

    }

    public function Brand(){

        $brand = Brand::all();
        return view('admin.category.brand', compact ('brand'));

    }

}
