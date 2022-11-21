<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;

class CreateNewItemController extends Controller
{
    //
    public function index(Request $request){
        $allCategories = Category::all();
        $allSubcategories = Subcategory::where('id', $request->id );
       //dd($allCategories);
        return view('admin_panel', ['allCategories'=> $allCategories]);

       }
   
}
