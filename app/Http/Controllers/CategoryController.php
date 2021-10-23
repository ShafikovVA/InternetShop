<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilter;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subcategory_2;
use App\Models\Good;
use App\Models\Review;
use App\Models\Image;
use App\Models\Specification;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    
    public function getCategories(){

        $data = Category::all();
       
        return view('catalog', ['data'=> $data]);
    }

    public function getSubcategory(Request $request){
        $category = Category::where('slug', $request->CategoryName)->first(); 
        $data = Category::find($category['id'])->subcategories()->get(); 
        $dataCategory = Category::where('slug', $request->CategoryName)->first();
        return view('subcatalog', ['data'=>$data,
         'category'=>$dataCategory]);
    }

    public function getSubcategory2(Request $request){
   
        $subcategory = Subcategory::where('slug', $request->SubcategoryNameFor)->first();
        $data = Subcategory::find($subcategory['id'])->subcategories()->get();
        $dataCategory = Category::where('slug', $request->CategoryName)->first();
        return view('subcatalog', ['data'=>$data,
         'category'=>$dataCategory,  'subcategory'=>$subcategory]);
    }
    
    public function getGoods(Request $request, ProductFilter $filter){
        $category = Category::where('slug', $request->CategoryName)->first();
        $subcategory = Subcategory::where('slug', $request->SubcategoryName)->first();
        $firstLvlCatalog = $subcategory;
        $tableId = 'subcategory_id';
        if($subcategory === null){
           $subcategory = Subcategory_2::where('slug', $request->SubcategoryName)->first();
            $tableId = 'subcategory2_id';
            $firstLvlCatalog = Subcategory::where('id', $subcategory['subcategory_id'])->first();
        }

        $brand = intval($request->brand);
        $priceFrom = intval(($request->priceFrom!=null)?trim($request->priceFrom):
        (Good::where($tableId, $subcategory['id'])->min('price')));
        $priceTo = intval(($request->priceTo!=null)?trim($request->priceTo):
        (Good::where($tableId, $subcategory['id'])->max('price')));
        $data = Good::where($tableId, $subcategory['id'])->where('price', '>=', $priceFrom)->where('price', '<=', $priceTo)->paginate(10)->withQueryString();
        if(isset($request->brand)){
            $data = Good::where($tableId, $subcategory['id'])->where('brand_id', $brand)->where('price', '>=', $priceFrom)->where('price', '<=', $priceTo)->paginate(10)->withQueryString();
        }
        
        return view('goods', ['data'=>$data, 'subcategory'=>$subcategory, 'category'=>$category, 'firstLvlCatalog'=>$firstLvlCatalog]);

    }

    public function GetItem(Request $request){
        $category = Category::where('slug', $request->CategoryName)->first();
        $subcategory = Subcategory::where('slug', $request->SubcategoryName)->first();
        $tableId = 'subcategory_id';
        if($subcategory === null){
           $subcategory = Subcategory_2::where('slug', $request->SubcategoryName)->first();
            $tableId = 'subcategory2_id';
        }

        $data =  Good::where($tableId, $subcategory['id'])->where('slug', $request->GoodName)->first();
        $images = Good::find($data->id)->images()->get();
        $reviews = Good::find($data->id)->reviews()->orderby('created_at', 'desc')->get();
        $spec_titles = Good::find($data->id)->specification_titles()->get();
        return view('good', ['data'=>$data, 'spec' => Specification::all(), 'spec_titles'=>$spec_titles, 'images'=>$images, 'reviews'=>$reviews, 'subcategory'=>$subcategory, 'category'=>$category]);
    }
}
