<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{

    public function __construct()
    {
        view()->share('currentPage','categories');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=Category::get();
//        dd($category);
        if (\request()->ajax()){
            return DataTables::of($category)

                ->addColumn('action', function($row){
                   return
                    '<a href=" '.route('categories.edit',$row->id).'" class="btn btn-primary"> <i class="fa fa-pencil"></i></a>
                    <button type="button" class=" btn btn-danger delete" data-val="'.$row->title.'"  data-token="'.csrf_token().'" data-url="'.route('categories.destroy',$row->id ).'" >
                      <i class="fa fa-trash-o"></i>
                    </button>
                    ';
//                    return "action";

                })
                ->make(true);
        }
        return view('admin.categories.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),['cat_name'=>'required|min:3|unique:categories'
            ]
        );

        Category::create(
            [
                'cat_name'=>\request('cat_name')
            ]);
//
//        $search=\request('catname');
//
//        if(Category::where('cat_name',$search)->first()) {
//            return redirect(route('categories.index'))->with('error', 'Duplicate entry, record already exists');
//        }
//        else {
//            Category::create(
//                [
//              'cat_name'=>\request('catname')
//                ]);
//
            return redirect(route('categories.index'))->with('success','Category created successfully');
//        }

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
        $cat=Category::find($id);
        return view('admin.categories.edit',compact('cat'));
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

        $this->validate(request(),['cat_name'=>'required|min:3|unique:categories'
            ]
        );

       Category::where ('id',$id)->update([
           'cat_name'=>\request('cat_name')
       ]);
       return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return response()->json(['status'=>'success','url'=>route('categories.index')]);
    }
}
