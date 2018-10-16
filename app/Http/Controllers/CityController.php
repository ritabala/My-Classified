<?php

namespace App\Http\Controllers;

use App\Country;
use App\City;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CityController extends Controller
{

    public function __construct()
    {
        view()->share('currentPage','cities');
    }

    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city=City::get();
        if(\request()->ajax()){
            return DataTables::of($city)
                ->addcolumn('action',function($row){
//                    return "action";
                    return
                    '<a href=" '.route('cities.edit',$row->id).'" class="btn btn-primary"> <i class="fa fa-pencil"></i></a>
                     <a href=" '.route('cities.destroy',$row->id).'" class="btn btn-danger"> <i class="fa fa-trash-o"></i></a>
                    ';
                })
                ->editcolumn('country_id',function($row){
                    return $row->country->name;
                })
                ->make(true);
        }
        return view('admin.cities.index',compact('city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country=Country::get();
        return view('admin.cities.create',compact('country'));
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
                'name'=>'required|min:3|unique:cities'
            ]
        );

        City::create(
            [
                'name'=>\request('name'),
                'country_id'=>\request('country')
            ]);

        return redirect(route('cities.index'))->with('success','City created successfully');
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
        $city=City::find($id);
        return view('admin.cities.edit',compact('city'));
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
                'name'=>'required|min:3|unique:cities'
            ]
        );

        City::where ('id',$id)->update([
            'name'=>\request('name')
        ]);
        return redirect(route('cities.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        City::destroy($id);
        return response()->json(['status'=>'success','url'=>route('cities.index')]);

    }
}
