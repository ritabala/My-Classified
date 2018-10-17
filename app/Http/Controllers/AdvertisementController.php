<?php

namespace App\Http\Controllers;
use App\Advertisement;
use App\City;
use App\Category;
use App\SubCategory;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdvertisementController extends Controller
{

    public function __construct()
    {
        view()->share('currentPage', 'advertisements');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     **/

    public function index()
    {
        $adv=Advertisement::get();
//
        if(\request()->ajax()){

            return DataTables::of($adv)
                ->addColumn('action', function($row){
                  return
                  ' <a href=" '.route('images.edit',$row->id).'" class="btn btn-dark"> <i class="fa fa-file-image-o"></i></a>
                    <a href=" '.route('advertisements.edit',$row->id).'" class="btn btn-primary"> <i class="fa fa-pencil"></i></a>
                    <button type="button" class=" btn btn-danger delete" data-val="'.$row->title.'"  data-token="'.csrf_token().'" data-url="'.route('advertisements.destroy',$row->id ).'" >
                      <i class="fa fa-trash-o"></i>
                    </button>
                   ';
                })
                ->addcolumn('category', function($row){
                    return $row->subcategory->category->cat_name;
                })
                ->editColumn('city_id', function($row){
                    return $row->city->name;
                })

                ->editColumn('subcategory_id', function($row){
                    return $row->subcategory->sub_category_name;
                })
                ->editColumn('user_id', function($row){
                    return $row->user->name;
                })
            ->make(true);
        }
        return view('admin.advertisements.index',compact('adv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city=City::get();
        $category=Category::get();
        $subcategory=SubCategory::get();
        $user=User::get();
        return view('admin.advertisements.create',compact('city','category','subcategory','user'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'title'=>'required|min:3|unique:advertisements',
            'desc'=>'required',
            'city_id'=>'required',
            'subcategory_id'=>'required',
            'price'=>'required',
            'user_id'=>'required'
        ]);


//        Advertisement::create(
//            [
//            'title'=>\request('title'),
//            'desc'=>\request('desc'),
//            'city_id'=>\request('city_id'),
//            'subcat_id'=>\request('subcat_id'),
//            'price'=>\request('price'),
//            'user_id'=>\request('user_id')
//
//                ]
//        );

        Advertisement::create($request->all());

        return redirect(route('advertisements.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        return view('admin.images.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adv=Advertisement::find($id);
        $city=City::get();
        $subcategory=SubCategory::get();
        $user=User::get();
        return view('admin.advertisements.edit',compact('adv','city','subcategory','user')) ;
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
//        Advertisement::where('id',$id)->update(
//            [
//                'title'=>\request('title'),
//                'desc'=>\request('desc'),
//                'city_id'=>\request('city_id'),
//                'subcat_id'=>\request('subcat_id'),
//                'price'=>\request('price'),
//                'user_id'=>\request('user_id')
//            ]
//        );
//

        $this->validate(request(),[
            'title'=>'required|min:3',
//            'title'=>'required|min:3|unique:advertisements',
            'desc'=>'required',
//            'city_id'=>'required',
//            'subcat_id'=>'required',
            'price'=>'required'
//            'user_id'=>'required'
        ]);

        Advertisement::find($id)->update(\request()->all());

//        Advertisement::where('id',$id)->update([
//            $request->all()
//        ]);

        return redirect(route('advertisements.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Advertisement::destroy($id);
//        dd($id);
        return response(['status'=>'success','url'=>route('advertisements.index')]);
//
//        $adv = Advertisement::findOrFail($id);
//        $adv->delete();
//        return response(['status'=>'success','url'=>route('advertisements.index')]);
    }
}
