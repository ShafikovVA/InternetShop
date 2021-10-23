<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Good;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    //
    public function addReview(Request $request){
       
        Review::create([
            'review'=> $request->review,
            'user_id'=> Auth::id(),
            'good_id'=> $request->product_id,
        ]);

        return back();
    }

}
