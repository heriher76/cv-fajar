<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MyBio;

class MyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myBio = MyBio::first();

        return view('admin.my-profile.index', compact('myBio'));
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
        //
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $input = $request->all();

        if(MyBio::first() == null) {

            (isset($input['photo_background'])) ? $namaBackground = str_random().'.'.$input['photo_background']->getClientOriginalExtension() : $namaBackground = null;
            
            MyBio::create([
                'photo_background' => $namaBackground,
                'name' => $input['name'],
                'description' => $input['description'],
                'ig' => $input['ig'],
                'in' => $input['in'],
                'fb' => $input['fb'],
                'twitter' => $input['twitter'],
                'github' => $input['github']
            ]);

            (isset($input['photo_background'])) ? $input['photo_background']->move(public_path('mybio'), $namaBackground) : null ;

        }else{
            $myBio = MyBio::first();

            if(isset($input['photo_background'])){
                
                $namaBackground = str_random().'.'.$input['photo_background']->getClientOriginalExtension();

                if (isset($myBio->photo_background)) {
                    unlink(public_path('mybio/'.$myBio->photo_background));
                }

                $input['photo_background']->move(public_path('mybio'), $namaBackground);

                $myBio->update([
                    'photo_background' => $namaBackground
                ]);
            }
            
            $myBio->update([
                'name' => $input['name'],
                'description' => $input['description'],
                'ig' => $input['ig'],
                'in' => $input['in'],
                'fb' => $input['fb'],
                'twitter' => $input['twitter'],
                'github' => $input['github']
            ]);
        }
            return back();
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
