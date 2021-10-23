<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilter;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Good;
use App\Models\Image;
use App\Models\Specification;
use Illuminate\Http\Request;

class mainPageController extends Controller
{
    //
    public function index(){
        setcookie('cart_id', uniqid());
        $popularFlagmans = Good::where('subcategory_id', 1)->where('is_popular', 1)->paginate(8);
        
        $newGoods = Good::where('subcategory_id', 1)->orderby('name', 'asc')->paginate(8);
        return view('welcome', ['flagmans' => $popularFlagmans, 'newGoods' => $newGoods]);
    }
}
