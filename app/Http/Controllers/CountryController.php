<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use Yajra\DataTables\Facades\DataTables;

class CountryController extends Controller
{
    public function __construct()
    {
        view()->share('currentPage','countries');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $country=Country::get();
        if (\request()->ajax()){
            return DataTables::of($country)
                ->addcolumn('action',function($row){
//                    return "action";
                    return
                    '<a href=" '.route('countries.edit',$row->id).'" class="btn btn-primary"> <i class="fa fa-pencil"></i></a>
                    <button type="button" class=" btn btn-danger delete" data-val="'.$row->title.'"  data-token="'.csrf_token().'" data-url="'.route('categories.destroy',$row->id ).'" >
                      <i class="fa fa-trash-o"></i>
                    </button>
                    ';
                })
                ->make(true);
        }
        return view('admin.countries.index',compact('country'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.countries.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate(request(),['name'=>'required|min:3|unique:countries'
            ]
        );

//        $search=\request('country');
//
//        if(Country::where('name',$search)->first()) {
//            return redirect(route('countries.index'))->with('error', 'Duplicate entry, record already exists');
//        }
//        else {
            Country::create(
                [
                    'name'=>\request('name')
                ]);
//
            return redirect(route('countries.index'))->with('success','Country created successfully');
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
        $country=Country::find($id);
        return view('admin.countries.edit',compact('country'));
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
        $this->validate(request(),['name'=>'required|min:3|unique:countries'
            ]
        );


        Country::where ('id',$id)->update([
            'name'=>\request('name')
        ]);


        return redirect(route('countries.index'))->with('success','Country updated successfully');;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Country::destroy($id);
        return response()->json(['status'=>'success','url'=>route('countries.index')]);

    }
}
