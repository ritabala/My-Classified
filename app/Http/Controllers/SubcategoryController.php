<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCategory;
use App\Category;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        view()->share('currentPage','subcategories');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategory=SubCategory::get();
        return view('admin.sub_categories.index',compact('subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::get();
        return view('admin.sub_categories.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  dd ($request->all());

        $this->validate(request(),[
            'sub_category_name'=>'required|min:3'
            ]
        );

         SubCategory::create(
                    [
                        'sub_category_name'=>\request('sub_category_name'),
                        'category_id'=>\request('catname')
                    ]);

         return redirect(route('subcategories.index'))->with('success','Subcategory created successfully');

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
        $subcat=SubCategory::find($id);
        return view('admin.sub_categories.edit',compact('subcat'));

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
        $this->validate(request(),[
                'sub_category_name'=>'required|min:3'
            ]
        );

        SubCategory::where ('id',$id)->update([
            'sub_category_name'=>\request('sub_category_name')
        ]);

        return redirect(route('subcategories.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubCategory::destroy($id);
        return response()->json(['status'=>'success','url'=>route('subcategories.index')]);

    }
}
