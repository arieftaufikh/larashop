<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Category;
use \App\User;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::paginate(10);
        $filterCategory = $request->get('categoryName');

        if($filterCategory){
            $categories = Category::where('name','LIKE',"%$filterCategory%")->paginate(10);
        }

        return view('categories.index',['categories'=>$categories ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_category = new Category;

        $new_category->name = $request->get('categoryName');
        $new_category->slug = str_slug( $request->get('categoryName') ,'-');
        
        if ($request->file('categoryImage')) {
            $imagePath = $request->file('categoryImage')->store('category_image','public');
            $new_category->image = $imagePath;
        }

        $new_category->created_by = \Auth::id();
        $new_category->save();

        return redirect('categories/create')->with('status','Category has been created by');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category_to_edit = Category::findOrFail($id);

        return view('categories.edit',['category'=>$category_to_edit]);
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

        $category = Category::findOrFail($id);

        $category->name = $request->get('categoryName');
        $category->slug = str_slug($request->get('categoryName'),'-');

        if ($request->file('categoryImage')) {
            if ($category->image && file_exists(storage_path('app/public/'.$category->image))) {
                \Storage::delete(['public.', $category->image]);
            }

            $newImage = $request->file('categoryImage')->store('categoryImage','public');
            $category->image = $newImage;
        }

        $category->save();

        return redirect()->route('categories.edit',['id'=>$id])->with('status','Category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
