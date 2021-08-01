<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(4);
        return view('admin.product.index',compact('products'));
    }

    public function search(Request $request)
    {
        if (!empty($request->get('search'))){
            $products = Product::where('title', $request->get('search'))
                ->orWhere('title', 'like', '%' . $request->get('search') . '%')->paginate(100);
            return view('admin.product.index',compact('products'));
        }
        if ($request->get('search_select')!=0) {
            $products = Product::where('category_id',$request->get('search_select'))->paginate(100);
            return view('admin.product.index',compact('products'));
        } else{
            return redirect('product');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = new Product();
        $products->category_id = $request->category;
        $products->title = $request->get('title');
        if(!empty($request->avatar)) {
            $files = $request->file('avatar');
            $files->move('backend/upload',$files->getClientOriginalName());
            $products->avatar = $files->getClientOriginalName();
        } else {
            $products->avatar = "";
        }
        $products->price = $request->get('price');
        $products->amount = $request->get('amount');
        $products->summary = $request->get('summary');
        $products->content = $request->get('content');
        $products->status = $request->status;
        $products->save();

        return redirect('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.product.detail',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::get();
        return view('admin.product.update',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        $products->category_id = $request->category;
        $products->title = $request->get('title');
        $files = $request->file('avatar');
        if(!empty($request->avatar)) {
            if (!empty($products->avatar)){
                unlink(public_path('backend/upload/'.$products->avatar));
            }
            $files->move('backend/upload',$files->getClientOriginalName());
            $products->avatar = $files->getClientOriginalName();
        }
        $products->price = $request->get('price');
        $products->amount = $request->get('amount');
        $products->summary = $request->get('summary');
        $products->content = $request->get('content');
        $products->status = $request->status;
        $products->save();
        return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Product::find($id);
        unlink('backend/upload/'.$delete->avatar);
        $delete->delete();
        return redirect('product');
    }
}
