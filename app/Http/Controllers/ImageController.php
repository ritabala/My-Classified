<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'advertisement_id'=>'required',
            'image_path'=>'required',

        ]);

        if($request->hasFile('image_path'))
        {
            $allowedfileExtension=['pdf','jpg','png','docx'];
            $files = $request->file('image_path');

            foreach($files as $file){
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);

                if($check)
                {
                       $filename = $file->store('photos');
                        Image::create([
                            'advertisement_id' => $request->advertisement_id,
                            'image_path' => $filename
                        ]);
                }
                else
                {
                    return redirect(route('advertisements.index'))->with('error','Sorry!! Only Upload png , jpg , doc');
                }}}
                return redirect(route('advertisements.index'))->with('success','Files uploaded successfully');
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
        //
        $adv=Advertisement::find($id);
//        dd($adv->title);
        return view('admin.images.index',compact('adv'));

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
        //
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
