<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subcategory_2;
use App\Models\Good;

class BrandController extends Controller
{
    public function brands(){
        $data = Brand::all();
        return view('brands.brands', ['data'=>$data]);
    }
    public function brand(Request $request){
        $data = Brand::where('slug', $request->BrandName)->first();
        $categories = Subcategory::join('goods', 'goods.subcategory_id', '=', 'subcategories.id')
            ->where('goods.name','like', "%$data->name%")
            ->select('subcategories.*')
            ->distinct()
                ->get();
        
        $categories_2lvl = Subcategory_2::join('goods', 'goods.subcategory2_id', '=', 'subcategories2lvl.id')
            ->where('goods.name','like', "%$data->name%")
            ->select('subcategories2lvl.*')
            ->distinct()
                ->get();
        
        
        return view('brands.brandPage', ['data'=>$data, 'categories'=>$categories, 'categories2'=>$categories_2lvl]);
    }
}
