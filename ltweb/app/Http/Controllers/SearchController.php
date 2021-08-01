<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function search(Request $request){
        $products = Product::where('title', $request->get('search'))
                ->orWhere('title', 'like', '%' . $request->get('search') . '%')->paginate(100);
        return view('user.views.shop',['title'=>'Shop'],compact('products'));
    }
}
