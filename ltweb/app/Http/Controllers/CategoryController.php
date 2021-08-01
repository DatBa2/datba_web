<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        $categories = Category::paginate(2);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories = new Category();
        $categories->name = $request->get('name');
        $categories->type = $request->get('type');
        if(!empty($request->avatar)) {
            $files = $request->file('avatar');
            $files->move('backend/upload',$files->getClientOriginalName());
            $categories->avatar = $files->getClientOriginalName();
        } else {
            $categories->avatar = "";
        }
        $categories->description = $request->get('description');
        $categories->status = $request->status;
        $categories->save();

        return redirect('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('admin.category.detail',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Category::findOrFail($id);
        return view('admin.category.update', compact('edit'));
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
        $categories = Category::find($id);
        $categories->name = $request->get('name');
        $categories->type = $request->get('type');
        $files = $request->file('avatar');
        if(!empty($request->avatar)) {
            if (!empty($categories->avatar)){
                unlink(public_path('backend/upload/'.$categories->avatar));
            }
            $files->move('backend/upload',$files->getClientOriginalName());
            $categories->avatar = $files->getClientOriginalName();
        }
        $categories->description = $request->get('description');
        $categories->status = $request->status;
        $categories->save();
        return redirect('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Category::find($id);
        unlink('backend/upload/'.$delete->avatar);
        $delete->delete();
        return redirect('category');
    }
}
